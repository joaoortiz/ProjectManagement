<meta charset="utf-8">

<?php
include "../../assets/php/lang.php";
$texto = translatePg();

require_once "../Model/Projetos.php";
require_once "../DAO/ProjetosDAO.php";
require_once "../Model/Tarefas.php";
require_once "../DAO/TarefasDAO.php";
require_once "../Model/Arquivos.php";
require_once "../Model/Usuarios.php";
require_once "../DAO/UsuariosDAO.php";


$proj = $_GET['proj'];
$tar = $_GET['tar'];
$tmpProjeto = ProjetosDAO::consultarProjeto($proj);
$adm = $tmpProjeto->getEmailUsuario();
$tmpTarefa = TarefasDAO::consultarTarefa($tar);
$tmpUsuario = UsuariosDAO::consultarUsuario($tmpTarefa->getEmailUsuario());
$itens = TarefasDAO::listarArquivos($tar);

if ($tmpTarefa->getStatus() == 0) {
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
                        <a class="text-white" href="DetalhesProjetoUI.php?cod=<?= $tmpProjeto->getCodigo(); ?>"><?= $tmpProjeto->getNome(); ?></h5></a>
                </div>
                <div class="card-body">

                    <div class="card">
                        <div class="card-header bg-primary-shadow text-white">
                            <h5> 
                                <i class="fa fa-list fa-fw fa-lg text-white"></i>
                                <?= $tmpTarefa->getNome(); ?> - <?= ProjetosDAO::corrigirData($tmpTarefa->getData()); ?> </h5>                       
                        </div>
                        <div class="card-body">

                            <?= $tmpTarefa->getDescricao(); ?><br>
                            Status: <b><?= $status; ?></b><br>
                            <?php
                            if ($adm == $_SESSION['email']) {

                                if ($tmpTarefa->getStatus() == 0) {
                                    ?>
                                    <a href="../Control/TarefasControl.php?proj=<?= $tmpProjeto->getCodigo(); ?>&tar=<?= $tmpTarefa->getCodigo(); ?>&acao=3" class="btn btn-warning float-right text-white">
                                        <i class="fa fa-thumbs-up fa-fw fa-lg"></i>
                                        <?= $texto[$lang]['btn_finish']; ?>
                                    </a>
                                <?php } else { ?>

                                    <a href="../Control/TarefasControl.php?proj=<?= $tmpProjeto->getCodigo(); ?>&tar=<?= $tmpTarefa->getCodigo(); ?>&acao=3" class="btn btn-warning float-right text-white">
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
                            <div class="card" style="margin-top:15px;">
                                <div class="card-header bg-primary-light text-white">
                                    <i class="fa fa-commenting-o fa-fw fa-lg text-white"></i>
                                    <?= $texto[$lang]['card_email']; ?>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <h5><?= $tmpUsuario->getNome(); ?></h5>
                                            <?= $tmpTarefa->getEmailUsuario(); ?>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control">                                            
                                            </textarea>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn bg-primary-light form-control text-white">
                                                <i class="fa fa-envelope fa-fw text-white"></i>
                                                <?= $texto[$lang]['btn_email']; ?>
                                            </button>
                                            <hr>
                                            <a href="https://web.whatsapp.com/send?phone=<?= $tmpUsuario->getTelefone(); ?>" target="_blank" class="btn btn-success form-control text-white">
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
                                            $tipo = substr($itens[$i]->getNome(), count($itens[$i]->getNome()) - 4);

                                            if ($tipo == "txt") {
                                                $icon = "fa-file";
                                            } else if ($tipo == "doc") {
                                                $icon = "fa-file-word";
                                            }
                                            ?>
                                            <div class="col-md-2" style="text-align:center;">
                                                <i class="fa fa-file-o fa-2x"></i>
                                                
                                                <a href="../Control/ArquivosControl.php?proj=<?=$proj?>&tar=<?=$tar?>&acao=2&arq=<?=$itens[$i]->getCodigo();?>">
                                                    <i class="fa fa-times-circle fa-sm" style="color:red;position:absolute;left:20px;top:-8px;"></i>
                                                </a>
                                                
                                                <br>
                                                <a href="../../files/<?= $tmpTarefa->getCodigo(); ?>/<?= $itens[$i]->getNome(); ?>" target="_blank">
                                                    <font style="font-size:10pt;">
                                                        <?= $itens[$i]->getNome(); ?>                                                        
                                                    </font>
                                                </a>

                                            </div>

                                     <?php
                                        }
                                    ?>
                                    </div>

                                    <hr>
                                    <?php if ($tmpTarefa->getEmailUsuario() == $_SESSION['email']) { ?>
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
                                                <input type="hidden" name="codProjeto" value="<?= $tmpProjeto->getCodigo(); ?>">
                                                <input type="hidden" name="codTarefa" value="<?= $tmpTarefa->getCodigo(); ?>">
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
