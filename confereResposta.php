<?php
session_start();

$respotaCerta =  $_SESSION['perguntaAtual']['respostaCorreta'];
$respotaEnviada =  $_POST['alternativa'];


if (!isset($_SESSION['numeroAcertos'])) {
    $_SESSION['numeroAcertos']= 0;
}

if($respotaEnviada == $respostaCerta){
    $_SESSION['numeroAcertos']++;
}
