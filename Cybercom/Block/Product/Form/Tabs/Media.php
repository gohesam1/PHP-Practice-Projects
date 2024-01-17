<?php 

Mage::loadFileByClassName('Block_Core_Template');

class Block_Product_Form_Tabs_Media extends Block_Core_Template
{
	protected $media = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Product/Form/Tabs/media.php');
	}

	public function setMedia($media = NULL)
	{
		if(!$media)
		{
			$id = $this->getRequest()->getGet('id');
			$media = Mage::getModel('Model_Product_Media');
			$media = $media->fetchMedia($id);
		}
		$this->media = $media;
		return $this;
	}

	public function getMedia()
	{
		if (!$this->media) {
			$this->setMedia();
		}
		return $this->media; 
	}
}
?>