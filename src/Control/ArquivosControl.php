<?php

require_once "../Model/Arquivos.php";
require_once "../DAO/TarefasDAO.php";


if(isset($_GET['acao'])){
   $arq = $_GET['arq'];
   $tmpArquivo = TarefasDAO::consultarArquivo($arq);   
   $nomeArq = $tmpArquivo->getNome();
   $codTar = $tmpArquivo->getCodigoTarefa();
   $codProj = $_GET['proj'];
    
   unlink("../../files/".$codTar."/".$nomeArq);
   
   TarefasDAO::excluirArquivo($arq);
   
}else{

$tmpArquivo = new Arquivos();

$codProj = $_POST['codProjeto'];
$codTar = $_POST['codTarefa'];

$nomeArquivo = $_FILES['HTML_arquivo']['name'];
$nomeTemp = $_FILES['HTML_arquivo']['tmp_name'];

$tiposPermitidos = array("png", "jpg", "doc", "docx", "ppt", "pptx", "pdf", "txt");

$vArquivo = explode(".", $nomeArquivo);
$ext = $vArquivo[count($vArquivo) - 1];

if (!in_array(strtolower($ext), $tiposPermitidos)) {
    echo "Não aceito";
} else {
    echo "aceito";

$hoje=date("Y-m-d");

$tmpArquivo->setNome($codTar."_".$nomeArquivo);
$tmpArquivo->setData($hoje);
$tmpArquivo->setCodigoTarefa($codTar);

TarefasDAO::cadastrarArquivo($tmpArquivo);

if(!is_dir("../../files/".$codTar)){
    mkdir("../../files/".$codTar);
}

$status = move_uploaded_file($nomeTemp, "../../files/". $codTar ."/".$codTar."_".$nomeArquivo);

}

}

echo "<script>location.href='../UI/DetalhesTarefaUI.php?proj=$codProj&tar=$codTar';</script>";
//echo $codTar ."<br>";
//echo $status;
?>
