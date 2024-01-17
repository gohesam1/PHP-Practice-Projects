<?php 

class Block_Core_Layout_Content extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/content.php');
	}
}
?>