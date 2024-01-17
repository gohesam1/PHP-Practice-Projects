<?php 

Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Shipping extends Controller_Core_Admin{

	public function gridHtmlAction(){
		try {

			$gridHtml = Mage::getBlock('Block_Shipping_Grid')->toHtml();
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

		} catch (Exception $e) {
			$e->getMessage();
		}
		
	}

	public function formAction(){

		$edit = Mage::getBlock('Block_Shipping_Edit')->toHtml();
			$response = [
			'status'=>'success',
			'message'=>'excellent',
			'element'=>[
				[
					'selector'=>'#contentHtml',
					'html'=>$edit
				]
			]
		];
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($response);
	}

	public function saveAction()
	{
			
		try{
			
	 		$shipping = Mage::getModel('Model_Shipping');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
			$id = $this->getRequest()->getGet('id');
			$shippingData = $this->getRequest()->getPost('Shipping');
			if ($id) {
				$shipping->MethodId = $id;
			}
			else{
				$shipping->createdDate = Date("Y-m-d H:i:s");
			}
			$shipping->MethodId = $id;
			$shipping->setData($shippingData);
			$shipping->save();
			$gridHtml = Mage::getBlock('Block_Shipping_Grid')->toHtml();

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
	 	catch(Exception $e)
	 	{
	 		$this->getMessage()->setFailure($e->getMessage());
	 	}
	}

	public function deleteAction()
	{
		try
		{
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
			$id = $this->getRequest()->getGet('id');
			$shipping = Mage::getModel('Model_Shipping');
			$shipping->deleteData($id);
			$gridHtml = Mage::getBlock('Block_Shipping_Grid')->toHtml();
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
		catch (Exception $e)
		{
			$this->getMessage()->setFailure($e->getMessage());
		}		
	}

	public function changeStatusAction()
	{
		try
		{
			$shipping = Mage::getModel('Model_Shipping');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$shippingStatus = $this->getRequest()->getGet('Status');
		 	$shipping->MethodId = $this->getRequest()->getGet('id');
		 	if ($shippingStatus == 'Disable') {
		 		$shipping->Status = 'Enable';
		 	}
		 	elseif ($shippingStatus == 'Enable') {
		 		$shipping->Status = 'Disable';
		 	}
			$shipping->save();
			$gridHtml = Mage::getBlock('Block_Shipping_Grid')->toHtml();
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
		catch (Exception $e)
		{
			$e->getMessage();
		}
	}
}
?>