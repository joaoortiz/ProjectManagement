<?php

require_once '../../DAO/PerguntasDAO.php';
require_once '../../Model/Perguntas.php';

$tmpPergunta = new Perguntas();

$tmpPergunta->setTexto($_POST['HTML_texto']);
$tmpPergunta->setResposta($_POST['HTML_resposta']);
$tmpPergunta->setIdTopico($_POST['HTML_topico']);

$objBDPerg = new PerguntasDAO();
$objBDPerg->cadastrarPergunta($tmpPergunta);

echo"<script>location.href='Help.php';</script>";
?>