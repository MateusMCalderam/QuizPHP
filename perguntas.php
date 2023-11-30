<?php
session_start();

if (isset($_GET['erro'])) {
    if ($_GET['erro'] == '1') {
        echo 'acabou';
    }
} else {
    echo $_SESSION['perguntaAtual']['pergunta'];
    print_r($_SESSION['perguntaAtual']['alternativas']);
    echo $_SESSION['perguntaAtual']['resposta_correta'];
    
    
    echo '<a href="./carregaPerguntas.php">Voltar</a>';

}

// echo "<head><meta charset='UTF-8'><title>Pergunta</title><link rel='stylesheet' href='style.css'>";
// echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css' integrity='sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==' crossorigin='anonymous' referrerpolicy='no-referrer'/>";
// echo "</head><body><header><div>".$_SESSION['icone']."</div><div>algo</div><div id='contador'>60</div></header>";
// echo "<main><form action='verifica.php' method='post'><p>".$_SESSION['perguntaAtual']['pergunta']."</p>";
// foreach($_SESSION['alternativas'] as $ind => $alt){
//     echo "<input type='radio' class='dis' name='alternativa' id='".$ind."'><label for='".$ind."'>".$alt."</label>";
// }
// echo "<button type='submit' class='dis'>Envie sua Resposta</button></form></main><footer><button type='button' id='bomba'><i class='fa-solid fa-bomb'></i></button></footer>";
// echo "<script src='script.js'></script>";
