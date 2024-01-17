<?php

Mage::loadFileByClassName('Model_Core_Table');
		
class Model_Admin extends Model_Core_Table
{
	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey("adminId");
		$this->setTableName("admin");
	}
}

?>