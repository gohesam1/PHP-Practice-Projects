<?php 

Mage::loadFileByClassName('Block_Core_Template');

class Block_Category_Form_Tabs_Media extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Category/Form/Tabs/media.php');
	}
}
?>