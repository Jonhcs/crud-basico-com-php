<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = require('connection.php');

        $email = $_POST['email'] ?? null;

        $smtp = $conn->prepare('INSERT INTO users (email) VALUES (?)');
        $smtp->bind_param('s', $email);
        $smtp->execute();

        header('location: /crud');
        die();
    }
    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="email" placeholder="Digite um novo email">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>