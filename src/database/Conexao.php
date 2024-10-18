<?php

namespace Source\database;
use \Pdo;
use \PdoException;

class Conexao
{
    
    private $connection;

    public  function connect() {
     $dbHost = $_ENV['HOST'];
     $dbUser = $_ENV['USER'];
     $dbName = $_ENV['DATABASE'];
     $dbPass = $_ENV['PASSWORD'];
     $connection = null;

    if ($connection === null) {
        try { 
            $connection = new PDO(
                "pgsql:dbname=" . $dbName . ";host=" . $dbHost ,
                $dbUser,
                $dbPass);
                
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            return $e;
        }
    } else {
        return $connection;
    }
}
}

