<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="perguntas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>Pergunta</title>
</head>

<body>
<?php
    session_start();
    echo '<header class="'.$_SESSION['assunto'].'">';
    echo  "<div id='inicio'>";
    echo " <div id='icon'>";
    switch ($_SESSION['assunto']) {
        case 'esportes': echo "<i class='fa-solid fa-football'></i></div>"; break;
        case 'geografia': echo "<i class='fa-solid fa-earth-americas'></i></div>"; break;
        case 'entretenimento': echo "<i class='fa-solid fa-tv'></i></div>"; break;
        case 'historia': echo "<i class='fa-solid fa-landmark'></i></div>"; break;
        case 'ciencia': echo " <i class='fa-solid fa-flask'></i></div>"; break;   
    }
    echo "<div id='tema'>".$_SESSION['assunto']."</div></div>";
    echo "</header>";
    echo "<main><form action='../back/confereResposta.php' method='post'><p class='pergunta'>".$_SESSION['perguntaAtual']['pergunta']."</p>";
    echo "<div id='img'> <img src=".$_SESSION['perguntaAtual']['imagem']."></div><div id='alternativas'>";
    if (!isset($_SESSION['resultadoPergunta'])) {
        foreach($_SESSION['perguntaAtual']['alternativas'] as $ind => $alt){
            echo "<div><input type='radio' class='opt' name='alternativa' id='".$ind."'value='".$ind."'><label for=".$ind.">".$alt."</label></div>";
        }
        echo "</div><button type='submit' id='responder' class='opt'>Envie sua Resposta</button></form></main>";
    } else if ($_SESSION['resultadoPergunta']){
        foreach($_SESSION['perguntaAtual']['alternativas'] as $ind => $alt){
            if ($ind == $_SESSION['perguntaAtual']["resposta_correta"]) {
                echo "<div id='correta'><p class='opt'>".$alt."<p></div>";
            } else{
                echo "<div><p class='opt'>".$alt."<p></div>";
            }
        }
        echo "</div><a href='../back/carregaPerguntas.php'><button type='button' id='responder' class='opt'>Próxima Pergunta</button></a></form></main><footer></footer>";
    } else {
        foreach($_SESSION['perguntaAtual']['alternativas'] as $ind => $alt){
            if ($ind == $_SESSION['perguntaAtual']["resposta_correta"]) {
                echo "<div id='correta'><p class='opt'>".$alt."<p></div>";
            } else if ($ind == $_SESSION['respostaClicada']) {
                echo "<div id='incorreta'><p class='opt'>".$alt."<p></div>";
            } else {
                echo "<div><p class='opt'>".$alt."<p></div>";
            }
            
        }
        echo "</div><a href='../back/carregaPerguntas.php'><button type='button' id='responder' class='opt'>Próxima Pergunta</button></a></form></main><footer></footer>";
    }
?>
</body>
</html>