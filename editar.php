<?php 
    
    $conn = require('connection.php');
    $id = $_GET['id'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? null;
        $smtp = $conn->prepare('UPDATE users SET email=? WHERE id=?');
        $smtp->bind_param('si', $email, $id);
        $smtp->execute();

        header('location: /crud');
        die();
    }
    $smtp = $conn->prepare('SELECT * FROM users WHERE id=?');
    $smtp->bind_param('i', $id);
    $smtp->execute();
    $result = $smtp->get_result();
    $user = $result->fetch_assoc();
    
    
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
    <form action="/crud/editar.php?id=<?php echo $user['id']; ?>" method="POST">
        <input type="text" name="email" value="<?php echo $user['email']; ?>">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>