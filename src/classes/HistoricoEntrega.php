<?php

    class HistoricoEntrega{

        private $id;
        private $morador_entraga_id;
        private $morador_recebe_id;
        private $encomenda_id;
        private $data_entraga;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getMorador_entraga_id(){
            return $this->morador_entraga_id;
        }

        public function setMorador_entraga_id($morador_entraga_id){
            $this->morador_entraga_id = $morador_entraga_id;
        }

        public function getMorador_recebe_id(){
            return $this->morador_recebe_id;
        }

        public function setMorador_recebe_id($morador_recebe_id){
            $this->morador_recebe_id = $morador_recebe_id;
        }

        public function getEncomenda_id(){
            return $this->encomenda_id;
        }

        public function setEncomenda_id($encomenda_id){
            $this->encomenda_id = $encomenda_id;
        }

        public function getData_entraga(){
            return $this->data_entraga;
        }

        public function setData_entraga($data_entraga){
            $this->data_entraga = $data_entraga;
        }
    }
?>