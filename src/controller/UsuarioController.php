<?php

namespace SOURCE\controller;

use Exception;
use SOURCE\database\Conexao;
use SOURCE\model\Usuario;

class UsuarioController extends Controller{


    public function create(){
        return "CreateUsuario.php";
    }

    public function createRecord(){
        
        $name = strip_tags($_POST['Name']);
        $user = strip_tags($_POST['User']);
        $password = strip_tags($_POST['Senha']);
            if(empty($user) || empty($name) || empty($password)){
                throw new Exception("Preencha todos os campos");
            }
        $newUser = new Usuario(0,$name,$user,$password);
        $conn = new Conexao;
        $connection = $conn->connect();

        $newUser->cadastrar($connection);
      
        return "CreateUsuario.php";
        
        //header("Location: /Usuario/Create");
        
    }

    public function login(){
        return "Login.php";
    }
}
