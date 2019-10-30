<?php

class Equipes {
    private $emailUsuarioEq, $codigoTarefaEq, $codigoProjetoEq, $codigoPermissaoEq;
    
    public function getEmailUsuarioEq() {
        return $this->emailUsuarioEq;
    }

    public function getCodigoTarefaEq() {
        return $this->codigoTarefaEq;
    }

    public function getCodigoProjetoEq() {
        return $this->codigoProjetoEq;
    }

    public function getCodigoPermissaoEq() {
        return $this->codigoPermissaoEq;
    }

    public function setEmailUsuarioEq($emailUsuarioEq) {
        $this->emailUsuarioEq = $emailUsuarioEq;
    }

    public function setCodigoTarefaEq($codigoTarefaEq) {
        $this->codigoTarefaEq = $codigoTarefaEq;
    }

    public function setCodigoProjetoEq($codigoProjetoEq) {
        $this->codigoProjetoEq = $codigoProjetoEq;
    }

    public function setCodigoPermissaoEq($codigoPermissaoEq) {
        $this->codigoPermissaoEq = $codigoPermissaoEq;
    }


}
