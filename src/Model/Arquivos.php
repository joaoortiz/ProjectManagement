<?php

class Arquivos {
    
    private $codigoArq, $nomeArq, $dataArq, $codigoTarefaArq;
    
    public function getCodigoArq() {
        return $this->codigoArq;
    }

    public function getNomeArq() {
        return $this->nomeArq;
    }

    public function getDataArq() {
        return $this->dataArq;
    }

    public function getCodigoTarefaArq() {
        return $this->codigoTarefaArq;
    }

    public function setCodigoArq($codigoArq) {
        $this->codigoArq = $codigoArq;
    }

    public function setNomeArq($nomeArq) {
        $this->nomeArq = $nomeArq;
    }

    public function setDataArq($dataArq) {
        $this->dataArq = $dataArq;
    }

    public function setCodigoTarefaArq($codigoTarefaArq) {
        $this->codigoTarefaArq = $codigoTarefaArq;
    }


}
