<?php

class AreaDoSiteDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function buscaAreasAtivas($where = null){
        try {
            $param = ($where != null) ? " AND $where " : null;
            $query = $this->conn->prepar("SELECT * FROM 'area_do_site' WHERE ativa = 1 {$param} ORDER BY nome_pagina");
            $query->execute();
            $array = $query->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } catch (\PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }
    
}
?>