<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agenda</title>
</head>
<body>
    <section>
        <form action="logar.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="senha">Senha</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Entrar">
        </form>
    </section>
</body>
</html>