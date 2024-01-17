<?php

Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Customer extends Controller_Core_Admin
{
 	
 	public function gridHtmlAction(){
 		try {
 			
			$gridHtml = Mage::getBlock('Block_Customer_Grid')->toHtml();
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
 		catch (Exception $e) {
 			$e->getMessage();
 		}
		
	}

	public function formAction(){

			if ($this->getRequest()->getGet('id')) {
				$left = Mage::getBlock('Block_Product_Form_Tab')->toHtml();
			}
			else{
				$left = NULL;
			}
			$edit = Mage::getBlock('Block_Customer_Edit')->toHtml();
			$response = [
			'status'=>'success',
			'message'=>'excellent',
			'element'=>[
				[
					'selector'=>'#contentHtml',
					'html'=>$edit
				],
				[
					'selector'=>'#leftHtml',
					'html'=>$left
				]
			]
		];
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($response);
	}

	public function saveAction()
 	{
 		try{

	 		$customer = Mage::getModel('Model_Customer');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
			$id = $this->getRequest()->getGet('id');
			$customerData = $this->getRequest()->getPost('Customer');
			if ($id) {
				$customer->updatedDate = Date("Y-m-d H:i:s");
				$customer->CustomerId = $id;
			}
			else{
				$customer->createdDate = Date("Y-m-d H:i:s");
			}
			$customer->CustomerId = $id;
			$customer->setData($customerData);
			$customer->save();
			$gridHtml = Mage::getBlock('Block_Customer_Grid')->toHtml();

			$response = [
				'status'=>'success',
				'message'=>'excellent',
				'element'=>[
					[
						'selector'=>'#contentHtml',
						'html'=>$gridHtml
					],
					[
						'selector'=>'#leftHtml',
						'html'=>NULL
					]
				]
			];
			header("Content-type: application/json; charset=utf-8");
			echo json_encode($response);
			
	 	}
	 	catch(Exception $e)
	 	{
	 		$e->getMessage();
	 	}
 	}


  	public function deleteAction()
 	{	
 		try{
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
			$id = $this->getRequest()->getGet('id');
			$customer = Mage::getModel('Model_Customer');
		
			$customer->deleteData($id);
			$gridHtml = Mage::getBlock('Block_Customer_Grid')->toHtml();
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
	 		$e->getMessage();
	 	}
 	}

 	public function changeStatusAction()
	{
		try
		{
			$customer = Mage::getModel('Model_Customer');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$customerStatus = $this->getRequest()->getGet('Status');
		 	$customer->CustomerId = $this->getRequest()->getGet('id');
		 	if ($customerStatus == 'Disable') {
		 		$customer->Status = 'Enable';
		 	}
		 	elseif ($customerStatus == 'Enable') {
		 		$customer->Status = 'Disable';
		 	}
			$customer->save();
			$gridHtml = Mage::getBlock('Block_Customer_Grid')->toHtml();
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