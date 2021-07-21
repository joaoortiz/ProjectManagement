 <nav class="navbar navbar-expand-lg bg-primary-dark">

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="nav navbar-brand">
                    <img src="../../img/logo.png">
                </div>
                <div class="navbar-nav col-md-10">
                    <a class="navbar-brand text-white" href="HomeUsuariosUI.php"><?=$texto[$lang]['title'];?></a>
                    <a class="nav-item nav-link text-white" href="ListaProjetosUI.php"><?=$texto[$lang]['menu_item1'];?></a>
                    <a class="nav-item nav-link text-white" href="ListaTarefasUI.php"><?=$texto[$lang]['menu_item2'];?></a>
                    <a class="nav-item nav-link text-white" href="Help/Help.php">Ajuda</a>
                    <a class="nav-item nav-link text-white" href="../Control/UsuariosControl.php?acao=3"><?=$texto[$lang]['menu_item3'];?></a>
                </div>
                <div class="navbar-nav col-md-2">
                    <i class="fa fa-user fa-2x fa-fw text-white"></i>
                    <h5 class="float-right text-white"><?=$_SESSION['nome'];?></h5>
                </div>
                    
                </div>
            </div>
        </nav>