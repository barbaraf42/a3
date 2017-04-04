<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    # initial page load
    public function __invoke() {
        return view('home');
    }

    # results
    public function results(Request $request) {

        # validate input
        $this->validate($request, [
            'billAmount' => 'required|numeric',
        ]);

        # if input validates, assign variables
        $result = '';
        $billAmount = $request->input('billAmount', 0);
        $numberOfPeople = $request->input('numberOfPeople', 1);
        $includeTip = $request->has('includeTip', false);
        $tipPercent = $request->input('tipPercent', 15);
        $roundUp = $request->has('roundUp', false);

        # if input validates, calculate result
        $tipPercentToCalculate = ($includeTip) ? $tipPercent : '0';
        $tip = floatval($billAmount) * (intval($tipPercentToCalculate) / 100);
        $totalBill = floatval($billAmount) + $tip;
        $onePersonBill = $totalBill / intval($numberOfPeople);
        $onePersonBill = round($onePersonBill, 2);
        $onePersonBill = number_format($onePersonBill, 2, '.', '');
        if ($roundUp) {
            $onePersonBill = ceil($onePersonBill);
        }
        $onePersonBill = str_replace(".00", "", $onePersonBill);
        $result = $onePersonBill;

        # Return the view with result and all initial data
        return view('results')->with([
            'result' => $result,
        ]);

    }

}
