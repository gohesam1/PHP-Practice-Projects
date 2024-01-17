<?php

final class DatabaseConnection{

    private static $instance = null;
    private static $connection;

    public static function getInstance(){

        if (is_null(self::$instance)){
            //var_dump('We are creating the instance.');
            self::$instance = new DatabaseConnection();
        }

        //var_dump('We are returning the instance.');
        return self::$instance;
    }

    private function __construct(){}

    private function __clone(){}

    public function __wakeup(){}

    public static function connect($host, $dbName, $user, $password){
        //var_dump('We are connecting to the Databse.');
        self::$connection =  new PDO("mysql:dbname=$dbName;host=$host", $user, $password);
    }

    public static function getConnection(){
        return self::$connection;
    }
}