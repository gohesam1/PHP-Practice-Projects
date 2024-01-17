<?php 

Mage::loadFileByClassName('Controller_Core_Admin');
class Controller_Index extends Controller_Core_Admin{
	
	public function indexAction(){
		try {
			$layout = Mage::getBlock('BLock_Core_Layout');
			$dashBoard = Mage::getBlock('Block_Dashboard_Grid');
			$layout->getChild('content')->addChild($dashBoard,'dashBoard');
			echo $layout->toHtml();
			
		} catch (Exception $e) {
			$e->getMessage();
		}
		
	}
}
?>