<?php 

class Block_Core_Layout_Left extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/left.php');
	}
}
?>