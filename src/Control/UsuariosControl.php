<?php

session_start();

require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";

//resgatando valor da variavel(hidden) acao


if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
}else{
    $acao = $_GET['acao'];
}

if($acao == 1){ //LOGIN
    //validar
    $email = $_POST['HTML_email'];
    $senha = $_POST['HTML_senha'];
    
    $tmpUsuario = UsuariosDAO::validarUsuario($email, $senha);
    
    if($tmpUsuario != null){
        //abrindo sessão do usuario
        $_SESSION['nome'] = $tmpUsuario->getNomeUsu();
        $_SESSION['email'] = $tmpUsuario->getEmailUsu();
        $_SESSION['telefone'] = $tmpUsuario->getTelefoneUsu();
        $_SESSION['statusLogin'] = 1; //certifica que logou
        
        echo "<script>location.href='../UI/HomeUsuariosUI.php';</script>";
        
    }else{
        echo "<script>alert('Dados Inválidos!');</script>";//aviso
        echo "<script>location.href='../../index.php';</script>";//redirecionando
    }
    
    
    
    
}else if($acao == 2){ //CADASTRO
    //cadastrar
    
    //resgatando dados digitados no form
    $email = $_POST['HTML_email'];
    $nome = $_POST['HTML_nome'];
    $senha = $_POST['HTML_senha'];
    $telefone = $_POST['HTML_telefone'];
    
    //instanciando objeto da classe usuarios
    $tmpUsuario = new Usuarios();
    
    //preenchendo objeto
    $tmpUsuario->setEmailUsu($email);
    $tmpUsuario->setNomeUsu($nome);
    $tmpUsuario->setSenhaUsu($senha);
    $tmpUsuario->setTelefoneUsu($telefone);
    
    $statusCad =UsuariosDAO::cadastrarUsuario($tmpUsuario);//cadastrando
    
    if($statusCad == 0){
        echo "<script>alert('E-mail já cadastrado em sistema.');</script>";
    }else{    
        echo "<script>alert('Dados Cadastrados.');</script>";
    }
    echo "<script>location.href='../../index.php';</script>";//redirecionando
    
    //header("location:../../index.php");
}else if($acao == 3){ //LOGOFF
    //logoff
    session_destroy();
    echo "<script>location.href='../../index.php';</script>";//redirecionando
    
}else if($acao == 4){ //ADICIONAR USUARIO NO PROJETO
   //addUsuario
    $email = $_GET['HTML_email'];
    $cod = $_GET['cod'];
    $statusAdd = UsuariosDAO::adicionarIntegrante($cod, $email);
    
    if($statusAdd == 0){
        echo "<script>alert('Usuário não cadastrado no sistema.');</script>";
    }else if($statusAdd == -1){
        echo "<script>alert('O usuário informado já pertence à equipe.');</script>";
    }else{
        echo "<script>alert('Integrante adicionado ao projeto.');</script>";
    }
    echo "<script>location.href='../UI/DetalhesProjetoUI.php?cod=".$cod."';</script>";//redirecionando


}else if($acao == 5){ //ENVIAR E-MAIL
 echo "";
}
    

?>