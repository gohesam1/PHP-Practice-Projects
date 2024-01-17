<?php

Mage::loadFileByClassName('Block_Core_Template');

 class Block_Attribute_Grid extends Block_Core_Template
 {
 	protected $attributes = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Attribute/grid.php');
 	}

 	public function setAttributes($attributes = NULL)
	{
		if(!$attributes)
		{
			$attribute = Mage::getModel('Model_Attribute');
			$attributes = $attribute->FetchAll();

		}
		$this->attributes = $attributes;
		return $this;
	}

	public function getAttributes()
	{
		if (!$this->attributes) {
			$this->setAttributes();
		}
		return $this->attributes; 
	}
 } 
?>