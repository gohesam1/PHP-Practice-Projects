<?php

Mage::loadFileByClassName('Block_Core_Template');

 class Block_Dashboard_Grid extends Block_Core_Template
 {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Dashboard/dashboard.php');

 	}


 } 
?>