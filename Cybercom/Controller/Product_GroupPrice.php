<?php 

Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Product_GroupPrice extends Controller_Core_Admin{

	public function gridHtmlAction(){

		$gridHtml = Mage::getBlock('Block_Product_Form_Tabs_GroupPrice')->toHtml();
		$response = [
			'status'=>'success',
			'message'=>'excellent',
			'element'=>[
				[
					'selector'=>'#contentHtml',
					'html'=>$gridHtml
				]
			]
		];
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($response);
	}

	public function saveAction()
	{
		$priceData = $this->getRequest()->getpost('Price');
		$priceModel = Mage::getModel('Model_Product_GroupPrice');
	
		foreach ($priceData['exist'] as $key => $value) {
			$priceModel->entityId = $key;
			$priceModel->price = $value;
			$priceModel->save();
		}

		$priceModel->entityId = NULL; 	
		$priceModel->groupId = $this->getRequest()->getpost('groupId');
		$priceModel->productId = $this->getRequest()->getpost('productId');
		echo "<pre>";
		print_r($priceModel);
		die();
		foreach ($priceData['new'] as $key => $value) {
			$priceModel->price = $value;
			$priceModel->save();
		}

		$gridHtml = Mage::getBlock('Block_Product_Form_Tabs_GroupPrice')->toHtml();
		$response = [
			'status'=>'success',
			'message'=>'excellent',
			'element'=>[
				[
					'selector'=>'#contentHtml',
					'html'=>$gridHtml
				]
			]
		];
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($response);
	}
}