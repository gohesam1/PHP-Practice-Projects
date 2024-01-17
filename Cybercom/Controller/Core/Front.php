<?php 
Mage::loadFileByClassName('Model_Core_Request');
class Controller_Core_Front{
	public static function init()
	{
		$request = new Model_Core_Request();
		$controllerName = ucfirst($request->getControllerName());
		$actionName = $request->getActionName().'Action';
		require_once "./Controller/{$controllerName}.php";
		$controllerName = 'Controller_'.$controllerName;
		$controller = new $controllerName();
		$controller->$actionName();
	}
}

?>