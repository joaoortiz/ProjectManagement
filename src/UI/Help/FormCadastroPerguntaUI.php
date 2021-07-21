<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../../assets/css/cores.css">
    </head>

    <body>
        
        <?php
        require_once '../../DAO/PerguntasDAO.php';
        ?>
        <div class="container">


            <form action="CadastroPergunta.php" method="POST">
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Pergunta</label>
                            <input type="text" class="form-control" name="HTML_texto">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Resposta</label>
                            <textarea class="form-control" name="HTML_resposta"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tópico</label>
                            <select name="HTML_topico" class="form-control">
                                <?php
                                $objBDTop = new PerguntasDAO();
                                $lista = $objBDTop->listarTopicos();

                                for ($i = 0; $i < count($lista); $i++) {
                                    ?>                                    
                                        <option value="<?= $lista[$i]->getId(); ?>">
                                                <?= $lista[$i]->getNome(); ?>
                                        </a>                                    
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Cadastrar Pergunta</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>

</html>