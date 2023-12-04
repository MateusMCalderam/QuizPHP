<?php
session_start();



if (!isset($_SESSION['perguntasAssunto'])) {
    $assunto = 'esportes';
    $perguntas = json_decode(file_get_contents('perguntas.json'), true);
    $_SESSION['perguntasAssunto'] = $perguntas['esportes'];
    $_SESSION['perguntasFeitas'] = 1;
}

$tamanhoArray = count($_SESSION['perguntasAssunto']);
 
if ($_SESSION['perguntasFeitas'] <= 5) {
    $indicePerguntaSorteada = rand(0, $tamanhoArray - 1);
    echo $indicePerguntaSorteada;
    
    $_SESSION['perguntaAtual'] = $_SESSION['perguntasAssunto'][$indicePerguntaSorteada];
    unset($_SESSION['perguntasAssunto'][$indicePerguntaSorteada]);
    $_SESSION['perguntasFeitas']++;
    $_SESSION['perguntasAssunto'] = array_values($_SESSION['perguntasAssunto']);
    header('location: perguntas.php');
} else {
    header('location: paginaFinal.php');
    session_destroy();
}
