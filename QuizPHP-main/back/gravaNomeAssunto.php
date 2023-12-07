<?php
session_start();
if (!empty($_POST['nomeJogador'])) {
    $_SESSION['nomeJogador'] = $_POST['nomeJogador'];
    if ($_POST['assunto'] != 'selecione') {
        $_SESSION['assunto'] = $_POST['assunto'];
        header('location: carregaPerguntas.php');
    } else{
        header('location:../front/index.php?erro=2');
    }
} else {
    header('location:../front/index.php?erro=1');
}
