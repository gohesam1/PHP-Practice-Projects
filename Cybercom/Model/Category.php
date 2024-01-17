<?php

Mage::loadFileByClassName('Model_Core_Table');
		
class Model_Category extends Model_Core_Table
{
	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey("CategoryId");
		$this->setTableName("category");
	}

	public function updatePath()
	{
		if (!$this->parentId) {
 			$path = $this->CategoryId;
 		}
 		else{
 			$parent = Mage::getModel('Model_Category')->load($this->parentId);
 			$path = $parent->path.'='.$this->CategoryId;
 		}

 		$this->path = $path;
 		return $this->save();
	}

	public function updateChildrenPath($categoryPath, $parentId = NULL)
	{
		$categoryPath = $categoryPath."=";
	 		$query = "SELECT * FROM `category` WHERE '{$categoryPath}%'ORDER BY path ASC";
	 		$categories = $this->getAdapter()->fetchAll($query);
	 		foreach ($categories as $key => $row) {
	 			$row = Mage::getModel('Model_Category')->load($row['CategoryId']);

	 			if ($parentId != NULL) {
	 				$row->parentId = $parentId;
	 			}
	 			$row->updatePath();
	 		}
	}
}

	


?>