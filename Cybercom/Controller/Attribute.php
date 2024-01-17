<?php

Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Attribute extends Controller_Core_Admin
{
	public function gridHtmlAction()
	{
		$gridHtml = Mage::getBlock('Block_Attribute_grid')->toHtml();
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
			
			$edit = Mage::getBlock('Block_Attribute_Edit')->toHtml();
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
		catch (Exception $e) {
			$e->getMessage();
		}
		
	}

	public function saveAction()
	{	
		try{
				$attribute = Mage::getModel('Model_Attribute');
				if (!$this->getRequest()->isPost()) {
					throw new Exception("Invalid request");
				}
				$attributeData = $this->getRequest()->getPost('Attribute');
				$attribute->attributeId = NULL;
				$attribute->setData($attributeData);
				$attribute->save();
				$gridHtml = Mage::getBlock('Block_Attribute_Grid')->toHtml();

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
				$edit->getMessage()->setFailure($e->getMessage());
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
			$attribute = Mage::getModel('Model_Attribute');
			$attribute->deleteData($id);
			$gridHtml = Mage::getBlock('Block_Attribute_Grid')->toHtml();
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
			$edit->getMessage()->setFailure($e->getMessage());
		}	
	}

}
?>