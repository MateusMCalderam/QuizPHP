<?php
$respostaCorreta = $_SESSION['respostaCorreta'];
$respostaAtual = $_POST['respostaAtual'];

$pontuacao = 0;

if($respostaAtual == $respostaCorreta){
    $pontuacao++;
}