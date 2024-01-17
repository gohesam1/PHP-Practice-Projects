<?php
Mage::loadFileByClassName('Block_Core_Template');

 class Block_Customer_CustomerGroup_Grid extends Block_Core_Template
 {
 	protected $customerGroup = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Customer/CustomerGroup/grid.php');
 	}

 	public function setCustomerGroup($customerGroup = NULL)
	{
		if(!$customerGroup)
		{
			$customer = Mage::getModel('Model_Customer_CustomerGroup_Group');
			$customerGroup = $customer->FetchAll();
		}
		$this->customerGroup = $customerGroup;
		return $this;
	}

	public function getCustomerGroup()
	{
		if (!$this->customerGroup) {
			$this->setCustomerGroup();
		}
		return $this->customerGroup; 
	}
 } 
?>