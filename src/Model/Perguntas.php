<?php


class Perguntas {
   public $id, $texto, $resposta, $idTopico;
           
   public function getId() {
       return $this->id;
   }

   public function getTexto() {
       return $this->texto;
   }

   public function getResposta() {
       return $this->resposta;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setTexto($texto) {
       $this->texto = $texto;
   }

   public function setResposta($resposta) {
       $this->resposta = $resposta;
   }

   public function getIdTopico() {
       return $this->idTopico;
   }

   public function setIdTopico($idTopico) {
       $this->idTopico = $idTopico;
   }

 
}
