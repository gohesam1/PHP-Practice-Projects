<?php
Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Customer_Address extends Controller_Core_Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function formAction(){

			$edit = Mage::getBlock('Block_Customer_Edit')->toHtml();
			$left = Mage::getBlock('Block_Customer_Form_Tab')->toHtml();
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
		try
		{
			$customer = Mage::getModel('Model_Customer_CustomerAddress_Address');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
			$id = $this->getRequest()->getGet('id');
			$billingData = $this->getRequest()->getPost('Billing');
			$customer->CustomerId = $id;
			$customer->addressType = 'Billing';
			$customer->setData($billingData);
			$customer->saveAddress();

			$shippingData = $this->getRequest()->getPost('Shipping');
			$customer->CustomerId = $id;
			$customer->addressType = 'Shipping';
			$customer->setData($shippingData);
			$customer->saveAddress();
			
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
} 
?>