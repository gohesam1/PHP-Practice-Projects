<?php
Mage::loadFileByClassName('Model_Core_Table');

class Model_Customer extends Model_Core_Table
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName("customer");
        $this->setPrimaryKey("CustomerId");
    }
}
?>