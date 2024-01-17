<?php

session_start();


define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR );
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define('MODULE_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);
define('ENCRYPTION_SALT', 'jaksacneioldasdmfs325465jdfna');

require_once ROOT_PATH . 'src/interfaces/ValidationRuleInterface.php';
require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'src/Auth.php';
require_once ROOT_PATH . 'src/Validation.php';
require_once ROOT_PATH . 'src/ValidationRules/ValidateMinimum.php';
require_once ROOT_PATH . 'src/ValidationRules/ValidateMaximum.php';
require_once ROOT_PATH . 'src/ValidationRules/ValidateEmail.php';
require_once ROOT_PATH . 'src/ValidationRules/ValidateSpecialCharater.php';
require_once ROOT_PATH . 'src/ValidationRules/ValidateNoEmptySpaces.php';
require_once MODULE_PATH . 'page/models/Page.php';
require_once MODULE_PATH . 'users/models/User.php';


/*Bootstrap*/
/* Connect to a MySQL database using driver invocation */
DatabaseConnection::connect('localhost', 'darwin_cms', 'root', '');

// if / else logic 

$module = $_GET['module'] ?? $_POST['module'] ?? 'dashboard';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

if ($module=='dashboard') {    

    include MODULE_PATH . '/dashboard/admin/controllers/DashboardController.php';
    $dashboardController = new DashboardController();
    $dashboardController->template = new Template ('admin/layout/default');
    $dashboardController->runAction($action);

} else if ($module = 'page') {
    
    include MODULE_PATH . '/page/admin/controllers/PageController.php';
    $PageController = new PageController();
    $PageController->template = new Template ('view/admin/layout/default');
    $PageController->runAction($action);
}

