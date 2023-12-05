<?php
    session_start();

    $respostaCerta =  $_SESSION['perguntaAtual']["resposta_correta"];
    $respostaEnviada =  $_POST['alternativa'];


    if (!isset($_SESSION['numeroAcertos'])) {
        $_SESSION['numeroAcertos']= 0;
    }
    if($respostaEnviada == $respostaCerta){
        $_SESSION['numeroAcertos']++;
        $_SESSION['resultadoPergunta'] = 'Acertou';
    } else {
        $_SESSION['resultadoPergunta'] = 'Errou';
    }
    header('location: mostraResultado.php');
?>
</div>
</body>
</html>