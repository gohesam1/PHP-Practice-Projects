<?php

Mage::loadFileByClassName('Block_Core_Template');

class Block_Category_Edit extends Block_Core_Template
{	
	protected $category = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Category/edit.php');
	}

	public function getTabContent()
	{
		$tabBlock = Mage::getBlock('Block_Category_Form_Tab');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if (!array_key_exists($tab, $tabs)) {
			return false;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = Mage::getBlock($blockClassName);
		echo $block->toHtml();
	}

 	public function setCategory($category = NULL)
 	{

 		if ($category) {
 			$this->category = $category;
 			return $this;
 		}
 		$category = Mage::getModel('Model_Category');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$category = $category->load($id);
 		}

 		$this->category = $category;
 		return $this;
 	}

 	public function getCategory()
 	{
 		if (!$this->category) {
 			$this->setCategory(); 
 		}
 		return $this->category;
 	}

 	 	
}

?>