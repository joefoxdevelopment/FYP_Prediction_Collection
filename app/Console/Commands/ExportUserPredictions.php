<?php

namespace App\Console\Commands;

use App\MatchData;
use Illuminate\Console\Command;

class ExportUserPredictions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:user-predictions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export all user pred';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $titles = [
            'HomeTeam',
            'AwayTeam',
            'HomeGoals',
            'AwayGoals'
        ];

        $entries = MatchData::all(
            'hometeam',
            'awayteam',
            'homegoals',
            'awaygoals'
        );

        $fileHandle = fopen('export/exportedPredictions.csv', 'w');

        fputcsv($fileHandle, $titles);

        foreach ($entries as $entry) {
            fputcsv($fileHandle, $entry->toArray());
        }
        fclose($fileHandle);

    }
}
