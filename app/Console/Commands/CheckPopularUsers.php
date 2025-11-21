<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CheckPopularUsers extends Command
{
    protected $signature = 'check:popular-users';
    protected $description = 'Send email when any user gets more than 50 likes';

    public function handle()
    {
        $popularUsers = DB::table('likes')
            ->where('is_liked', true)
            ->join('users', 'users.id', '=', 'likes.to_person_id')
            ->where('users.email_sent', false)
            ->select(
                'to_person_id',
                DB::raw('COUNT(*) as like_count'),
                'users.name',
                'users.email'
            )
            ->groupBy('to_person_id', 'users.name', 'users.email')
            ->having('like_count', '>=', 50)
            ->get();

        foreach ($popularUsers as $user) {

            $response = Http::post("https://api.emailjs.com/api/v1.0/email/send", [
                "service_id" => "service_6fzo6jm",
                "template_id" => "template_n4c8k9m",
                "user_id"     => "0I2JufUykkyF4nAjD",
                "template_params" => [
                    "admin_email" => "UJJWAL@HYPERHIRE.IN",
                    "user_name"   => $user->name,
                    "user_id"     => $user->to_person_id,
                    "likes_count" => $user->like_count
                ]
            ]);

            if ($response->successful()) {
                DB::table('users')
                    ->where('id', $user->to_person_id)
                    ->update(['email_sent' => true]);

                $this->info("Email sent for user: {$user->name}");
            } else {
                $this->error("Failed sending email for user ID {$user->to_person_id}");
            }
        }

        $this->info('Popular user check completed.');
    }
}
