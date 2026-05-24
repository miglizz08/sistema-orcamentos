<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {

        $stmt = $conn->prepare("DELETE FROM orcamentos WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Orçamento apagado com sucesso!'); window.location.href='index.php';</script>";
        }
    } catch(PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
} else {

    header("Location: index.php");
}
?>