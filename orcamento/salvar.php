<?php
require_once 'conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente =  $_POST['cliente'];
    $modelo = $_POST['modelo_maquina'];
    $pecas = $_POST['valor_pecas'];
    $obra = $_POST['valor_mao_de_obra'];

    try {

        $sql = "INSERT INTO orcamentos (cliente, modelo_maquina, valor_pecas, valor_mao_de_obra)
                VALUES (:cliente, :modelo, :pecas, :obra)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':cliente', $cliente);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':pecas', $pecas);
        $stmt->bindParam(':obra', $obra);

        if ($stmt->execute()) {
            echo "<script>alert('Orçamento salvo com sucesso!'); window.location.href='listar.php';</script>";
        }
    } catch(PDOException $e) {
        echo "Erro ao salvar: " . $e->getMessage();
    }
}
?>