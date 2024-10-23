<?php

namespace SOURCE\controller;

use Exception;
use SOURCE\database\Conexao;
use SOURCE\model\User;

class UserController {


    public function create(){
        return "CreateUser.php";
    }

    public function createRecord(){
        $_SESSION['message'] = "Usuario cadastrado com sucesso";
        $name = strip_tags($_POST['Name']);
        $user = strip_tags($_POST['User']);
        $password = strip_tags($_POST['Senha']);
        if(empty($user) || empty($name) || empty($password)){
            $_SESSION['message'] = "Preencha todos os campos antes de inserir um valor";
        }else{
        $newUser = new User(0,$name,$user,$password);
        $conn = new Conexao;
        $connection = $conn->connect();

        $newUser->register($connection);
        }
        return "CreateUser.php";
        
        
        
    }

    public function login(){
        return "Login.php";
    }

    public function auth(){
        $_SESSION['message'] = "Usuario Logado com sucesso";
        $user = strip_tags($_POST['User']);
        $password = strip_tags($_POST['Senha']);
        if(empty($user) || empty($password)){
            $_SESSION['message'] = "Preencha todos os campos antes de inserir um valor";
        }else{
        $User = new User(0,"",$user,$password);
        $conn = new Conexao;
        $connection = $conn->connect();

        $User->auth($connection);


        }
       

        return "Login.php";
    }
}
