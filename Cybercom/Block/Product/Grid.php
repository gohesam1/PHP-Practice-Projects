<?php

Mage::loadFileByClassName('Block_Core_Template');

 class Block_Product_Grid extends Block_Core_Template
 {
 	protected $products = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Product/grid.php');
 	}

 	public function setProducts($products = NULL)
	{
		if(!$products)
		{
			$product = Mage::getModel('Model_Product');
			$products = $product->FetchAll();
		}
		$this->products = $products;
		return $this;
	}

	public function getProducts()
	{
		if (!$this->products) {
			$this->setProducts();
		}
		return $this->products; 
	}
 } 
?>