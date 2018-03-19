<?php

namespace App\Console\Commands;

use App\PredictableMatch;
use Illuminate\Console\Command;

class PredictableMatches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:addpredictable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Write the predictable matches to the database';

    private $filepath = 'matchdata/predictablematches.csv';

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
        $this->info('Opening the predictable matches csv');

        $handle = fopen($this->filepath, 'r');

        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $match = new PredictableMatch();
            $match->hometeam = $data[0];
            $match->awayteam = $data[1];
            $match->save();
        }

        fclose($handle);


        $this->info('Done.');
    }
}
