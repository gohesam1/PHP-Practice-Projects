<?php

class Block_Core_Template
{
	protected $request = NULL;
	protected $url = NULL;
	protected $template = NULL;
	protected $message = NULL;
	protected $controller;
	protected $children = [];

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
		return $this->url;
	}

	public function setTemplate($template)
 	{
 		$this->template = $template;
 		return $this;
 	}

 	public function getTemplate()
 	{
 		return $this->template;
 	}

	public function toHtml()
	{
		ob_start();
		require_once $this->getTemplate();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function setChildren(array $children = [])
	{
		$this->children = $children;
		return $this;
	}

	public function getChildren()
	{
		return $this->children;
	}

	public function addChild(Block_Core_Template $child , $key)
	{
		if (!$key) {
			$key = get_class($child);
		}
		$this->children[$key] = $child;
		return $this;
	}

	public function getChild($key)
	{
		if (!array_key_exists($key, $this->children)) {
			return false;
		}
		return $this->children[$key];
	}

	public function removeChild($key)
	{
		if (array_key_exists($key, $this->children)) {
			unset($this->children[$key]);
		}
		return $this;
	}

	public function setMessage()
	{
		$this->message =Mage::getModel('Model_Admin_Message');
		return $this;
	}

	public function getMessage()
	{
		if (!$this->message) {
			$this->setMessage();
		}
		return $this->message;
	}

	public function baseUrl($subUrl = NULL)
	{
		return $this->getUrl()->baseUrl($subUrl);
	}
}
