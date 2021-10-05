<?php

    class HistoricoEntrega{

        private $id;
        private $nome;
        private $cpf;
        private $telefone;
        private $endereco;
        private $recebe;
        private $excluido;
        private $senha;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }

        public function getRecebe(){
            return $this->recebe;
        }

        public function setRecebe($recebe){
            $this->recebe = $recebe;
        }

        public function getExcluido(){
            return $this->excluido;
        }

        public function setExcluido($excluido){
            $this->excluido = $excluido;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }
    }
?>
