<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Register Console Commands
|--------------------------------------------------------------------------
|
| Here you may register all of the console commands for your application.
| You may also define your scheduled tasks here.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

/*
|--------------------------------------------------------------------------
| Schedule Commands
|--------------------------------------------------------------------------
*/

Schedule::command('check:popular-users')->everyMinute();
