<?php

require_once "ConexaoDAO.php";
require_once "../Model/Tarefas.php";
require_once "../Model/Arquivos.php";

class TarefasDAO {

    public static function cadastrarTarefa($tmpTarefa) {
        $vConn = ConexaoDAO::abrirConexao();

        $sqlCadTar = "Insert into tarefas(";
        $sqlCadTar .= "nome_TAREFA, descricao_TAREFA,";
        $sqlCadTar .= "data_TAREFA, status_TAREFA,";
        $sqlCadTar .= "emailUsuario_TAREFA, codigoProjeto_TAREFA)";
        $sqlCadTar .= "values(";
        $sqlCadTar .= "'" . $tmpTarefa->getNomeTar() . "',";
        $sqlCadTar .= "'" . $tmpTarefa->getDescricaoTar() . "',";
        $sqlCadTar .= "'" . $tmpTarefa->getDataTar() . "',0,";
        $sqlCadTar .= "'" . $tmpTarefa->getEmailUsuarioTar() . "',";
        $sqlCadTar .= $tmpTarefa->getCodigoProjetoTar() . ")";

        mysqli_query($vConn, $sqlCadTar) or die(mysqli_error($vConn));
    }

    public static function listarTarefas($tmpTipo, $tmpProj, $tmpEmail) {
        //PROGRAMAR
        $vConn = ConexaoDAO::abrirConexao();
        if ($tmpTipo == 0) { //todas
            $sqlLista = "Select * from tarefas T, projetos P, usuarios U where T.codigoProjeto_TAREFA = '$tmpProj' and T.codigoProjeto_TAREFA = P.codigo_PROJETO and T.emailUsuario_TAREFA = U.email_USUARIO";
        } else if ($tmpTipo == 1) {//finalizadas
            $sqlLista = "Select * from tarefas T, projetos P, usuarios U where T.codigoProjeto_TAREFA = '$tmpProj' and T.codigoProjeto_TAREFA = P.codigo_PROJETO and T.status_TAREFA = 1 and T.emailUsuario_TAREFA = U.email_USUARIO";
        }else if($tmpTipo == 2){
            $sqlLista = "Select * from tarefas T, projetos P, usuarios U where T.emailUsuario_TAREFA like '$tmpEmail' and T.codigoProjeto_TAREFA = P.codigo_PROJETO and U.email_USUARIO = T.emailUsuario_TAREFA order by T.codigoProjeto_TAREFA";
        }

        $rsLista = mysqli_query($vConn, $sqlLista)
                or die(mysqli_error($vConn));

        if (mysqli_num_rows($rsLista) <= 0) {
            return null;
        } else {
            $itens = new ArrayObject();

            while ($dados = mysqli_fetch_array($rsLista)) {
                $tmpTarefa = new Tarefas();

                //preenchendo objeto
                $tmpTarefa->setCodigoTar($dados['codigo_TAREFA']);
                $tmpTarefa->setNomeTar($dados['nome_TAREFA']);
                $tmpTarefa->setDescricaoTar($dados['descricao_TAREFA']);
                $tmpTarefa->setDataTar($dados['data_TAREFA']);
                $tmpTarefa->setStatusTar($dados['status_TAREFA']);
                $tmpTarefa->setEmailUsuarioTar($dados['emailUsuario_TAREFA']);
                $tmpTarefa->setCodigoProjetoTar($dados['codigoProjeto_TAREFA']);
                $tmpTarefa->setNomeProj($dados['nome_PROJETO']);
                $tmpTarefa->setNomeUsuarioTar($dados['nome_USUARIO']);
                $tmpTarefa->setTelUsuarioTar($dados['telefone_USUARIO']);
                

                $itens->append($tmpTarefa);
            }//fechando while           
            return $itens;
        }//fechando else
    }

    public static function consultarTarefa($tmpCodigo) {
        $vConn = ConexaoDAO:: abrirConexao();

        $sqlTar = "Select * from usuarios U, tarefas T, projetos P where ";
        $sqlTar .= "T.codigo_TAREFA = '$tmpCodigo' and T.codigoProjeto_TAREFA = P.codigo_PROJETO and U.email_USUARIO = T.emailUsuario_TAREFA";

        $rsTar = mysqli_query($vConn, $sqlTar)
                or die(mysqli_error($vConn));

        $tblTar = mysqli_fetch_array($rsTar);

        $tmpTarefa = new Tarefas();

        $tmpTarefa->setCodigoTar($tblTar['codigo_TAREFA']);
        $tmpTarefa->setNomeTar($tblTar['nome_TAREFA']);
        $tmpTarefa->setDescricaoTar($tblTar['descricao_TAREFA']);
        $tmpTarefa->setDataTar($tblTar['data_TAREFA']);
        $tmpTarefa->setStatusTar($tblTar['status_TAREFA']);
        $tmpTarefa->setEmailUsuarioTar($tblTar['emailUsuario_TAREFA']);
        $tmpTarefa->setNomeUsuarioTar($tblTar['nome_USUARIO']);
        $tmpTarefa->setNomeProj($tblTar['nome_PROJETO']);
        $tmpTarefa->setEmailUsuarioProj($tblTar['emailUsuario_PROJETO']);


        return $tmpTarefa;
    }

    public static function alterarStatus($tmpCodigo) {
        $vConn = ConexaoDAO::abrirConexao();

        $sqlTar = "Select * from tarefas where codigo_TAREFA = $tmpCodigo";
        $rsTar = mysqli_query($vConn, $sqlTar) or die(mysqli_error($vConn));
        $tblTar = mysqli_fetch_array($rsTar);
        $status = $tblTar['status_TAREFA'];

        if ($status == 1) {
            $novoStatus = 0;
        } else {
            $novoStatus = 1;
        }

        $sqlStTar = "Update tarefas set status_TAREFA = '$novoStatus' where codigo_TAREFA = '$tmpCodigo'";
        mysqli_query($vConn, $sqlStTar) or die(mysqli_error($vConn));
    }

    public static function cadastrarArquivo($tmpArquivo) {
        $vConn = ConexaoDAO::abrirConexao();
        $sqlArquivo = "Insert into arquivos(nome_ARQUIVO, data_ARQUIVO, codigoTarefa_ARQUIVO) values(";
        $sqlArquivo.= "'" . $tmpArquivo->getNomeArq() . "','" . $tmpArquivo->getDataArq() . "'," . $tmpArquivo->getCodigoTarefaArq() . ")";

        mysqli_query($vConn, $sqlArquivo) or die(mysqli_error($vConn));
    }
    
    public static function excluirArquivo($tmpCodigo) {
        $vConn = ConexaoDAO::abrirConexao();
        $sqlArquivo = "Delete from arquivos where codigo_ARQUIVO = '$tmpCodigo'";
        mysqli_query($vConn, $sqlArquivo) or die(mysqli_error($vConn));
    }
    
    public static function excluirTarefa($tmpCodigo){
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlDelArq = "Delete from arquivos where codigoTarefa_ARQUIVO = '$tmpCodigo'";
        mysqli_query($vConn, $sqlDelArq) or die(mysqli_error($vConn));
        
        $sqlDelTar = "Delete from tarefas where codigo_TAREFA = '$tmpCodigo'";
        mysqli_query($vConn, $sqlDelTar) or die(mysqli_error($vConn));
                
    }
    
    public static function pegarUltimoArquivo($tmpTarefa){
        
        $itens = new ArrayObject();
        $itens = TarefasDAO::listarArquivos($tmpTarefa);
        
        $ultimoArquivo = count($itens);
        
        return $ultimoArquivo;

    }

    public static function listarArquivos($tmpTarefa) {
        $vConn = ConexaoDAO::abrirConexao();

        $sqlLista = "Select * from arquivos where codigoTarefa_ARQUIVO = '$tmpTarefa'";

        $rsLista = mysqli_query($vConn, $sqlLista)
                or die(mysqli_error($vConn));

        if (mysqli_num_rows($rsLista) <= 0) {
            return null;
        } else {
            $itens = new ArrayObject();

            while ($dados = mysqli_fetch_array($rsLista)) {
                $tmpArquivo = new Arquivos();

                //preenchendo objeto
                $tmpArquivo->setCodigoArq($dados['codigo_ARQUIVO']);
                $tmpArquivo->setNomeArq($dados['nome_ARQUIVO']);
                $tmpArquivo->setDataArq($dados['data_ARQUIVO']);
                $tmpArquivo->setCodigoTarefaArq($dados['codigoTarefa_ARQUIVO']);
                
                $itens->append($tmpArquivo);
            }//fechando while           
            return $itens;
        }//fechando else
    }
    
    public static function contarTarefas($tmpEmail){
        $itens = TarefasDAO::listarTarefas(2, 0, $tmpEmail);
        return count($itens);
    }
    
    public static function consultarArquivo($tmpCodigo){
        $vConn = ConexaoDAO::abrirConexao();
        
        $tmpArquivo = new Arquivos();
        $sqlArq = "Select * from arquivos where codigo_ARQUIVO = '$tmpCodigo'";
        $rsArq = mysqli_query($vConn, $sqlArq)or die(mysql_error($vConn));
        
        if(mysqli_num_rows($rsArq)){
            while($dados = mysqli_fetch_array($rsArq)){
                $tmpArquivo->setCodigoArq($dados['codigo_ARQUIVO']);
                $tmpArquivo->setNomeArq($dados['nome_ARQUIVO']);
                $tmpArquivo->setDataArq($dados['data_ARQUIVO']);
                $tmpArquivo->setCodigoTarefaArq($dados['codigoTarefa_ARQUIVO']);
            }
        }
        
        return $tmpArquivo;
        
    }

}

?>