<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke(Request $request) {

        # See just the form data from the $request object
        dump($request->all());

        # initialize
        $result = '';
        $billAmount = '';
        $numberOfPeople = 1;
        $includeTip = false;
        $tipPercent = 15;
        $roundUp = false;

        # if the request isn't empty, continue
        if ($request->has('numberOfPeople')) {

            # if there's a request available, validate input
            $this->validate($request, [
                'billAmount' => 'required|numeric',
            ]);

            # if input validates, re-assign variables
            $billAmount = $request->input('billAmount');
            $numberOfPeople = $request->input('numberOfPeople');
            $includeTip = $request->has('includeTip');
            $tipPercent = $request->input('tipPercent');
            $roundUp = $request->has('roundUp');

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
        }

        # Return the view with result and all initial data
        return view('home')->with([
            'result' => $result,
            'billAmount' => $billAmount,
            'numberOfPeople' => $numberOfPeople,
            'includeTip' => $includeTip,
            'tipPercent' => $tipPercent,
            'roundUp' => $roundUp,
        ]);

    }

}
