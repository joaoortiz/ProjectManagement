<?php
include "../../assets/php/lang.php";
$texto = translatePg();

require_once "../DAO/ProjetosDAO.php";
require_once "../Model/Projetos.php";


$email = $_SESSION['email'];
$itens = TarefasDAO::listarTarefas(2, 0, $email);
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/cores.css">
    </head>

    <body>
        <?php
        include "MenuTopoUI.php";
        ?>

        <div class="container">

            <div class="table-responsive border" style="margin-top:70px;">

                <table class="table table-striped">
                    <thead class="bg-primary-shadow text-white"> <!-- cabeçalho da tabela -->
                    <th><?= $texto[$lang]['tblTask_col1']; ?></th>
                    <th><?= $texto[$lang]['tblTask_col2']; ?></th>
                    <th><?= $texto[$lang]['tblTask_col3']; ?></th>
                    <th><?= $texto[$lang]['tblTask_col4']; ?></th>                         
                    </thead> 

                    <tbody>

                        <?php
                        if ($itens != null) {

                            for ($i = 0; $i < count($itens); $i++) {
                                $dadosProj = ProjetosDAO::consultarProjeto($itens[$i]->getCodigoProjeto());
                                ?>

                                <tr>
                                    <td>
                                        <a href="DetalhesTarefaUI.php?proj=<?= $dadosProj->getCodigo(); ?>&tar=<?= $itens[$i]->getCodigo(); ?>">
                                            <?= $itens[$i]->getNome(); ?>
                                        </a>
                                    </td>

                                    <td><?= ProjetosDAO::corrigirData($itens[$i]->getData()); ?></td>


                                    <td><?= $dadosProj->getNome(); ?></td>
                                    <td><?= $itens[$i]->getStatus(); ?></td>
                                </tr>

                                <?php
                            }
                        }
                        ?>

                    </tbody>

                </table>                

            </div>


        </div>

    </body>


</html>