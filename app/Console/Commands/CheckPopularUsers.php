<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckPopularUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:popular-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $popularUsers = \DB::table('likes')
            ->where('is_liked', true)
            ->select('to_person_id', \DB::raw('COUNT(*) as like_count'))
            ->groupBy('to_person_id')
            ->having('like_count', '>', 50)
            ->get();

        foreach ($popularUsers as $user) {
            \Mail::raw(
                "User ID {$user->to_person_id} has {$user->like_count} likes.",
                function ($message) {
                    $message->to('admin@example.com')
                            ->subject('Popular User Notification');
                }
            );
        }

        $this->info('Popular user check completed.');
    }

}
