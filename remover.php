<?php 

    $conn = require('connection.php');
    $id = $_GET['id'] ?? null;
    $smtp = $conn->prepare('DELETE FROM users WHERE id=?');
    $smtp->bind_param('i', $id);
    $smtp->execute();
    header('location: /crud');