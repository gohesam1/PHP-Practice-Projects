<?php

class DashboardController extends Controller{

    function runBeforeAction() {
        if($_SESSION['is_admin'] ?? false == true){
            return true;
        }
        
        $action = $_GET['action'] ?? $_POST['action'] ?? 'default';

        if($action != 'login'){
            
            header('Location: /Learning/My practice files/PHP Practice Projects/CMS/Source Files/public/admin/index.php?module=dashboard&action=login');
        } else {
            return true;
            
        }
    }
    
    function defaultAction() {
        $variables = [];
        header('Location: /Learning/My practice files/PHP Practice Projects/CMS/Source Files/public/admin/index.php?module=page');
        exit();
        
    }

    function loginAction(){

        
        if($_POST['postAction'] ?? 0 == 1)
        {

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            /*
            $Validation = new Validation();
            if (!$Validation->ValidatPassword($password)) {
                $_SESSION['ValidationRules']['error'] = 'Password must be between 3 and 20 characters and must contain one special character.';
            }


            if (!$Validation->ValidatUsername($username)) {
                $_SESSION['ValidationRules']['error'] = 'Username is not correct';
            }
            */
            
            $validation = new Validation();
            if(!$validation
                ->addRule(new ValidateMinimum(3))
                ->addRule(new ValidateMaximum(20))
                //->addRule(new ValidateNoEmptySpaces())
                //->addRule(new ValidateSpecialCharater(3))
                ->validate($password)
            ) {
                $_SESSION['ValidationRules']['errors'] = $validation->getAllErrorMessages();
            }

        
            if(!$validation
                ->addRule(new ValidateMinimum(3))
                ->addRule(new ValidateMaximum(20))
                //->addRule(new ValidateEmail())
                ->validate($username)
            ) {
                $_SESSION['ValidationRules']['error'] = 'Username is not valid.';
            }

        // echo "<pre>"; print_r($_SESSION);
        // die();
            // if (($_SESSION['ValidationRules']['error'] ?? '') == '') {
                $auth = new Auth();
                if($auth->checkLogin($username, $password)){
                    // All is good 
                    $_SESSION['is_admin'] = 1;
                    header('Location: /Learning/My practice files/PHP Practice Projects/CMS/Source Files/public/admin/');
                    exit();
                } 
                    $_SESSION['ValidationRules']['errors'] = $validation->getAllErrorMessages();
                    
            // }
            //var_dump('Bad login');
            
        }

        include VIEW_PATH . '/admin/login.html';  
        unset($_SESSION['validationRules']['error'] );
    }
}