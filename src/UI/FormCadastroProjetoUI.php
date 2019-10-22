<?php
include "../../assets/php/lang.php";
$texto = translatePg();

require_once "../Model/Categorias.php";
require_once "../DAO/CategoriasDAO.php";


$itens = CategoriasDAO::listarCategorias();
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
        
        <div class="container d-flex" style="justify-content:center;">
            <div class="col-md-8"style="margin-top:100px;">
                <center><p><h5><?=$texto[$lang]['text_cadproj'];?></h5></p></center>
                
                <form action="../Control/ProjetosControl.php" method="post">
                
                    <div class="form-group">
                        <h5><?=$texto[$lang]['text_coord'];?>: <?=$_SESSION['nome'];?></h5>
                    </div>
                    <div class="form-group">
                        <input type="text" name="HTML_nome" placeholder="<?=$texto[$lang]['pholder_projname'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><?=$texto[$lang]['pholder_projdesc'];?></label>
                        <textarea name="HTML_descricao" class="form-control"></textarea> 
                    </div>
                    <div class="form-group">
                        <select name="HTML_categoria" class="form-control">
                            <option><?=$texto[$lang]['pholder_projcat'];?></option>
                            
                            <?php
                                for($i=0; $i<count($itens); $i++){
                            ?>
                            <option value="<?=$itens[$i]->getCodigoCategoria();?>">
                                <?=$itens[$i]->getNomeCategoria();?>
                            </option>
                            
                            <?php
                                }
                            ?>
                            
                            
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label><?=$texto[$lang]['pholder_projstart'];?></label>
                            <input type="date" name="HTML_inicio" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=$texto[$lang]['pholder_projend'];?></label>
                            <input type="date" name="HTML_fim" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="acao" value="2">
                        <button type="submit" class="btn bg-primary-light text-white form-control"><?=$texto[$lang]['btn_register'];?></button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>