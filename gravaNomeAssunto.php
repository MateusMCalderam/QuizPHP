<?php
session_start();
$_SESSION['nomeJogador'] = $_POST['nomeJogador'];
$_SESSION['assunto'] = $_POST['assunto'];

header('location: perguntas.php?arquivo=grava');