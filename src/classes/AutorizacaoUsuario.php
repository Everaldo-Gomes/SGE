<?php

class AutorizacaoUsuario{

    private $morador_id;
    private $area_do_site_id;

    public function getMorador_id(){
        return $this->morador_id;
    }

    public function setMorador_id($morador_id){
        $this->morador_id = $morador_id;
    }

    public function getArea_do_site_id(){
        return $this->area_do_site_id;
    }

    public function setArea_do_site_id($area_do_site_id){
        $this->area_do_site_id = $area_do_site_id;
    }
}
?>
