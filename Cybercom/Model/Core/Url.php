<?php 

class Model_Core_Url 
{
	protected $request = NULL;

	public function __construct()
	{
		$this->setRequest();
	}
	
	public function setRequest(){
		$this->request = Mage::getModel('Model_Core_Request');
	}

	public function getRequest(){
		return $this->request;
	}

	public function getUrl($actionName = NULL , $controllerName = NULL , $params = [] , $resetParams = False){
		$final = $this->getRequest()->getGet();

		if ($resetParams) {
			$final = [];
		}
		if ($actionName == NULL) {
			$actionName = $this->getRequest()->getGet('a');
		}
		if ($controllerName == NULL) {
			$controllerName = $this->getRequest()->getGet('c');
		}
		$final['c'] = $controllerName;
		$final['a'] = $actionName;

		$final = array_merge($final,$params);
		$queryString = http_build_query($final);
		unset($final);
		return "http://localhost/cybercom/index.php?{$queryString}";
	}

	public function redirect($actionName = NULL , $controllerName = NULL , $params = [] , $resetParams = False)
	{
		$url = $this->getUrl($actionName,$controllerName,$params,$resetParams);
		header("Location:{$url}");
	}	

	public function baseUrl($subUrl = NULL)
	{
		$url = "http://localhost/cybercom/";
		if($subUrl)
		{
			$url .= $subUrl;
		}
		return $url;
	}
}
?>