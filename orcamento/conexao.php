<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "db_orcamento";

try {

    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "Servidor conectado senhor!";

} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>