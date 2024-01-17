<?php

Mage::loadFileByClassName('Block_Core_Template');

class Block_Shipping_Edit extends Block_Core_Template
{	
	protected $shipping = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Shipping/edit.php');
	}

 	public function setShipping($shipping = NULL)
 	{

 		if ($shipping) {
 			$this->shipping = $shipping;
 			return $this;
 		}
 		$shipping = Mage::getModel('Model_Shipping');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$shipping = $shipping->load($id);
 		}

 		$this->shipping = $shipping;
 		return $this;
 	}

 	public function getShipping()
 	{
 		if (!$this->shipping) {
 			$this->setShipping(); 
 		}
 		return $this->shipping;
 	}
}

?>