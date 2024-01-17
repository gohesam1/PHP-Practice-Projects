<?php

Mage::loadFileByClassName('Block_Core_Template');

 class Block_Payment_Grid extends Block_Core_Template
 {

 	protected $payments = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Payment/grid.php');

 	}

 	public function setPayments($payments = NULL)
	{
		if(!$payments)
		{
			$payment = Mage::getModel('Model_Payment');
			$payments = $payment->FetchAll();
		}
		$this->payments = $payments;
		return $this;
	}

	public function getPayments()
	{
		if (!$this->payments) {
			$this->setPayments();
		}
		return $this->payments; 
	}
 } 
?>