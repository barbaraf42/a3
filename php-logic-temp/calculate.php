<?php

require("Form.php");

$form = new DWA\Form($_GET);
$errors = [];
$result = 0;

if ($form->isSubmitted()) {

    // get the form values
    $billAmount = $form->get('billAmount', $default = 0); # String
    $numberOfPeople = $form->get('numberOfPeople', $default = '1'); # String
    $includeTip = $form->isChosen('includeTip'); # Boolean
    $tipPercentInForm = $form->get('tipPercent', $default = '15'); # String
    $tipPercentToCalculate = ($includeTip) ? $tipPercentInForm : '0'; # String
    $roundUp = $form->isChosen('roundUp'); # Boolean

    // validate these form items
    $errors = $form->validate(
        [
            'billAmount' => 'required|numericDecimals',
        ]
    );

    // assign clearer field labels for validation error messages
    $labels = [
        'billAmount' => 'billAmountErrorLabel',
    ];

    // if there are errors, use clearer field labels
    if ($errors) {
        $tempErrors = [];
        foreach($errors as $error) {
            foreach($labels as $fieldName => $label) {
                $tempLabel = $form->get($label);
                $tempLabel = $form->sanitize($tempLabel);
                $tempErrors[] = str_replace($fieldName, $tempLabel, $error);
            }
        }
        $errors = $tempErrors;
    }

    // calculate per person bill if there are no errors, and format
    if(!$errors) {
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

}
