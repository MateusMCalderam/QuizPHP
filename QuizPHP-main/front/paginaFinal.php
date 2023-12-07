<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parabéns</title>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        div {
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        p {
            font-size: 1.1rem;
        }
        a{text-decoration: none;}
        button {
            margin-top: 0.938rem;
            font-size: 1rem;
            padding: 20px;
            border: 0.188rem solid #3C0770;
            background-color: #8041BF;
            color: white;
            font-weight: bold;
            border-radius: 0.625rem;
        }
        button:hover{scale: 1.025;cursor: pointer;} 
    </style>
</head>

<body>
<?php
    session_start();
    if (isset($_SESSION['nomeJogador'])) {
    if (file_exists('ranking.json')) {
        $dados_usuarios = json_decode(file_get_contents('ranking.json'), true);
    } else {
        $dados_usuarios = [];
    }
    $novoUsuatio = array(
        "nome" => $_SESSION['nomeJogador'],
        "pontuacao" => $_SESSION['numeroAcertos'] * 20,
        "tema" => $_SESSION['assunto']
    );
    $dados_usuarios[] = $novoUsuatio;
    usort($dados_usuarios, function ($a, $b) {
        return $b['pontuacao'] - $a['pontuacao'];
    });
    file_put_contents('ranking.json', json_encode($dados_usuarios));
    echo "<div><h1>Parabéns, ".$_SESSION['nomeJogador']."</h1>";
    echo "<p>Sua porcentagem de acerto foi de ".$_SESSION['numeroAcertos'] * 20 ."% no tema ".$_SESSION['assunto']."</p> </div>";
    echo "<button type='button'><a href='index.php'>Jogar Novamente</a></button>";
    }
    ?>
</body>

</html>