<?php
session_start();
$name = isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : '';
$rec = isset($_SESSION['rec']) ? htmlspecialchars($_SESSION['rec']) : '';
$response = isset($_SESSION['response']) ? htmlspecialchars($_SESSION['response']) : '';
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
            <input type="text"
                   id="name"
                   name="name"
                   placeholder="Віка" required
                   value="<?php echo $name; ?>">
        </li>
        <li>
            <label for="rec">Пошук рецепту за інгредієнтом:</label>
            <input type="text"
                   id="rec"
                   name="rec"
                   placeholder="Перець солодкий"
                   value="<?php echo $rec; ?>">
        </li>
    </ul>
    <input type="submit" value="Submit">
</form>
<div class="response">
    <p><?php echo $response; ?></p>
</div>
</body>
</html>
