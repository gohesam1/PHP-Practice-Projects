<?php 

Mage::loadFileByClassName('Block_Core_Template');

class Block_Product_Form_Tabs_Form extends Block_Core_Template
{
	protected $product = NULL;
	
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Product/Form/Tabs/form.php');
	}

	public function setProduct($product = NULL)
 	{

 		if ($product) {
 			$this->product = $product;
 			return $this;
 		}
 		$product = Mage::getModel('Model_Product');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$product = $product->load($id);
 		}

 		$this->product = $product;
 		return $this;
 	}

 	public function getProduct()
 	{
 		if (!$this->product) {
 			$this->setProduct(); 
 		}
 		return $this->product;
 	}	
}

?>