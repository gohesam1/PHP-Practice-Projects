<?php
Mage::loadFileByClassName('Block_Core_Template');
class Block_Customer_CustomerGroup_Edit extends Block_Core_Template
{	
	protected $customerGroup = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Customer/CustomerGroup/edit.php');
	}

 	public function setCustomerGroup($customerGroup = NULL)
 	{

 		if ($customerGroup) {
 			$this->customerGroup = $customerGroup;
 			return $this;
 		}
 		$customerGroup = Mage::getModel('Model_Customer_CustomerGroup_Group');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$customerGroup = $customerGroup->load($id);
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