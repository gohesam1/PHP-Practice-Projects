<?php
Mage::loadFileByClassName('Block_Core_Template');

 class Block_Customer_Grid extends Block_Core_Template
 {
 	protected $customers = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Customer/grid.php');
 	}

 	public function setCustomers($customers = NULL)
	{
		if(!$customers)
		{
			$customer = Mage::getModel('Model_Customer');
			$customers = $customer->FetchAll();
		}
		$this->customers = $customers;
		return $this;
	}

	public function getCustomers()
	{
		if (!$this->customers) {
			$this->setCustomers();
		}
		return $this->customers; 
	}
 } 
?>