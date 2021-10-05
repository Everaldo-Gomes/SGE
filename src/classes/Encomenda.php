<?php

    class Encomenda{

        private $id;
        private $nome;
        private $cadastrada_morador_id;
        private $entregador_id;
        private $data_cadastro;
        private $previsao_data_entrega;
        private $foi_entregue;
        private $entregador_pegou;
        private $excluido;


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

        public function getCadastrada_morador_id(){
            return $this->cadastrada_morador_id;
        }

        public function setCadastrada_morador_id($cadastrada_morador_id){
            $this->cadastrada_morador_id = $cadastrada_morador_id;
        }

        public function getEntregador_id(){
            return $this->entregador_id;
        }

        public function setEntregador_id($entregador_id){
            $this->entregador_id = $entregador_id;
        }

        public function getData_cadastro(){
            return $this->data_cadastro;
        }

        public function setData_cadastro($data_cadastro){
            $this->data_cadastro = $data_cadastro;
        }

        public function getPrevisao_data_entrega(){
            return $this->previsao_data_entrega;
        }

        public function setPrevisao_data_entrega($previsao_data_entrega){
            $this->previsao_data_entrega = $previsao_data_entrega;
        }

        public function getFoi_entregue(){
            return $this->foi_entregue;
        }

        public function setFoi_entregue($foi_entregue){
            $this->foi_entregue = $foi_entregue;
        }

        public function getEntregador_pegou(){
            return $this->entregador_pegou;
        }

        public function setEntregador_pegou($entregador_pegou){
            $this->entregador_pegou = $entregador_pegou;
        }

        public function getExcluido(){
            return $this->excluido;
        }

        public function setExcluido($excluido){
            $this->excluido = $excluido;
        }
    }
?>