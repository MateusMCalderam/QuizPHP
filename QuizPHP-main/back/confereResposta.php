<?php
    session_start();

    if (isset($_POST['alternativa'])) {
        $respostaCerta =  $_SESSION['perguntaAtual']["resposta_correta"];
        var_dump($_POST['alternativa']);
        
        if (!isset($_SESSION['numeroAcertos'])) {
            $_SESSION['numeroAcertos']= 0;
        }
        if($_POST['alternativa'] == $_SESSION['perguntaAtual']["resposta_correta"]){
            $_SESSION['numeroAcertos']++;
            $_SESSION['resultadoPergunta'] = true;
        } else {
            $_SESSION['respostaClicada'] =  $_POST['alternativa'];
            $_SESSION['resultadoPergunta'] = false;
        }
        header('location:../front/perguntas.php');
    } else{
        header('location:../front/perguntas.php');
    } 