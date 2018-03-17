<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictionController extends Controller
{
    //Route index
    public function index() {
        return view('index', []);
    }

    //Route submit-predictions
    public function makePredictions() {
        return redirect()->route('thanks');
    }

    //Route thanks
    public function predictionConfirm() {
        return view('thanks', []);
    }
}
