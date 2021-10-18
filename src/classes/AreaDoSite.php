<?php

class AreaDoSite{

    private $id;
    private $nome_pagina;
    private $ativa;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome_pagina(){
        return $this->nome_pagina;
    }

    public function setNome_pagina($nome_pagina){
        $this->nome_pagina = $nome_pagina;
    }

    public function getAtiva(){
        return $this->ativa;
    }

    public function setAtiva($ativa){
        $this->ativa = $ativa;
    }
}
?>
