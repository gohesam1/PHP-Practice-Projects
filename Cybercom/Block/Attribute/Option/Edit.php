<?php

Mage::loadFileByClassName('Block_Core_Template');

class Block_Attribute_Option_Edit extends Block_Core_Template
{
	protected $options = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Attribute/Options/edit.php');
	}

	public function setOptions($options = NULL)
 	{

 		if ($options) {
 			$this->options = $options;
 			return $this;
 		}
 		$option = Mage::getModel('Model_Attribute_Option');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$options = $option->fetchOption($id);
 		}
 		$this->options = $options;
 		return $this;
 	}

 	public function getOptions()
 	{
 		if (!$this->options) {
 			$this->setOptions(); 
 		}
 		return $this->options;
 	}
}
?>