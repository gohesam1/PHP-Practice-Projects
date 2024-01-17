<?php 
Mage::loadFileByClassName('Model_Core_Table');

class Model_Customer_CustomerAddress_Address extends Model_Core_Table
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('customerAddress');
    }

    public function saveAddress()
    {
	 $query = "INSERT INTO `{$this->getTableName()}` (`".implode('`, `', array_keys($this->data))."`)  VALUES ('".implode('\',\'', array_values($this->data))."');";
      $id = $this->getAdapter()->insert($query);
      return $id;
    }
}
?>