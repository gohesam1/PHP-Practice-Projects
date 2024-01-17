<?php

Mage::loadFileByClassName('Block_Core_Template');

 class Block_Admin_Grid extends Block_Core_Template
 {
 	protected $admins = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/grid.php');
 	}

 	public function setAdmins($admins = NULL)
	{
		if(!$admins)
		{
			$admin = Mage::getModel('Model_Admin');
			$admins = $admin->FetchAll();
		}
		$this->admins = $admins;
		return $this;
	}

	public function getAdmins()
	{
		if (!$this->admins) {
			$this->setAdmins();
		}
		return $this->admins; 
	}
 } 
?>