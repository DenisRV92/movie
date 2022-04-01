<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            $key = 'df38298bb94103d93e612462f8549e8b';
            $page = rand(1, 500);
            $url = 'https://api.themoviedb.org/3/discover/movie?api_key';

            $movie = Http::get("$url=$key&language=en-US&include_adult=false&include_video=false&page=$page")
                ->json();

            $collect = collect($movie);
            $result = $collect['results'];
            foreach ($result as $val) {
                DB::table('films')->insert([
                    'title' => $val['title'],
                    'poster_path' => $val['poster_path']
                ]);
//                info($val['title']);
            }
//            info('hellooooo');

        })->everyThreeHours();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
