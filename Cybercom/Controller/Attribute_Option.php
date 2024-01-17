<?php 

Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Attribute_Option extends Controller_Core_Admin{
	
	public function gridAction(){

		try {

			$edit = Mage::getBlock('Block_Attribute_Option_Edit')->toHtml();
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
			$optionModel = Mage::getModel('Model_Attribute_Option');
			$optionExist = $this->getRequest()->getPost('exist');
			$optionNew = $this->getRequest()->getPost('new');
			$optionRemove = implode(',',array_keys($optionExist));

			$optionModel->deleteOption($optionRemove);
			
			foreach ($optionExist as $key => $value) {
				$optionModel->optionId = $key;
				$optionModel->setData($value);
				$optionModel->save();
			}
			/*echo "<pre>";
			print_r($optionNew);
			die();

			foreach ($optionNew as $key => $value) {
				$optionModel->optionId = NULL;
				$optionModel->setData($value);
				$optionModel->save();
			}*/

			$edit = Mage::getBlock('Block_Attribute_Option_Edit')->toHtml();
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
}
?>