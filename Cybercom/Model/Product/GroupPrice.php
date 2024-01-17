<?php
Mage::loadFileByClassName('Model_Core_Table');

class Model_Product_GroupPrice extends Model_Core_Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName("product_customer_group_price");
        $this->setPrimaryKey('entityId');
    }

    public function fetchPrice($id)
    {
    	$query = "SELECT `customer_group`.`groupName`, `customer_group`.`groupId`,`PCGP`.`price`, `PCGP`.`entityId`, `PCGP`.`productId`,`product`.`Price` FROM `customer_group` `CG` LEFT JOIN `product_customer_group_price` `PCGP` ON `CG`.`groupId` = `PCGP`.`groupId` JOIN `product` ON `product`.`productId` = `PCGP`.`productId` AND `PCGP`.`productId` = {$id} RIGHT JOIN `customer_group` ON `customer_group`.`groupId` = `PCGP`.`groupId`";

    	$rows = $this->fetchAll($query);
    	return $rows;
    }
}