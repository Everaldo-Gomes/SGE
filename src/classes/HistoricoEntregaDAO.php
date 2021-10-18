<?php

include_once "../database/conexao.php";

class HistoricoEntregaDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function listaHistoricoEntregas($where){
        try {
            $param = ($where != null) ? " WHERE {$where} AND enc.foi_entregue = 1 " : null;
            $query = $this->conn->prepare("SELECT historico_entrega.id AS historico_id, 
                morador.nome AS recebedor_nome, 
                entregador.nome AS entregador_nome, 
                historico_entrega.data_entraga AS data_entraga,
                enc.nome AS encomenda_nome 
                FROM historico_entrega 
                JOIN morador ON morador.id = historico_entrega.morador_recebe_id 
                JOIN morador AS entregador ON entregador.id = historico_entrega.morador_entraga_id
                JOIN encomenda AS enc ON enc.id = historico_entrega.encomenda_id 
                $param 
                ORDER BY morador.nome");
    
            $query->execute();
            $array = $query->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }

    public function addHistoricoEntrega($entregadorInfo, $cod_entrega, $destinatarioId, $encomendaId, $dataEntrega) {
        try {
            $query = "INSERT INTO historico_entrega (morador_entrega_id, morador_recebe_id, encomenda_id, data_entrega, cod_entrega) 
                VALUES ({$entregadorInfo}, {$destinatarioId}, {$encomendaId}, '{$dataEntrega}', '{$cod_entrega}')";
    
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }

	}

}
?>