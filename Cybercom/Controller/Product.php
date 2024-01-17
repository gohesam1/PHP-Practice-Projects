<?php 

Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Product extends Controller_Core_Admin{

	public function gridHtmlAction(){
		$gridHtml = Mage::getBlock('Block_Product_Grid')->toHtml();
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

	public function formAction(){
		try {

			if ($this->getRequest()->getGet('id')) {
				$left = Mage::getBlock('Block_Product_Form_Tab')->toHtml();
			}
			else{
				$left = NULL;
			}
			$edit = Mage::getBlock('Block_Product_Edit')->toHtml();
			
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
		catch (Exception $e) {
			$e->getMessage();
		}
		
	}

	public function saveAction()
	{	
		try{
			$product = Mage::getModel('Model_Product');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
				$id = $this->getRequest()->getGet('id');
				$productData = $this->getRequest()->getPost('Product');

				if ($id) {
					$product->updatedDate = Date("Y-m-d H:i:s");
					$product->ProductId = $id;
				}
				else{
					$product->createdDate = Date("Y-m-d H:i:s");
				}
				$product->ProductId = $id;
				$product->setData($productData);
				$product->save();
				$gridHtml = Mage::getBlock('Block_Product_Grid')->toHtml();

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
			$product = Mage::getModel('Model_Product');
			$product->deleteData($id);
			$gridHtml = Mage::getBlock('Block_Product_Grid')->toHtml();
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
			$product = Mage::getModel('Model_Product');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$productStatus = $this->getRequest()->getGet('Status');
		 	$product->ProductId = $this->getRequest()->getGet('id');
		 	if ($productStatus == 'Disable') {
		 		$product->Status = 'Enable';
		 	}
		 	elseif ($productStatus == 'Enable') {
		 		$product->Status = 'Disable';
		 	}
		 	
			$product->save();

			$gridHtml = Mage::getBlock('Block_Product_Grid')->toHtml();
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