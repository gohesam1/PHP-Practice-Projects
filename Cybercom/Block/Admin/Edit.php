<?php

Mage::loadFileByClassName('Block_Core_Template');

class Block_Admin_Edit extends Block_Core_Template
{	
	protected $admin = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/edit.php');
	}

 	public function setAdmin($admin = NULL)
 	{

 		if ($admin) {
 			$this->admin = $admin;
 			return $this;
 		}
 		$admin = Mage::getModel('Model_Admin');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$admin = $admin->load($id);
 		}

 		$this->admin = $admin;
 		return $this;
 	}

 	public function getAdmin()
 	{
 		if (!$this->admin) {
 			$this->setAdmin(); 
 		}
 		return $this->admin;
 	}
}

?>