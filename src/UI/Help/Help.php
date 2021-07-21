<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/cores.css">
    </head>

    <body>

        <?php
        require_once '../../DAO/PerguntasDAO.php';
        ?>

        <div class="container">
            <form action="Help.php" method="GET">
            <div class="row justify-content-md-center">
                
                <div class="col-lg-4 form-inline">                        
                    <input type="text" class="form-control" name="HTML_busca" placeholder="Digite aqui sua busca">
                </div>
                <div class="col-lg-3"> 
                    <input type="hidden" name="idTop" value="-1">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>                
            </div>
                </form>
            <hr>
            <div class="row">

                <?php
                $objBDTop = new PerguntasDAO();
                $lista = $objBDTop->listarTopicos();

                for ($i = 0; $i < count($lista); $i++) {
                    ?>
                    <div class="col-lg-1">
                        <a href="?idTop=<?= $lista[$i]->getId(); ?>">
                            <?= $lista[$i]->getNome(); ?>
                        </a>
                    </div>
                    <?php
                }
                ?>

                <div class="col-lg-5 text-right">
                    <a href="FormCadastroPerguntaUI.php">
                        Cadastrar Pergunta
                    </a>
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-12">
                    <?php
                    $palavra = "";
                    
                    if (!isset($_GET['idTop'])) //todos as perguntas
                        $idTopico = 0;
                    else{ //pergunta por topico ou busca
                        $idTopico = $_GET['idTop'];
                        
                        if($idTopico == -1){ //por palavra
                            $palavra = $_GET['HTML_busca'];                        
                           
                        }
                    }
                    
                    $lista = $objBDTop->listarPerguntas($idTopico, $palavra);

                    for ($i = 0; $i < count($lista); $i++) {
                        ?>

                        <h6><?= $lista[$i]->getTexto(); ?></h6>
                        R: <?= $lista[$i]->getResposta(); ?>

                        <hr>
                        <?php
                    }
                    ?>
                </div>

            </div>


        </div>
    </body>
</html>