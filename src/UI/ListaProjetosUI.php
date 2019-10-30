<?php
include "../../assets/php/lang.php";
$texto = translatePg();

require_once "../DAO/ProjetosDAO.php";
require_once "../Model/Projetos.php";


$email = $_SESSION['email'];
$itens = ProjetosDAO::listarProjetos(1, $email,"");

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
                        <th><?=$texto[$lang]['tblProj_col1'];?></th>
                        <th><?=$texto[$lang]['tblProj_col2'];?></th>
                        <th><?=$texto[$lang]['tblProj_col3'];?></th>
                        <th><?=$texto[$lang]['tblProj_col4'];?></th>
                        <th><?=$texto[$lang]['tblProj_col5'];?></th>
                    </thead> 
                    
                    <tbody>
                        
                        <?php 
                        if($itens != null){
                        
                        for($i=0; $i<count($itens); $i++) {  ?>
                        
                        <tr>
                            <td>
                                <a href="DetalhesProjetoUI.php?cod=<?=$itens[$i]->getCodigoProj();?>">
                                    <?=$itens[$i]->getNomeProj();?>
                                </a>
                            </td>
                                                        
                            <td><?=ProjetosDAO::corrigirData($itens[$i]->getInicioProj());?></td>
                            <td><?=ProjetosDAO::corrigirData($itens[$i]->getFimProj());?></td>
                            
                            <td><?=$itens[$i]->getNomeCategoria();?></td>
                            <td></td>
                        </tr>
                        
                        <?php  } 
                        }
                        ?>
                        
                    </tbody>
                    
                </table>                
                
            </div>
            
            
        </div>
        
    </body>

    
</html>