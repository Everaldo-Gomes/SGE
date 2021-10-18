<?php

class AutorizacaoUsuarioDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }
    
}
?>