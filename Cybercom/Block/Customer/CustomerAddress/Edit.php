<?php

Mage::loadFileByClassName('Block_Core_Template');

class Block_Customer_CustomerAddress_Edit extends Block_Core_Template
{	
	protected $customer = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Customer/CustomerAddress/edit.php');
	}

	
}

?>