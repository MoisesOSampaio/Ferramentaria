<?php


namespace SOURCE\database;
use \PDO;
use \PDOException;


abstract class Conexao{
    
    
        protected $connection;
    
        public  function __construct()
        {
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

    public abstract function cadastrar($model);

    public abstract function editar();

    public abstract function selecionar();

    public abstract function deletar();
    
}
         
