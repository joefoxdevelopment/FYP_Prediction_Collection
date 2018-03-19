<?php

namespace App\Http\Controllers;

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
    public function makePredictions() {
        //Process and store predictions
        //Validation is key

        return redirect()->route('thanks');
    }

    //Route thanks
    public function predictionConfirm() {
        return view('thanks', []);
    }

    private function getMatchesToPredict(): array {
        return [];
    }
}
