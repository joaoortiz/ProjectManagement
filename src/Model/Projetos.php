<?php
require_once "Categorias.php";

class Projetos extends Categorias{ //projetos herda categorias
    private $codigoProj, $nomeProj, $descricaoProj, $inicioProj, $fimProj, $statusProj, $emailUsuarioProj;
    
    public function getCodigoProj() {
        return $this->codigoProj;
    }

    public function getNomeProj() {
        return $this->nomeProj;
    }

    public function getDescricaoProj() {
        return $this->descricaoProj;
    }

    public function getInicioProj() {
        return $this->inicioProj;
    }

    public function getFimProj() {
        return $this->fimProj;
    }

    public function getStatusProj() {
        return $this->statusProj;
    }

    public function getEmailUsuarioProj() {
        return $this->emailUsuarioProj;
    }

    public function setCodigoProj($codigoProj) {
        $this->codigoProj = $codigoProj;
    }

    public function setNomeProj($nomeProj) {
        $this->nomeProj = $nomeProj;
    }

    public function setDescricaoProj($descricaoProj) {
        $this->descricaoProj = $descricaoProj;
    }

    public function setInicioProj($inicioProj) {
        $this->inicioProj = $inicioProj;
    }

    public function setFimProj($fimProj) {
        $this->fimProj = $fimProj;
    }

    public function setStatusProj($statusProj) {
        $this->statusProj = $statusProj;
    }

    public function setEmailUsuarioProj($emailUsuarioProj) {
        $this->emailUsuarioProj = $emailUsuarioProj;
    }


    
}

?>
