<meta charset="utf-8">

<?php
require_once "../Model/Projetos.php";
require_once "../DAO/ProjetosDAO.php";

session_start();

$proj = $_GET['cod'];
$tmpProjeto = ProjetosDAO::consultarProjeto($proj);

$inicio = $tmpProjeto->getInicio();
$fim = $tmpProjeto->getFim();
?>
<html>
    <head>

        <style>
            #DivAdd{
                display:none;
                background-color: white;
                position:absolute;
                top:50%;
                left:50%;
                margin-left:-350px;
                margin-top:-165px;
                padding:10px;
                width:700px;
                height:330px;
                border:1px solid #CCCCCC;
                box-shadow: #0275d8 3px 3px;
            }
        </style>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/cores.css">
        <link rel="stylesheet" href="../../assets/css/estilos.css">
        
    </head>
    <body>

        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary-dark text-white">
                            <h5> <?= $tmpProjeto->getNome(); ?> </h5>                       
                        </div>
                        <div class="card-body">
                            <?= $tmpProjeto->getDescricao(); ?>
                        </div>                               
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="margin-top:10px;">

                    <div class="card">
                        <div class="card-header bg-primary-shadow text-white">
                            Concluído
                        </div>
                        <div class="card-body text-center" style="height:120px;line-height:80px;">

                            <?php
                            $concluido = ProjetosDAO::calcularProgresso($proj);
                            ?>

                            <font style="font-family:impact;font-size:100px;">
                            <?= $concluido; ?>%
                            </font>                            
                        </div>
                    </div>
                    <div class="card" style="margin-top: 10px;">
                        <div class="card-header bg-primary-shadow text-white">
                           Integrantes
                                <a href="#" class="btn btn-add float-right" onclick="document.getElementById('DivAdd').style.display='block';">
                                    <h5>+</h5>
                                </a>
                           
                        </div>
                        <div class="card-body text-center" style="min-height:220px;height:auto;">
                            (integrantes)

                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="margin-top:10px;">

                    <?php
                    $progresso = ProjetosDAO::medirProjeto($inicio, $fim);

                    if ($progresso < 30) {
                        $cor = "#98FB98"; //verde
                    } else if ($progresso < 70) {
                        $cor = "#FFA500"; //laranja/amarelo
                    } else if ($progresso < 100) {
                        $cor = "#FF0000"; //vermelho
                    } else {
                        $cor = "#555555"; //preto
                        $progresso = 100;
                    }
                    ?>                    

                    <div style="padding:5px;max-width:100%;width:<?= $progresso; ?>%;height:60px;background-color:<?= $cor; ?>;" id="DivBarra">                        
                        <div style="width:500px;">
                            <h1 style="font-family:impact;color:#999999">
                                <?= ProjetosDAO::contarDias($fim); ?> dias restantes.
                            </h1>
                        </div>
                    </div>

                    <div class="float-left">
                        <?= ProjetosDAO::corrigirData($tmpProjeto->getInicio()); ?>
                    </div>
                    <div class="float-right">     
                        <?= ProjetosDAO::corrigirData($tmpProjeto->getFim()); ?>
                    </div>
                    <br><br>
                    <div class="card">
                        <div class="card-header bg-primary-shadow text-white">
                            <div class="row">
                                <div class="col-md-11">
                                    Tarefas
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-add" href="FormCadastroTarefaUI.php?cod=<?= $tmpProjeto->getCodigo();?>">
                                        <h5>+</h5>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body" style="min-height:318px;height:auto;">
                            <?php
                            include "ListaTarefasUI.php";
                            ?>
                        </div> 
                    </div>
                </div>

            </div>

        </div>

        <!-- ********************Div Externa **************-->

        <div id="DivAdd">
            
            <?php
                include "FormAdicionaUsuarioUI.php";
            ?>
        </div>

    </body>

</html>
