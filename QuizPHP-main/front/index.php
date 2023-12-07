<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="index.css">
    <title>Quiz</title>
</head>
<body>
    <h1>Quiz</h1>
    <main>
    <form action="../back/gravaNomeAssunto.php" method="post">
    <?php
        if (isset($_GET['erro'])) {
            switch ($_GET['erro']) {
                case '1': echo'<p>Nome Inválido</p>';break;
                case '2': echo '<p>Tema Inválido</p>'; break;
            }
        }
        ?>
        <input type="text" id="input" placeholder="Insira seu nome:" name='nomeJogador'>
        <select name="assunto" id="select">
            <option value="selecione">Selecione um tema:</option>
            <option value="esportes"><i class='fa-solid fa-football'></i> Esporte</option>
            <option value="historia"><i class='fa-solid fa-landmark'></i> História</option>
            <option value="geografia"><i class='fa-solid fa-earth-americas'></i> Geografia</option>
            <option value="ciencia"><i class='fa-solid fa-flask'></i> Ciência</option>
            <option value="entretenimento"><i class='fa-solid fa-tv'></i> Entretenimento</option>
        </select>
        <button type="submit" id="btn">Começar</button>
    </form>
<div id="ranking">
    <h2>Ranking</h2>
    <?php
     session_start();
     session_destroy();
    if (file_exists('ranking.json')) {
        $rank = json_decode(file_get_contents('ranking.json'), true);
        foreach ($rank as $indice => $jogador) {
        echo "<div class='jogador'><span>".$indice+1 ."- ".$jogador['nome']."</span><span>".$jogador['pontuacao']."%  ";
        switch ($jogador['tema']) {
            case 'esportes': echo "<i class='fa-solid fa-football'></i>"; break;
            case 'geografia': echo "<i class='fa-solid fa-earth-americas'></i>"; break;
            case 'entretenimento': echo "<i class='fa-solid fa-tv'></i>"; break;
            case 'historia': echo "<i class='fa-solid fa-landmark'></i>"; break;
            case 'ciencia': echo "<i class='fa-solid fa-flask'></i>"; break;   
        } 
        echo '</span></div>';
        }
    } else{
        echo '<p>Nenhum Histórico Disponível';
    }
    ?>
</div>
</main>
</body>
</html>