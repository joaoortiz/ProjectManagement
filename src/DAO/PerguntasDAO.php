<?php

require_once 'ConexaoDAO.php';
require_once '../../Model/Topicos.php'; 
require_once '../../Model/Perguntas.php'; 


class PerguntasDAO {
    
    public function listarTopicos(){
       $vConn = ConexaoDAO::abrirConexao();
       
       $listaTop = new ArrayObject();
       $sqlTop = "Select * from TOPICOS";
       $rsTopicos = mysqli_query($vConn, $sqlTop) or die (mysqli_fetch_array($vConn));
       
       while($tblTopicos = mysqli_fetch_array($rsTopicos)){
           $objTop = new Topicos();
           
           $objTop->setId($tblTopicos['id_TOPICO']);
           $objTop->setNome($tblTopicos['nome_TOPICO']);
           
           $listaTop->append($objTop);
       }
       
       return $listaTop;
    }
    
    public function cadastrarPergunta($tmpPergunta){
        
        $vConn = ConexaoDAO::abrirConexao();
        
        $texto = $tmpPergunta->getTexto();
        $resp = $tmpPergunta->getResposta();
        $idTop = $tmpPergunta->getIdTopico();
        
        $sqlPerg = "Insert into Perguntas(texto_PERGUNTA, resposta_PERGUNTA, idTopico_PERGUNTA)values(";
        $sqlPerg .= "'$texto','$resp','$idTop')";
        
       // echo $sqlPerg;
        
        mysqli_query($vConn,$sqlPerg)or die(mysqli_error($vConn));
        
    }
    
    public function listarPerguntas($idTopico, $palavra){
        
        $vConn = ConexaoDAO::abrirConexao();
        
        if($idTopico == -1)
            $sqlPerg = "Select * from Perguntas where texto_PERGUNTA like '%$palavra%' or resposta_PERGUNTA like '%$palavra%'";
        else if($idTopico == 0) 
            $sqlPerg = "Select * from Perguntas";
        else 
            $sqlPerg = "Select * from Perguntas where idTopico_PERGUNTA = '$idTopico'";
        
        $rsPerg = mysqli_query($vConn, $sqlPerg) or die(mysqli_error($vConn));
        $lista = new ArrayObject();
        
        while($tblPerg = mysqli_fetch_array($rsPerg)){
            $tmpPerg = new Perguntas();
            
            $tmpPerg->setId($tblPerg['id_PERGUNTA']);
            $tmpPerg->setTexto($tblPerg['texto_PERGUNTA']);
            $tmpPerg->setResposta($tblPerg['resposta_PERGUNTA']);
            
            $lista->append($tmpPerg);            
        }
        
        return $lista;
        
    }
    
    
}
