<?php

$host     = "172.21.0.2"; // nome do container postgresql
$dbname   = "postgres";
$user     = "default";
$password = "password";

$pdo = new PDO("pgsql:host={$host};dbname={$dbname}", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM person;";
$consulta = $pdo->query($sql);
$linha = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo "LOCALHOST TEST BD POSTGRESQL<br><br>";
print_r($linha);

?>