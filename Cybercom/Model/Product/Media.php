<?php
Mage::loadFileByClassName('Model_Core_Table');

class Model_Product_Media extends Model_Core_Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName("productmedia");
    }

     public function fetchMedia($id)
    {  
        $query = "SELECT * FROM `{$this->getTableName()}`WHERE `productId`=$id";
        
        $rows = $this->getAdapter()->fetchAll($query);

        if (!$rows) {
            return false;
        }
        foreach ($rows as $key => $value) {
            $rows = new $this;
            $rows->setData($value);
            $rowArray[] = $rows;
        }
        $className = get_class($this).'_Collection';
        $collection = Mage::getModel($className);
        $collection->setData($rowArray);
        unset($rowArray);
        return $collection;
    }

    public function deleteMedia($img)
    {

        $query = "DELETE FROM `{$this->getTableName()}` WHERE `img`='$img'";
        
        $this->getAdapter()->delete($query);
        return true;
    }

    public function updateMedia($key)
    {
        $query = "UPDATE `productmedia` SET `gallery`= $key WHERE `imgId`=$key";

        $this->getAdapter()->update($query);

        return true;
    }
}
?>