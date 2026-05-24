<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $modelo = $_POST['modelo_maquina'];
    $pecas = $_POST['valor_pecas'];
    $obra = $_POST['valor_mao_de_obra'];

    try {

        $sql = "UPDATE orcamentos 
                SET cliente = :cliente, 
                    modelo_maquina = :modelo, 
                    valor_pecas = :pecas, 
                    valor_mao_de_obra = :obra 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':cliente', $cliente);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':pecas', $pecas);
        $stmt->bindParam(':obra', $obra);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Orçamento atualizado com sucesso!'); window.location.href='index.php';</script>";
        }
    } catch(PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
}
?>