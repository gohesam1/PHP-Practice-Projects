<?php
error_reporting(E_ERROR | E_PARSE);

abstract class Entity{
    protected $dbc;

    protected $tableName;
    protected $fields;

    // Force extending 
    abstract protected function initFields();

    protected function __construct($dbc, $tableName){
        
        $this->dbc = $dbc;
        $this->tableName = $tableName;
        $this->initFields();
    }

    public function findBy($fieldName, $fieldValue){

        $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $fieldName . "= :value";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute(['value' => $fieldValue]);
        $DatabaseData = $stmt->fetch();
        //$stmt->debugDumpParams();

        $this->setValues($DatabaseData);

    }

    public function setValues($values)
    {
        foreach($this->fields as $fieldName){
            $this->$fieldName = $values[$fieldName];
        }
    }
}
