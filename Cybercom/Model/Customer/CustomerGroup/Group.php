<?php 
Mage::loadFileByClassName('Model_Core_Table');

class Model_Customer_CustomerGroup_Group extends Model_Core_Table
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName("customer_group");
        $this->setPrimaryKey("groupId");
    }

    public function fetchGroup()
    {
        $query = "SELECT Name FROM `customer_group`";
        $rows = $this->getAdapter()->fetchAll($query);
        return $rows;
      
    }
}
?>