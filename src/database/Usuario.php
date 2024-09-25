<?php


namespace SOURCE\database;

use SOURCE\model\Usuario as ModelUsuario;

class Usuario extends Conexao{



    public function cadastrar($usuario)
    {
        $sql = "INSERT INTO usuario (nome,senha,usuario) VALUES (?,?,?) ";

        $insert = $this->connection->prepare();

        $insert->bindValue(1,$usuario->getNome());
        $insert->bindValue(2,$usuario->getSenha());
        $insert->bindValue(3,$usuario->getUsuario());
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
}