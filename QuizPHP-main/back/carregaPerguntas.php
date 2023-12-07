<?php
session_start();

if (isset($_SESSION['resultadoPergunta'])) {
    echo $_SESSION['resultadoPergunta'];
    unset($_SESSION['resultadoPergunta']);
}

if (!isset($_SESSION['perguntasAssunto'])) {
    $assunto = 'esportes';
    $perguntas = json_decode(file_get_contents('../perguntas.json'), true);
    $_SESSION['perguntasAssunto'] = $perguntas[$_SESSION['assunto']];
    $_SESSION['perguntasFeitas'] = 0;
}

$tamanhoArray = count($_SESSION['perguntasAssunto']);
 
if ($_SESSION['perguntasFeitas'] < 5) {
    $indicePerguntaSorteada = rand(0, $tamanhoArray - 1);
    echo $indicePerguntaSorteada;
    
    $_SESSION['perguntaAtual'] = $_SESSION['perguntasAssunto'][$indicePerguntaSorteada];
    unset($_SESSION['perguntasAssunto'][$indicePerguntaSorteada]);
    $_SESSION['perguntasFeitas']++;
    $_SESSION['perguntasAssunto'] = array_values($_SESSION['perguntasAssunto']);
    $_SESSION['tempo'] = 30;
    header('location:../front/perguntas.php');
} else {
    header('location: ../front/paginaFinal.php');
}