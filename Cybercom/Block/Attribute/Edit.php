<?php

Mage::loadFileByClassName('Block_Core_Template');

class Block_Attribute_Edit extends Block_Core_Template
{	
	protected $attribute = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Attribute/edit.php');
	}

 	/*public function setAttribute($attribute = NULL)
 	{

 		if ($attribute) {
 			$this->attribute = $attribute;
 			return $this;
 		}
 		$attribute = Mage::getModel('Model_Attribute');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$attribute = $attribute->load($id);
 		}

 		$this->attribute = $attribute;
 		return $this;
 	}

 	public function getAttribute()
 	{
 		if (!$this->attribute) {
 			$this->setAttribute(); 
 		}
 		return $this->attribute;
 	}
*/
 	public function getEntitytype()
 	{
 		return [
 			'product'=>'Product',
 			'category'=>'Category'
 		];
 	}

 	public function getBackendtype()
 	{
 		return [
 			'int'=>'int',
 			'varchar'=>'varchar',
 			'text'=>'text',
 			'double'=>'double'
 		];
 	}

 	public function getInputtype()
 	{
 		return [
 			'text'=>'text',
 			'select'=>'select',
 			'radio'=>'radio',
 			'checkbox'=>'checkbox',
 			'textarea'=>'textarea'
 		];
 	}
}

?>