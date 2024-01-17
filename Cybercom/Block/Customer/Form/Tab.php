<?php

Mage::loadFileByClassName('Block_Core_Template');

 class Block_Customer_Form_Tab extends Block_Core_Template 
 {
 	protected $tabs = [];
 	protected $defaultTab = NULL;

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Customer/Form/tab.php');
 		$this->prepareTab();
 	}

 	public function prepareTab()
 	{
 		$this->addTab('form',['label'=>'Customer Information','block'=>'Block_Customer_Form_Tabs_Form']);
 		$this->addTab('address',['label'=>'Customer Address','block'=>'Block_Customer_CustomerAddress_Edit']);
 		$this->setDefaultTab('form');
 		return $this;
 	}

 	public function setDefaultTab($defaultTab)
 	{
 		$this->defaultTab = $defaultTab;
 		return $this;
 	}

 	public function getDefaultTab()
 	{
 		return $this->defaultTab;
 	}

 	public function setTabs(array $tabs)
 	{
 		$this->tabs = $tabs;
 		return $this;
 	}

 	public function getTabs()
 	{
 		return $this->tabs;
 	}

 	public function addTab($key,$tabs = [])
 	{
 		$this->tabs[$key] = $tabs;
 		return $this;
 	}

 	public function getTab($key)
 	{
 		if (!array_key_exists($key, $tabs)) {
 			return $this;
 		}
 		return $this->tabs[$key];
 	}

 	public function removeTab($key)
 	{
 		if (array_key_exists($key, $tabs)) {
 			unset($this->tabs[$key]);
 		}
 		return $this;
 	}
 } 
?>