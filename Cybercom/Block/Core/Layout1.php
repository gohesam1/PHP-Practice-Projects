<?php
Mage::loadFileByClassName('Block_Core_Template');

 class Block_Core_Layout1 extends Block_Core_Template
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/core/twocolumn.php');
 		$this->prepareChildren();
 	}

 	public function prepareChildren()
 	{
 		$this->addChild(Mage::getBlock('Block_Core_Layout_Header'), 'header');
 		$this->addChild(Mage::getBlock('Block_Core_Layout_Footer') , 'footer');
 		$this->addChild(Mage::getBlock('Block_Core_Layout_Content') , 'content');
 		$this->addChild(Mage::getBlock('Block_Core_Layout_Message') , 'message');
 		$this->addChild(Mage::getBlock('Block_Core_Layout_Left') , 'left');
 	}
 } 
?>