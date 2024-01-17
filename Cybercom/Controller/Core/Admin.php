<?php 

class Controller_Core_Admin{
	protected $request = NULL;
	protected $message = NULL;
	protected $url = NULL;

	public function __construct(){
		$this->setRequest();
		$this->setUrl();
	}

	public function setRequest(){
		$this->request = Mage::getModel('Model_Core_Request');
	}

	public function getRequest(){
		return $this->request;
	}

	public function setUrl(){
		$this->url = Mage::getModel('Model_Core_Url');
	}

	public function getUrl(){
		if (!$this->url) {
			$this->setUrl();
		}
		return $this->url;
	}

	public function setMessage()
	{
		$this->message = Mage::getModel('Model_Admin_Message');
		return $this;
	}

	public function getMessage()
	{
		if (!$this->message) {
			$this->setMessage();
		}
		return $this->message;
	}
}

?>