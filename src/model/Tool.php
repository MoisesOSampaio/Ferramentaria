<?php

namespace SOURCE\model;

use Exception;
use Firebase\JWT\JWT;


class Tool
{
   private $id,$name,$quantityStorage,$quantityDamaged,$quantityAvailable;
   
   
   public function __construct($id,$name,$quantityStorage,$quantityDamaged,$quantityAvailable)
   {
     $this->id = $id;
     $this->name = $name;
     $this->quantityStorage = $quantityStorage;
     $this->quantityDamaged = $quantityDamaged;
     $this->quantityAvailable = $quantityAvailable;

   }

   public function register($conn)
    {
        

        $sql = "INSERT INTO Tool (name,quantityStorage,quantityDamaged,quantityAvailable) VALUES (:name,:quantityStorage,:quantityDamaged,:quantityAvailable) ";


        $insert = $conn->prepare($sql);

        
        $insert->bindValue(":name",$this->name);
        $insert->bindValue(":quantityStorage",$this->quantityStorage);
        $insert->bindValue(":quantityDamaged",$this->quantityDamaged);
        $insert->bindValue(":quantityAvailable",$this->quantityAvailable);
        
        
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
      return $this->name;
  }

   public function setNome($name){
    $this->name = $name;
 }

   public function setQuantityStorage($quantityStorage){
      $this->quantityStorage = $quantityStorage;
   }

   public function getQuantityStorage(){
    return $this->quantityStorage;
  }

  public function setQuantityDamaged($quantityDamaged)
  {
    $this->quantityDamaged = $quantityDamaged;
  }

 public function getQuantityDamaged()
 {
  return $this->quantityDamaged;
 }

 public function setQuantityAvailable($quantityAvailable)
 {
   $this->quantityAvailable = $quantityAvailable;
 }

public function getQuantityAvailable()
{
 return $this->quantityAvailable;
}

 

}