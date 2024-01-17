<?php

class Model_Core_Adapter{
	public $config = [
		'host'=>'localhost',
		'username'=>'root',
		'password'=>'',
		'database'=>'project'
	];

	private $connect = null;

	public function connection()
	{
		$connect = mysqli_connect($this->config['host'],$this->config['username'],$this->config['password'],$this->config['database']);
		$this->setConnect($connect);
	}

	public function getConnect()
	{
		return $this->connect;
	}

	public function setConnect(mysqli $connect)
	{
		$this->connect = $connect;
		return $this;
	}

	public function insert($query)
    {
        $this->connection();
        $result = $this->getConnect()->query($query);
        if (!$result) {
            return false;
        }
        return $this->getConnect()->insert_id;
    }

	public function update($query) {
	         $this->connection();
	        if(!$this->getConnect()->query($query)) {
	            return false;
	        }
	        return true;
	    }

    public function fetchAll($query)
    {
        
        $this->connection();
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (!$rows) {
            return false;
        }
        return $rows;
    }

    public function fetchRow($query)
    {
    	$this->connection();
    	$result = $this->getConnect()->query($query);
    	$row = $result->fetch_assoc();
    	if (!$row) {
            return false;
        }
        return $row;
    }

    public function delete($query)
    {
    	$this->connection();
    	$result = $this->getConnect()->query($query);
    }

     public function fetchPairs($query)
    {
        $this->connection();
    	$result = $this->getConnect()->query($query);
    	$rows = $result->fetch_all();
    	if (!$rows) {
            return $rows;
        }
        
        $column = array_column($rows, '0');
        $value = array_column($rows, '1');
        return array_combine($column, $value);
    }

	public function isConnected(){
	    if(!$this->getConnect()){
	        echo 'Connection Failed';
	            return false;
	    }
	    return true;
	}

}


?>