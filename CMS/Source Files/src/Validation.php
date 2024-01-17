<?php
class Validation {

    private $rules;
    private $errorMessages = [];


//     public function ValidatPassword ($password) {

//        /*
//        // Minimum number os characters 
//         if (strlen($password)<3) {
//             return false;
//         }

//         // Maximum
//         if (strlen($password)>20) {
//             return false;
//         }

//         // One special
//         if ( !preg_match("/[^a-zA-Z0-9]+/", $password )) {
//             return false;
//         }
//         */



//         $validationMinimum = new ValidateMinimum(3);
//         if (!$validationMinimum->validateRule($password)) {
//             return false;
//         }

//         $validationMaximum = new ValidateMaximum(3);
//         if (!$validationMaximum->validateRule($password)) {
//             return false;
//         }

//         $validateSpecialCharater = new ValidateSpecialCharater(3);
//         if (!$validateSpecialCharater->validateRule($password)) {
//             return false;
//         }

//         return true;

//     }



//     public function ValidatUsername ($username) {
//         if (strlen($username)<3) {
//             return false;
//         }

//         // Maximum
//         if (strlen($username)>20) {
//             return false;
//         }

//         if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
//             return false;
//         }   
//         return true;

//     }


    public function addRule (ValidationRuleInterface $rule) {
        $this->rules[] = $rule;
        return $this;
    }

    public function validate($value) {
        foreach ($this->rules as $rule) {
            $ruleValidation = $rule->validateRule($value);
            if(!$ruleValidation){
                $this->errorMessages [] = $rule->getErrorMessage();
                return false;
            }
        }
        
        return true;
    }

    public function getAllErrorMessages() {
        return $this->errorMessages;
    }
}