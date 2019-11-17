<?php

$conn = new mysqli('localhost','root', '0110', 'php_mysqli_iniciando');

if ($conn->connect_errno) {
    die('Falha:' . $conn->connect_errno);
}

return $conn;
?>

<h1>OLá</h1>