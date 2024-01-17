<?php 

class Model_Core_Table
{
	protected $tableName = NULL;
    protected $primaryKey = NULL;
    protected $data = [];
    public $adapter = NULL;
	function __construct()
	{
		
	}

	public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function setAdapter($adapter = NULL)
    {
        if (!$adapter) {
            $adapter = Mage::getModel('Model_Core_Adapter');
        }
        $this->adapter = $adapter;
        return $this;
    }

    public function getAdapter()
    {
        if (!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }

    public function __set($key,$value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function __get($key)
    {
        if (!array_key_exists($key, $this->data)) {
            return NULL;
        }
        return $this->data[$key];
    } 

    public function setData(array $data)
    {
        $this->data = array_merge($this->data,$data);
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function load($val)
    {
        $val = (int)$val;
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`={$val}";

        $row = $this->getAdapter()->FetchRow($sql);
        if (!$row) {
            return false;
        }
        $this->data = $row;
        return $this;
    }
    public function FetchAll($query = NULL)
    {   
        if (!$query) {
           $query = "SELECT * FROM `{$this->getTableName()}`";
        }
        $rows = $this->getAdapter()->fetchAll($query);

        if (!$rows) {
            return false;
        }
        foreach ($rows as $key => $value) {
            $rows = new $this;
            $rows->setData($value);
            $rowArray[] = $rows;
        }
        $className = get_class($this).'_Collection';
        $collection = Mage::getModel($className);
        $collection->setData($rowArray);
        unset($rowArray);
        return $collection;
    }

    public function FetchRow($query)
    {
        $row = $this->getAdapter()->fetchRow($query);
        if (!$row) {
            return false;
        }
        $this->data = $row;
        return $this;
    }

    public function save()
    {
        if (!$this->data[$this->getPrimaryKey()])
        {
            $query = "INSERT INTO `{$this->getTableName()}` (`".implode('`, `', array_keys($this->data))."`)  VALUES ('".implode('\',\'', array_values($this->data))."');";
          $id = $this->getAdapter()->insert($query);
          return $id;
        }   
        $param = NULL;
        foreach ($this->data as $key => $value) {
            $param.= "`{$key}` = '{$value}',"; 
        }

        $param = rtrim($param,",");
        $query = "UPDATE `{$this->getTableName()}` SET {$param} WHERE {$this->getPrimaryKey()}={$this->data[$this->getPrimaryKey()]}";

        $id = $this->getAdapter()->update($query);
        return true;
             
    }

    public function deleteData($id)
    {
        //$id = (int)$id;

        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`=$id";
        
        $this->getAdapter()->delete($sql);
        return true;
    }
}
?>