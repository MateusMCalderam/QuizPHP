<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='https://dnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css' integrity='sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==' crossorigin='anonymous' referrerpolicy='no-referrer'/>
        <title>Pergunta</title>
    </head>
    <body>
<?php
    session_start();
    if (isset($_GET['erro'])) {
    if ($_GET['erro'] == '1') {
        echo 'acabou';
    }
    } else {
    echo "<div>"."</div><div>algo</div><div id='contador'>60</div></header>";
    echo "<main><form action='confereResposta.php' method='post'><p>".$_SESSION['perguntaAtual']['pergunta']."</p>";
    foreach($_SESSION['perguntaAtual']['alternativas'] as $ind => $alt){
        echo "<input type='radio' class='dis' name='alternativa' id='".$ind."' value='".$ind."'><label for='".$ind."'>".$alt."</label>";
    }
    echo "<button type='submit' class='dis'>Envie sua Resposta</button></form></main><footer><button type='button' id='bomba'><i class='fa-solid fa-bomb'></i></button></footer>";
    echo "<script src='script.js'></script>";
}
?>
</body>
</html>



