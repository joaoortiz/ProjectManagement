<meta charset="utf-8">

<?php
include "../../assets/php/lang.php";
$texto = translatePg();

require_once "../DAO/ProjetosDAO.php";
require_once "../Model/Tarefas.php";
require_once "../DAO/TarefasDAO.php";
require_once "../Model/Arquivos.php";
require_once "../Model/Usuarios.php";
require_once "../DAO/UsuariosDAO.php";


$proj = $_GET['proj'];
$tar = $_GET['tar'];
$tmpTarefa = TarefasDAO::consultarTarefa($tar);
$adm = $tmpTarefa->getEmailUsuarioProj();
$resp = $tmpTarefa->getEmailUsuarioTar();
$tmpAdm = UsuariosDAO::consultarUsuario($adm);
$itens = TarefasDAO::listarArquivos($tar);

if ($tmpTarefa->getStatusTar() == 0) {
    $status = $texto[$lang]['text_tasknofinished'];
} else {
    $status = $texto[$lang]['text_taskfinished'];
}
?>
<html>
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/css/cores.css">

    </head>
    <body>
        <?php
        include "MenuTopoUI.php";
        ?>

        <div class="container" style="margin-top: 10px;">
            <div class="card">
                <div class="card-header bg-primary-dark text-white">

                    <h5><i class="fa fa-file-text fa-fw text-white"></i>
                        <a class="text-white" href="DetalhesProjetoUI.php?cod=<?= $proj; ?>"><?= $tmpTarefa->getNomeProj(); ?></h5></a>
                </div>
                <div class="card-body">

                    <div class="card">
                        <div class="card-header bg-primary-shadow text-white">
                            <h5> 
                                <i class="fa fa-list fa-fw fa-lg text-white"></i>
                                <?= $tmpTarefa->getNomeTar(); ?> - <?= ProjetosDAO::corrigirData($tmpTarefa->getDataTar()); ?> </h5>                       
                        </div>
                        <div class="card-body">
                              <?php
                            
                            if ($tmpTarefa->getEmailUsuarioProj() == $_SESSION['email']) {
?>
                            <a href="../Control/TarefasControl.php?acao=4&proj=<?=$proj?>&tar=<?=$tar?>" class="btn btn-danger text-white float-right" style="width:200px;">
                                <i class="fa fa-trash fa-lg"></i>
                                <?=$texto[$lang]['btn_deltask']?>
                            </a>
                            <?php } ?>
                            <?= $tmpTarefa->getDescricaoTar(); ?><br>
                            Status: <b><?= $status; ?></b><br>
                            
                            <?php
                            
                            if ($tmpTarefa->getEmailUsuarioProj() == $_SESSION['email']) {

                                if ($tmpTarefa->getStatusTar() == 0) {
                                    ?>
                                    <a href="../Control/TarefasControl.php?proj=<?= $proj; ?>&tar=<?= $tmpTarefa->getCodigoTar(); ?>&acao=3" class="btn btn-warning float-right text-white" style="width:200px;">
                                        <i class="fa fa-thumbs-up fa-fw fa-lg"></i>
                                        <?= $texto[$lang]['btn_finish']; ?>
                                    </a>
                                <?php } else { ?>

                                    <a href="../Control/TarefasControl.php?proj=<?= $proj; ?>&tar=<?= $tmpTarefa->getCodigoTar(); ?>&acao=3" class="btn btn-warning float-right text-white" style="width:200px;">
                                        <i class="fa fa-thumbs-down fa-fw fa-lg"></i>
                                        <?= $texto[$lang]['btn_reopen']; ?>
                                    </a>
                                    <?php
                                }
                            }
                            ?>

                        </div>                               
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <?php
                            if($tmpTarefa->getEmailUsuarioTar() == $_SESSION['email']){
                                $titCard = $texto[$lang]['card_email_adm'];
                                $nomeDest = $tmpAdm->getNomeUsu();
                                $emailDest = $adm;
                            }else{
                                $titCard = $texto[$lang]['card_email_resp'];
                                $nomeDest = $tmpTarefa->getNomeUsuarioTar();
                                $emailDest = $tmpTarefa->getEmailUsuarioTar();
                            }
                            ?>
                            
                            <div class="card" style="margin-top:15px;">
                                <div class="card-header bg-primary-light text-white">
                                    <i class="fa fa-commenting-o fa-fw fa-lg text-white"></i>
                                    <?= $titCard; ?>
                                </div>
                                <div class="card-body">
                                    <form action="../Control/UsuariosControl.php" method="get">
                                        <div class="form-group">
                                            <h5><?= $nomeDest; ?></h5>
                                            <input type="text" value="<?= $emailDest; ?>" name="HTML_email" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control">                                            
                                            </textarea>
                                        </div>
                                        <div class="">
                                            <input type="hidden" name="acao" value="5">
                                            <button type="submit" class="btn bg-primary-light form-control text-white">
                                                <i class="fa fa-envelope fa-fw text-white"></i>
                                                <?= $texto[$lang]['btn_email']; ?>
                                            </button>
                                            <hr>
                                            <a href="https://web.whatsapp.com/send?phone=<?= $tmpTarefa->getTelUsuarioTar(); ?>" target="_blank" class="btn btn-success form-control text-white">
                                                <i class="fa fa-whatsapp fa-lg fa-fw text-white"></i>
                                                WhatsApp
                                            </a>


                                        </div>
                                    </form>                            
                                </div>                               
                            </div>
                            
                        </div>
                        <div class="col-md-7">
                            <div class="card" style="margin-top:15px;">
                                <div class="card-header bg-primary-light text-white">
                                    <i class="fa fa-file fa-fw fa-lg text-white"></i>
                                    <?= $texto[$lang]['card_files']; ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        //echo TarefasDAO::pegarUltimoArquivo($tar);

                                        for ($i = 0; $i < count($itens); $i++) {
                                            $tipo = substr($itens[$i]->getNomeArq(), count($itens[$i]->getNomeArq()) - 4);

                                            if ($tipo == "txt") {
                                                $icon = "fa-file";
                                            } else if ($tipo == "doc") {
                                                $icon = "fa-file-word";
                                            }
                                            ?>
                                            <div class="col-md-2" style="text-align:center;">
                                                <i class="fa fa-file-o fa-2x"></i>
                                                
                                                <?php if ($tmpTarefa->getEmailUsuarioTar() == $_SESSION['email']) { ?>
                                                <a href="../Control/ArquivosControl.php?proj=<?=$proj?>&tar=<?=$tar?>&acao=2&arq=<?=$itens[$i]->getCodigoArq();?>">
                                                    <i class="fa fa-times-circle fa-sm" style="color:red;position:absolute;left:20px;top:-8px;"></i>
                                                </a>
                                                <?php } ?>
                                                <br>
                                                <a href="../../files/<?= $tmpTarefa->getCodigoTar(); ?>/<?= $itens[$i]->getNomeArq(); ?>" target="_blank">
                                                    <font style="font-size:10pt;">
                                                        <?= $itens[$i]->getNomeArq(); ?>                                                        
                                                    </font>
                                                </a>

                                            </div>

                                     <?php
                                        }
                                    ?>
                                    </div>

                                    <hr>
                                    <?php if ($tmpTarefa->getEmailUsuarioTar() == $_SESSION['email']) { ?>
                                        <form action="../Control/ArquivosControl.php" method="POST" enctype="multipart/form-data">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Selecione o arquivo</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="HTML_arquivo" class="custom-file-input" id="InputFile">
                                                    <label class="custom-file-label" for="InputFile">Procurar</label>
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <input type="hidden" name="codProjeto" value="<?=$tmpTarefa->getCodigoProj();?>">
                                                <input type="hidden" name="codTarefa" value="<?= $tmpTarefa->getCodigoTar(); ?>">
                                                <button type="submit" class="btn btn-primary float-right"><?= $texto[$lang]['btn_send']; ?></button>
                                            </div>
                                    </div>
                                    </form>

<?php } ?>
                            </div>                               
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>
