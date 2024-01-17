<?php
Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Product_Media extends Controller_Core_Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		try {
			if (!$this->getRequest()->getGet('id')) {
				return NULL;
			}

			$layout = Mage::getBlock('Block_Core_Layout');
			$grid = Mage::getBlock('Block_Product_Form_Tabs_Media');
			
			$layout->getChild('content')->addChild($grid,'grid');
			echo $layout->toHtml();
		} 
		catch (Exception $e) {
			$e->getMessage();
		}
	}

	public function saveAction()
	{	
		try{
			$media = Mage::getModel('Model_Product_Media');
			$img = $_FILES['file']['name'];
			$temp = $_FILES['file']['tmp_name'];
			$path = 'Images/';
			move_uploaded_file($temp, $path.$img);
			$media->ProductId = $this->getRequest()->getGet('id');
			$media->img = $img;
			$media->save();

			$this->getUrl()->redirect('grid','Product_Media',['tab'=>'media']);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function deleteAction()
	{
		$data = $this->getRequest()->getPost();

		$media = Mage::getModel('Model_Product_Media');

		foreach ($data['remove'] as $key => $value) {
			$media->deleteMedia($value);
		}
		$this->getUrl()->redirect('grid','Product_Media',[],true);
	}

	public function updateAction()
	{
		$media = Mage::getModel('Model_Product_Media');	
		$data = $this->getRequest()->getPost('image');
		echo "<pre>";
		foreach ($data as $key => $value) {
			print_r($value);
			//$media->updateMedia($key);
		}
		//$this->getUrl()->redirect('grid','Product_Media',[],true);
	}
} 
?>