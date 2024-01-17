<?php

class ValidateMaximum implements ValidationRuleInterface {

    private $maximum;

    public function __construct($maximum) {
        $this->maximum = $maximum;
    }
    function validateRule($value){
        if (strlen($value) > $this->maximum) {
            return false;
        }
        return true;
    }
    function getErrorMessage() {
        return "The maximum value is over" . $this->maximum;
    }
}