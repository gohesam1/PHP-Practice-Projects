<?php

Mage::loadFileByClassName('Block_Core_Template');

 class Block_Shipping_Grid extends Block_Core_Template
 {
 	protected $shippings = NULL;

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Shipping/grid.php');
 	}

 	public function setShippings($shippings = NULL)
	{
		if(!$shippings)
		{
			$shipping = Mage::getModel('Model_Shipping');
			$shippings = $shipping->FetchAll();
		}
		$this->shippings = $shippings;
		return $this;
	}

	public function getShippings()
	{
		if (!$this->shippings) {
			$this->setShippings();
		}
		return $this->shippings; 
	}
 } 
?>