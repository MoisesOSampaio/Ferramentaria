<?php

namespace SOURCE\model;

use Exception;



class ToolList
{
   private $AllTool = [];

   public function __construct($conn){
        $sql = "select * from Tool";
        $select = $conn->query($sql);
        $rows = $select->fetchAll();
        foreach($rows as  $value){
            $tool = new Tool($value['id'],$value['name'],$value['quantitystorage'],$value['quantitydamaged'],$value['quantityavailable']);
            array_push($this->AllTool,$tool);
        }
    }
   
   







   //Getters and Setters

   public function getList(){
        return $this->AllTool;
   }

 

}