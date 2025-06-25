<?php

abstract class AbstractManager
{
    protected PDO $db;
    
    // ENV files is not set to make easier the check of instructor 
    
    public function __construct()
    {
        $dbHost = "db.3wa.io";
        $dbPort = "3306";
        $dbName = "julianbuzare_crud_mvc";
        $dbUser = "julianbuzare";
        $dbPass = "3fe0af2b79715c4ddd0f6d85ea1e2459";
    
        $this->db = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    }
}

?>