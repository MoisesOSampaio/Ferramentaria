<?php

namespace SOURCE\controller;

use Exception;
use SOURCE\database\Conexao;
use SOURCE\model\Tool;


class ToolController {


    public function create(){
        return "CreateTool.php";
    }

    public function createRecord(){
        $_SESSION['message'] = "Ferramenta cadastrada com sucesso"; // mensagem de retorno da ação realizada
        
        $name = strip_tags($_POST['Name']);
        $qtdAvailable = filter_input(INPUT_POST,'Available',FILTER_SANITIZE_NUMBER_INT);
        $qtdStorage = filter_input(INPUT_POST,'Storage',FILTER_SANITIZE_NUMBER_INT);    // Tratamento dos dados recebidos através do input
        $qtdDamaged = filter_input(INPUT_POST,'Damaged',FILTER_SANITIZE_NUMBER_INT);
        
        if($qtdAvailable < 0 || $qtdStorage < 0|| $qtdDamaged < 0){
            $_SESSION['message'] = "Preencha todos os campos antes de inserir um registro";
        }else{


        $newTool= new Tool(0,$name,$qtdAvailable,$qtdStorage,$qtdDamaged);
        $conn = new Conexao;
        $connection = $conn->connect();
        $newTool->register($connection);

        }
        return "CreateTool.php";
        
        
        
    }



}
