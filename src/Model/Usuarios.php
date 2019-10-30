<?php

class Usuarios {
 
    private $nomeUsu, $emailUsu, $senhaUsu, $telefoneUsu;

    public function getNomeUsu() {
        return $this->nomeUsu;
    }

    public function getEmailUsu() {
        return $this->emailUsu;
    }

    public function getSenhaUsu() {
        return $this->senhaUsu;
    }

    public function getTelefoneUsu() {
        return $this->telefoneUsu;
    }

    public function setNomeUsu($nomeUsu) {
        $this->nomeUsu = $nomeUsu;
    }

    public function setEmailUsu($emailUsu) {
        $this->emailUsu = $emailUsu;
    }

    public function setSenhaUsu($senhaUsu) {
        $this->senhaUsu = $senhaUsu;
    }

    public function setTelefoneUsu($telefoneUsu) {
        $this->telefoneUsu = $telefoneUsu;
    }


    
}
?>
