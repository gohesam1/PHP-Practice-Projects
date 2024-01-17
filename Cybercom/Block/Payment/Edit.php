<?php

Mage::loadFileByClassName('Block_Core_Template');

class Block_Payment_Edit extends Block_Core_Template
{	
	protected $payment = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Payment/edit.php');
	}

 	public function setPayment($payment = NULL)
 	{

 		if ($payment) {
 			$this->payment = $payment;
 			return $this;
 		}
 		$payment = Mage::getModel('Model_Payment');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$payment = $payment->load($id);
 		}

 		$this->payment = $payment;
 		return $this;
 	}

 	public function getPayment()
 	{
 		if (!$this->payment) {
 			$this->setPayment(); 
 		}
 		return $this->payment;
 	}	
}

?>