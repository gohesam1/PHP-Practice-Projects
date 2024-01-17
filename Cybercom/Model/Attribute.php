<?php

Mage::loadFileByClassName('Model_Core_Table');
		
class Model_Attribute extends Model_Core_Table
{
	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey("attributeId");
		$this->setTableName("attribute");
	}
}

?>