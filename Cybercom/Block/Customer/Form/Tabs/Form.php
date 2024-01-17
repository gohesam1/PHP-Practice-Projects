<?php 

Mage::loadFileByClassName('Block_Core_Template');

class Block_Customer_Form_Tabs_Form extends Block_Core_Template
{
	protected $customer = NULL;
	
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Customer/Form/Tabs/form.php');
	}

	public function setCustomer($customer = NULL)
 	{

 		if ($customer) {
 			$this->customer = $customer;
 			return $this;
 		}
 		$customer = Mage::getModel('Model_Customer');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$customer = $customer->load($id);
 		}

 		$this->customer = $customer;
 		return $this;
 	}

 	public function getCustomer()
 	{
 		if (!$this->customer) {
 			$this->setCustomer(); 
 		}
 		return $this->customer;
 	}	
}

?>