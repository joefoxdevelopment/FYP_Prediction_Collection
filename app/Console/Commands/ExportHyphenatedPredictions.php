<?php

namespace App\Console\Commands;

use App\MatchData;
use Illuminate\Console\Command;

class ExportHyphenatedPredictions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:hyphenated-predictions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =
        'Export match predictions with scores in \d-\d format';

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
            'Score',
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
            $arr = $entry->toArray();
            fputcsv(
                $fileHandle,
                [
                    $arr['hometeam'],
                    $arr['awayteam'],
                    sprintf('%d-%d', $arr['homegoals'], $arr['awaygoals']),
                ]
            );
        }
        fclose($fileHandle);
    }
}
