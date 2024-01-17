<?php 
require_once './Controller/Core/Front.php';
class Mage{
	public static function init(){
		Controller_Core_Front::init();
	}

	public static function loadFileByClassName($classname)
	{
		$classname = str_replace('_',' ', $classname);
		$classname = ucwords($classname);
		$classname = str_replace(' ','/', $classname);
		$classname = $classname.'.php';
		require_once $classname;
	}

	public function getModel($classname)
	{
		Mage::loadFileByClassName($classname);		
		return new $classname();
	}

	public function getController($classname)
	{
		Mage::loadFileByClassName($classname);		
		return new $classname();
	}

	public function getBlock($classname)
	{
		Mage::loadFileByClassName($classname);		
		return new $classname();
	}
}
Mage::init();
?>