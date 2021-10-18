<?php

include_once "../database/conexao.php";

class EntregaRealizadaDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function findByEntregadorId($entregadorId) {
        try {
            $query = "SELECT * FROM entrega_realizada WHERE morador_entrega_id = {$entregadorId}";
            $lista = array();
            $result = $this->conn->query($query);
    
            if ($result->rowCount() > 0) {
                foreach ($result as $data) {
                     array_push($lista, $data);
                }
            }
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
        

		return $lista;
    }

    public function atualizaEntregas($novaQuantidadeEntregas, $entregadorId) {
        try {
            $query = "UPDATE entrega_realizada SET qnt_entregas = {$novaQuantidadeEntregas} WHERE morador_entrega_id = {$entregadorId}";
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
	}

    public function add1EntregaRealizada($entregadorId) {
        try {
            $query = "INSERT INTO entrega_realizada (morador_entrega_id, qnt_entregas) VALUES ({$entregadorId}, 1)";
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
	}

}
?>