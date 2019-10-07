<meta charset="utf-8">

<?php
require_once "../Model/Projetos.php";
require_once "../DAO/ProjetosDAO.php";
require_once "../Model/Tarefas.php";
require_once "../DAO/TarefasDAO.php";
require_once "../Model/Usuarios.php";
require_once "../DAO/UsuariosDAO.php";
session_start();

$proj = $_GET['proj'];
$tar = $_GET['tar'];
$tmpProjeto = ProjetosDAO::consultarProjeto($proj);
$adm = $tmpProjeto->getEmailUsuario();
$tmpTarefa = TarefasDAO::consultarTarefa($tar);
$tmpUsuario = UsuariosDAO::consultarUsuario($tmpTarefa->getEmailUsuario());

if ($tmpTarefa->getStatus() == 0) {
    $status = "Incompleta";
} else {
    $status = "Finalizada";
}
?>
<html>
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/css/cores.css">

    </head>
    <body>
        <div class="container" style="margin-top: 10px;">
            <div class="card">
                <div class="card-header bg-primary-dark text-white">

                    <h5><i class="fa fa-file-text fa-fw text-white"></i> <?= $tmpProjeto->getNome(); ?></h5>
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
                                        Finalizar
                                    </a>
                                <?php } else { ?>

                                    <a href="../Control/TarefasControl.php?proj=<?= $tmpProjeto->getCodigo(); ?>&tar=<?= $tmpTarefa->getCodigo(); ?>&acao=3" class="btn btn-warning float-right text-white">
                                        <i class="fa fa-thumbs-down fa-fw fa-lg"></i>
                                        Reabrir
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
                                    Enviar mensagem ao responsável
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
                                                Enviar E-mail
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
                                    Arquivos
                                </div>
                                <div class="card-body">
                                    LISTA DE ARQUIVOS   

                                    <form>
                                        <div class="form-group">
                                            <input type="file" class="form-control-sm">
                                        </div>

                                    </form>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </body>

</html>
