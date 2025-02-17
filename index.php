<?php
session_start();

if (!isset($_SESSION['numero'])) {
    $_SESSION['numero'] = rand(1, 100);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guess = intval($_POST['guess']);
    $numero = $_SESSION['numero'];

    if ($guess > $numero) {
        $message = "<h3>O número é menor que $guess</h3>";
    } elseif ($guess < $numero) {
        $message = "<h3>O número é maior que $guess</h3>";
    } else {
        $message = "<h3>Parabéns o número era $guess</h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Guess the number!!!</h2>

    <div class="container">
        <form action="" method="POST">
            <input type="text" name="guess" placeholder="Número entre 1 e 100"><br>
            <button type="submit">Enviar</button>
        </form>
    </div>
    <div class="container">
        <p><?php echo $message ?></p>
        <?php if ($guess !== NULL && $guess == $numero) {
            session_destroy();
            echo "<a href=index.php>Jogar Outra vez</a>";
        }
        ?>


    </div>

</body>

</html>