<?php

namespace SOURCE\model;

use Exception;

class Usuario 
{
   private $id,$nome,$usuario,$senha;
   
   
   public function __construct($id,$nome,$usuario,$senha)
   {
     $this->id = $id;
     $this->nome = $nome;
     $this->usuario = $usuario;
     $this->senha = $senha;
   }

   public function cadastrar($conn)
    {
        

        $sql = "INSERT INTO Usuario (nome,senha,usuario) VALUES (:name,:password,:user) ";

        echo $sql;
        $insert = $conn->prepare($sql);

        
        $insert->bindValue(":user",$this->usuario);
        $insert->bindValue(":name",$this->nome);
        $insert->bindValue(":password",$this->senha);
        
        
        $insert->execute();

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
      return $this->nome;
  }

   public function setNome($nome){
    $this->nome = $nome;
 }

   public function setUsuario($usuario){
      $this->usuario = $usuario;
   }

   public function getUsuario(){
    return $this->usuario;
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
  }

 public function getSenha()
 {
  return $this->senha;
 }

 

}