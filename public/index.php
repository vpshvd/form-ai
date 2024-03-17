<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Кулінарія (змінити)</title>
</head>
<body>
<form action="form.php" method="post">
    <ul>
        <li>
            <label for="name">Ваше ім'я</label>
            <input type="text" id="name" name="name" placeholder="Віка" required>
        </li>
        <li>
            <label for="rec">Пошук рецепту за інгредієнтом:</label>
            <input type="text" id="rec" name="rec" placeholder="Перець солодкий">
        </li>
    </ul>
    <input type="submit" value="Submit">
</form>
<div class="response">
    <?php
    if (isset($_SESSION['name'], $_SESSION['response'])) {
        echo "<p>Welcome, ".$_SESSION['name']."!</p>";
        echo "<p>".$_SESSION['response']."</p>";
        unset($_SESSION['name'], $_SESSION['response']);
    }
    ?>
</div>
</body>
</html>
