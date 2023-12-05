<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            min-height: 100vh;
        }
        div:first-child{
            width: 60%;
            height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }
    </style>
</head>
<body>
    <div>
        <?php
            session_start();
            echo '<p>'.$_SESSION['resultadoPergunta'].'</p>';
            echo '<a href="./carregaPerguntas.php">aa</a>';
        ?>
    </div>
</body>
</html>
