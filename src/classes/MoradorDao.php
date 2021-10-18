<?php

include_once "../database/conexao.php";

class MoradorDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function findMoradorNaoExcluidoById($idMorador, $fields = '*') {
        try {
            $query = "SELECT {$fields} FROM morador WHERE id = {$idMorador} AND excluido = 0";
            $result = $this->conn->query($query);
            $data = array();
            if($result->rowCount() == 0) {
                return false;
            }
            else {
                foreach($result as $res) {
                    array_merge($data, $res);
                    $data = &$res;
                }
            }
            return $data;
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }

    public function findMoradorNaoExcluidoByCpf($cpfMorador, $fields = '*') {
        try {
            $query = "SELECT {$fields} FROM morador WHERE cpf = '{$cpfMorador}' AND excluido = 0";
            $result = $this->conn->query($query);
            $data = array();
            if($result->rowCount() == 0) {
                return false;
            }
            else {
                foreach($result as $res) {
                    array_merge($data, $res);
                    $data = &$res;
                }
            }
            return $data;
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }

    //não vai deletar, apenas marcar que não pode ser exibido / procurado
	public function deletarMoradorById($id) {
        try {
            $query = "UPDATE morador SET excluido = 1 WHERE id = $id";
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
	}

    //faltou o add morador que vou ter que rafazer pra quando adicionar o morador adicionar também as permissões dele


}
?>