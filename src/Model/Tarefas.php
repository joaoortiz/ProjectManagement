<?php

require_once "Projetos.php";

class Tarefas extends Projetos{
    
   private $codigoTar, $nomeTar, $descricaoTar, $dataTar, $statusTar, $emailUsuarioTar, $nomeUsuarioTar, $telUsuarioTar, $codigoProjetoTar;
   
   public function getCodigoTar() {
       return $this->codigoTar;
   }

   public function getNomeTar() {
       return $this->nomeTar;
   }

   public function getDescricaoTar() {
       return $this->descricaoTar;
   }

   public function getDataTar() {
       return $this->dataTar;
   }

   public function getStatusTar() {
       return $this->statusTar;
   }

   public function getEmailUsuarioTar() {
       return $this->emailUsuarioTar;
   }

   public function getCodigoProjetoTar() {
       return $this->codigoProjetoTar;
   }

   public function setCodigoTar($codigoTar) {
       $this->codigoTar = $codigoTar;
   }

   public function setNomeTar($nomeTar) {
       $this->nomeTar = $nomeTar;
   }

   public function setDescricaoTar($descricaoTar) {
       $this->descricaoTar = $descricaoTar;
   }

   public function setDataTar($dataTar) {
       $this->dataTar = $dataTar;
   }

   public function setStatusTar($statusTar) {
       $this->statusTar = $statusTar;
   }

   public function setEmailUsuarioTar($emailUsuarioTar) {
       $this->emailUsuarioTar = $emailUsuarioTar;
   }

   public function setCodigoProjetoTar($codigoProjetoTar) {
       $this->codigoProjetoTar = $codigoProjetoTar;
   }

   public function getNomeUsuarioTar() {
       return $this->nomeUsuarioTar;
   }

   public function getTelUsuarioTar() {
       return $this->telUsuarioTar;
   }

   public function setNomeUsuarioTar($nomeUsuarioTar) {
       $this->nomeUsuarioTar = $nomeUsuarioTar;
   }

   public function setTelUsuarioTar($telUsuarioTar) {
       $this->telUsuarioTar = $telUsuarioTar;
   }


}
