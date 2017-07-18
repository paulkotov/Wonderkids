<?php

class PDOconnector{
    private static $server   = "localhost"; //database server
    private static $user     = "root"; //database login name
    private static $pass     = ""; //database login password
    private static $database = "wks_test"; //database name
    private static $prefix      = ""; //table prefix
    
    // var $link_id = 0;
    // var $query_id = 0;
    private static $instance;
    private static $db;
    
    private function __construct(){
        
    }

    public static function getInstance(){
      if (!isset(self::$instance)){
        $c = __CLASS__;
        self::$instance = new $c;
        }
    return self::$instance;  
    }

    public function start() 
    {
        try {
            self::$db = new PDO("mysql:host=".self::$server.";dbname=".self::$database, self::$user, self::$pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec("set names utf8");
        }
        catch(PDOException $e) {
         echo $e->getMessage();
        }
    }

    public function set($record)
    {   
        $stmt = self::$db->prepare("INSERT INTO users (id, login, email, first_name, last_name, role, password) VALUES (:id, :login, :email, :first_name, :last_name, :role, :password)");
        $stmt->bindParam(':id', $record[0]);
        $stmt->bindParam(':login', $record[1]);
        $stmt->bindParam(':email', $record[2]);
        $stmt->bindParam('first_name', $record[3]);
        $stmt->bindParam(':last_name', $record[4]);
        $stmt->bindParam(':role', $record[5]);
        $stmt->bindParam('password', $record[6]);
        $stmt->execute();
    }

    public function get($id)
    {
        $stmt = self::$db->prepare("SELECT * FROM `users` WHERE id=?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function get_last()
    {
        $stmt = self::$db->query(' SELECT MAX(`id`) FROM `users` ');
        $id = $stmt->fetchAll();
        return $id[0]["MAX(`id`)"];
    }

    public function close()
    {
        self::$db = null;
    }
}
