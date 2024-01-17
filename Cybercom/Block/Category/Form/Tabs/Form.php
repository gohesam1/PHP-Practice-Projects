<?php 

Mage::loadFileByClassName('Block_Core_Template');

class Block_Category_Form_Tabs_Form extends Block_Core_Template
{
	protected $category = NULL;
	protected $categoryOptions = [];

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Category/Form/Tabs/form.php');
	}

	public function setCategory($category = NULL)
 	{

 		if ($category) {
 			$this->category = $category;
 			return $this;
 		}
 		$category = Mage::getModel('Model_Category');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$category = $category->load($id);
 		}

 		$this->category = $category;
 		return $this;
 	}

 	public function getCategory()
 	{
 		if (!$this->category) {
 			$this->setCategory(); 
 		}
 		return $this->category;
 	}	

 	public function getCategoryOptions()
 	{
 		if (!$this->categoryOptions) {
 			$query = "SELECT `CategoryId`,`Name` FROM `{$this->getCategory()->getTableName()}`";
 			$options = $this->getCategory()->getAdapter()->fetchPairs($query);
 			$query = "SELECT `CategoryId`,`path` FROM `{$this->getCategory()->getTableName()}`";
 			$this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);

 			foreach ($this->categoryOptions as $key => &$value) {
 				$paths = explode('=', $value);
 				
 				foreach ($paths as $key => &$id) {
 					if (array_key_exists($id, $options)) {
 						$id = $options[$id];
 					}
 				}
 				$value = implode("->", $paths);
 			}
 			$this->categoryOptions = ["0"=>"Select Category"] + $this->categoryOptions;
 		}
 		return $this->categoryOptions;
 	}
}

?>