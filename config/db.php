<?php

class dbConnection
{

     public $con;
     public $user = "root";
     public $password = "";
     public $db_name = "pecas_automoveis";
     public $host = "localhost";

     function connect()
     {
          try {
               $this->con = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->password);
               return $this->con;
          } catch (PDOException $e) {

               return $e->getMessage();
          }
     }
}


