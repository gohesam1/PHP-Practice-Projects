<?php 

class Block_Core_Layout_Footer extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/foot.html');
	}
}
?>