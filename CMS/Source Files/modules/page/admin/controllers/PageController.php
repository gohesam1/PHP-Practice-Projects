<?php

class PageController extends Controller{

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
        $this->template->view('page/admin/views/page-list', $variables);
        
    }

}