<a href="#" onclick="document.getElementById('DivAdd').style.display = 'none';">
   <i class="fa fa-times-circle fa-lg fa-fw" style="color:#013059;"></i>
</a>

<div class="card" style="margin-top: 10px;">

    <div class="card-header bg-primary-shadow text-white">

        <h5>
            <i class="fa fa-user-plus fa-lg fa-fw text-white"></i>
            <?=$texto[$lang]['card_addmember'];?> - <?=$tmpProjeto->getNomeProj();?>

        </h5>
    </div>
    <div class="card-body text-center" style="min-height:150px;height:auto;">            
        <?=$texto[$lang]['text_addmember'];?>.<br><br>
        <form action="../Control/UsuariosControl.php" method="GET">
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope fa-fw"></i></span>
                </div>
                <input type="text" name="HTML_email" placeholder="<?=$texto[$lang]['pholder_email'];?>" class="form-control">
                </div>

            </div>
            <div class="form-group">
                <input type="hidden" name="cod" value="<?=$proj;?>">
                <input type="hidden" name="acao" value="4">
                <button type="submit" class="btn bg-primary-light text-white form-control"><?=$texto[$lang]['btn_add'];?></button>
            </div>
        </form>
    </div>
</div>