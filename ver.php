<?php 
    $conn = require ('connection.php');
    $id = $_GET['id'] ?? null;

    $smtp = $conn->prepare('SELECT * FROM users WHERE id=?');
    $smtp->bind_param('i', $id);
    $smtp->execute();
    $result = $smtp->get_result();

    $user = $result->fetch_assoc();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <h1><?php echo $user['email']; ?></h1>

    <p>O id deste usuário é <?php echo $user['id']; ?></p>

    <div >
        <p><a href="/crud/editar.php?id=<?php echo $user['id']; ?>">Editar</a></p>
        <p><a href="/crud/remover.php?id=<?php echo $user['id']; ?>">Remover</a></p>
    </div>
    

    <p><a href="/crud">voltar</a></p>
    </body>
</html>