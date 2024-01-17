<?php

Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Category extends Controller_Core_Admin
{

 	public function gridHtmlAction(){
 		try {

 			$gridHtml = Mage::getBlock('Block_Category_Grid')->toHtml();
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

			$edit = Mage::getBlock('Block_Category_Edit')->toHtml();
			$left = Mage::getBlock('Block_Category_Form_Tab')->toHtml();
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
 			$category = Mage::getModel('Model_Category');
 			if ($id = $this->getRequest()->getGet('id')) {
	 			$category = $category->load($id);
	 			
	 			if (!$category) {
	 				throw new Exception("Record not found.");
	 				
	 			}
	 		}
	 		$categoryPath = $category->path;
	 		$categoryData = $this->getRequest()->getPost('Category');
	 		$category->setData($categoryData);
	 		
	 		$category->CategoryId = $id;

	 		$id = $category->save();
	 		$category->CategoryId = $id;

	 		$category->updatePath();
	 		$category->updateChildrenPath($categoryPath);

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
			$category = Mage::getModel('Model_Category');
			if ($id = $this->getRequest()->getGet('id')) {
				$category = $category->load($id);
				if (!$category) {
					throw new Exception("Id no found");
				}
			}

			$path = $category->path;
			$parentId = $category->parentId;
			$category->updateChildrenPath($path,$parentId);
			$category->deleteData($id);
			$gridHtml = Mage::getBlock('Block_Category_Grid')->toHtml();
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
			$category = Mage::getModel('Model_Category');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$categoryStatus = $this->getRequest()->getGet('Status');
		 	$category->CategoryId = $this->getRequest()->getGet('id');
		 	if ($categoryStatus == 'Disable') {
		 		$category->Status = 'Enable';
		 	}
		 	elseif ($categoryStatus == 'Enable') {
		 		$category->Status = 'Disable';
		 	}
			$category->save();
			$gridHtml = Mage::getBlock('Block_Category_Grid')->toHtml();
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