<?php

include_once "../database/conexao.php";
include_once "../classes/Encomenda.php";

class EncomendaDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }
    
    /*seta responsável por entregar encomenda */
    public function updateResponsavel($idEntregador, $idEncomendaSelecionada) {
        try {
            $query = "UPDATE encomenda set entregador_id = {$idEntregador} WHERE id = {$idEncomendaSelecionada}";
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }

    /*retira a encomenda da lista de encomendas que podem ser pegas para a entrega*/
    public function setEncomendaPega($idEncomendaSelecionada) {
        try {
            $query = "UPDATE encomenda set entregador_pegou = 1 WHERE id = {$idEncomendaSelecionada}";
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }

    /*retira a encomenda da lista de encomendas que podem ser pegas para a entrega*/
    public function setEncomendaEntregue($idEncomendaSelecionada) {
        try {
            $query = "UPDATE encomenda set foi_entregue = 1 WHERE id = {$idEncomendaSelecionada}";
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }


    public function findEncomendaById( $idEncomenda, $fields = '*') {
        try {
            $query = "SELECT {$fields} FROM encomenda WHERE id = {$idEncomenda}";
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

    public function findLastEntrega() {
        try {
            $query = "SELECT MAX(id) FROM encomenda";
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
	}

    public function geraCodigoEntrega(){
        try {
            $cod_entrega = "ET";
            $aux = $this->findLastEntrega();
            $cod_entrega .= $aux[0][0];
            $cod_entrega .= "BR";
            return $cod_entrega;
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }

    /* atualiza encomendas */
	public function editaEncomendaById(Encomenda $encomendaObj) {
        try {
            $id = $encomendaObj->getId();
            $param =" WHERE id = {$id}";
            $sql = "UPDATE encomenda SET nome = '".$encomendaObj->getNome()."', 
            cadastrada_morador_id = ".$encomendaObj->getCadastrada_morador_id().", 
            entregador_id = ".$encomendaObj->getEntregador_id().", 
            data_cadastro = '".$encomendaObj->getData_cadastro()."', 
            previsao_data_entrega = '".$encomendaObj->getPrevisao_data_entrega()."', 
            foi_entregue = ".$encomendaObj->getFoi_entregue().", 
            entregador_pegou = ".$encomendaObj->getEntregador_pegou().", 
            excluido = ".$encomendaObj->getExcluido()
            .$param;
            return $this->conn->query($sql);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
	}

    /* atualiza encomendas */
	public function salvaEncomenda(Encomenda $encomendaObj) {
        try {
            $id = $encomendaObj->getId();
            $param =" WHERE id = {$id}";
            $sql = "INSERT INTO encomenda (nome, cadastrada_morador_id, entregador_id, data_cadastro, 
            previsao_data_entrega, foi_entregue, entregador_pegou, excluido) 
            VALUES (".$encomendaObj->getNome()."', 
            ".$encomendaObj->getCadastrada_morador_id().", 
            ".$encomendaObj->getEntregador_id().", 
            '".$encomendaObj->getData_cadastro()."', 
            '".$encomendaObj->getPrevisao_data_entrega()."', 
            ".$encomendaObj->getFoi_entregue().", 
            ".$encomendaObj->getEntregador_pegou().", 
            ".$encomendaObj->getExcluido()
            .$param;
            return $this->conn->query($sql);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
	}

    /* foi_entregue = 0 AND excluido = 0*/
    public function listaEncomendasPendentesByMoradorId($cadastrada_morador_id){
        try {
            $params = "WHERE foi_entregue = 0 AND excluido = 0 AND cadastrada_morador_id = {$cadastrada_morador_id}";
            $lista = array();
            $sql = "SELECT * FROM encomenda {$params}";
            $result = $this->conn->query($sql);
        
            if ($result->rowCount() > 0) {
                foreach ($result as $data) {
                    array_push($lista, $data);
                }
            }
            return $lista;
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }
    
    //Não deleta, apenas marcar que não pode ser exibido / procurado
	public function deletarRegistroById($id) {
        try {
            $query = "UPDATE encomenda SET excluido = 1 WHERE {$id}";
            return $this->conn->query($query);
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
	}
}
?>