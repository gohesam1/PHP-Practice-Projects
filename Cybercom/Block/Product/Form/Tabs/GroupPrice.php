<?php 

Mage::loadFileByClassName('Block_Core_Template');

class Block_Product_Form_Tabs_GroupPrice extends Block_Core_Template
{
	protected $price = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Product/Form/Tabs/groupPrice.php');
	}

	public function setPrice($price = NULL)
	{
		if(!$price)
		{
			$id = $this->getRequest()->getGet('id');
			$price = Mage::getModel('Model_Product_GroupPrice');
			$price = $price->fetchPrice($id);
		}
		$this->price = $price;
		return $this;
	}

	public function getPrice()
	{
		if (!$this->price) {
			$this->setPrice();
		}
		return $this->price; 
	}
}
?>