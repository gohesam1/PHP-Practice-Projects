<?php
class Model_Customer_CustomerGroup_Group_Collection
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