<?php

namespace SOURCE\model;

use Exception;
use Firebase\JWT\JWT;


class User 
{
   private $id,$name,$user,$password;
   
   
   public function __construct($id,$name,$user,$password)
   {
     $this->id = $id;
     $this->name = $name;
     $this->user = $user;
     $this->password = $password;
   }

   public function register($conn)
    {
        

        $sql = "INSERT INTO Usuario (nome,senha,usuario) VALUES (:name,:password,:user) ";


        $insert = $conn->prepare($sql);

        
        $insert->bindValue(":user",$this->user);
        $insert->bindValue(":name",$this->name);
        $insert->bindValue(":password",$this->password);
        
        
        $insert->execute();

    }

    public function auth($conn)
    {
        

        $sql = "Select * from Usuario where usuario = :user and senha = :password";


        $select = $conn->prepare($sql);

        $select->bindValue(":password",$this->password);
        $select->bindValue(":user",$this->user);
        
        
        $select->execute();
        $userFound = $select->fetch();
        if(!$userFound){
          $_SESSION['message'] = "Usuário não encontrado";
        }else{
          $this->name = $userFound['nome'];
          $this->id = $userFound['id'];

          $payload = [
            'exp' => time() + 10,
            'iat' => time(),
            'id' => $this->id,
            'name' => $this->name,               
            'user' => $this->user,
            'password' => $this->password
          ];

          $encode = JWT::encode($payload,$_ENV['KEY'],'HS256');

          $_SESSION['id'] = json_encode($encode);


        }
    }

    public function editar()
    {

    }

    public function selecionar()
    {
        
    }

    public function deletar()
    {
        
    }


   //Getters and Setters
   public function getId(){
      return $this->id;
  }

   public function getNome(){
      return $this->name;
  }

   public function setNome($name){
    $this->name = $name;
 }

   public function setUsuario($user){
      $this->user = $user;
   }

   public function getUsuario(){
    return $this->user;
  }

  public function setSenha($password)
  {
    $this->password = $password;
  }

 public function getSenha()
 {
  return $this->password;
 }

 

}