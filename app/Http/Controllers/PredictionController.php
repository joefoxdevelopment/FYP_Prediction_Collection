<?php

namespace App\Http\Controllers;

use App\MatchData;
use App\PredictableMatch;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    //Route index
    public function index() {
        return view(
            'index',
            [
                'matches' => $this->getMatchesToPredict(),
            ]
        );
    }

    //Route submit-predictions
    public function makePredictions(Request $request) {
        $hometeams = $request->hometeam;
        $awayteams = $request->awayteam;
        $homegoals = $request->homegoals;
        $awaygoals = $request->awaygoals;

        for ($i = 1; $i <= count($hometeams); $i++) {

            $match = new MatchData();

            $match->hometeam  = $hometeams[$i];
            $match->awayteam  = $awayteams[$i];
            $match->homegoals = $homegoals[$i];
            $match->awaygoals = $awaygoals[$i];
            $match->source    = 'user';

            $match->save();
        }

        return redirect()->route('thanks');
    }

    //Route thanks
    public function predictionConfirm() {
        return view('thanks', []);
    }

    private function getMatchesToPredict() {
        return PredictableMatch::all();
    }
}
