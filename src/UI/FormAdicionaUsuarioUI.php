<a href="#" class="btn-add" onclick="document.getElementById('DivAdd').style.display = 'none';">
    Fechar
</a>
<div class="card" style="margin-top: 10px;">

    <div class="card-header bg-primary-shadow text-white">

        <h5 class="card-title">Adicionar Integrante - <?=$tmpProjeto->getNome();?>

        </h5>
    </div>
    <div class="card-body text-center" style="min-height:150px;height:auto;">
        Informe o e-mail do Usuário que será adicionado ao projeto.<br><br>
        <form action="../Control/UsuariosControl.php" method="GET">
            <div class="form-group">
                <input type="text" name="HTML_email" placeholder="Insira o email do usuário" class="form-control">

            </div>
            <div class="form-group">
                <input type="hidden" name="cod" value="<?=$proj;?>">
                <input type="hidden" name="acao" value="4">
                <button type="submit" class="btn bg-primary-light text-white form-control">Cadastrar</button>
            </div>
        </form>
    </div>
</div>