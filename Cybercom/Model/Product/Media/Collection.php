<?php
class Model_Product_Media_Collection
{
	protected $data = [];

	public function setData(array $data)
	{
		$this->data = $data;
		return $this;
	}

	public function getdata()
	{
		return $this->data;
	}

	public function count()
	{
		return count($this->data);
	}
} 
?>