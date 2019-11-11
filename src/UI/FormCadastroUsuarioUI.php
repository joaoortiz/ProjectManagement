<?php

include "../../assets/php/lang.php";
$texto = translatePg();
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/cores.css">
    </head>

    <body>   
        <div class="container">
            <center>
                <div class="col-md-6 border"style="margin-top:100px;">
                    <form action="../Control/UsuariosControl.php" method="post">
                        <p>
                            <?=$texto[$lang]['text_caduser'];?>
                        </p>

                        <div class="form-group">
                            <input type="text" name="HTML_nome" placeholder="<?=$texto[$lang]['pholder_username'];?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="HTML_email" placeholder="<?=$texto[$lang]['pholder_email'];?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="HTML_senha" placeholder="<?=$texto[$lang]['pholder_pass'];?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="HTML_confsenha" placeholder="<?=$texto[$lang]['pholder_confpass'];?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" name="HTML_telefone" placeholder="<?=$texto[$lang]['pholder_phone'];?>" class="form-control">
                        </div>

                        <div class="form-group" style="text-align:right;">
                            <input type = "hidden" name="acao" value="2">
                            <button type="submit" class="btn btn-primary"><?=$texto[$lang]['btn_register'];?></button> 
                        </div>
                    </form>
                </div>
            </center>
        </div>

    </body>   


</html>