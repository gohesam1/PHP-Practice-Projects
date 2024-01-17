<?php

Mage::loadFileByClassName('Block_Core_Template');

class Block_Product_Edit extends Block_Core_Template
{	

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Product/edit.php');
	}

	public function getTabContent()
	{
		$tabBlock = Mage::getBlock('Block_Product_Form_Tab');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if (!array_key_exists($tab, $tabs)) {
			return false;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = Mage::getBlock($blockClassName);
		echo $block->toHtml();
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