<?php
session_start();
// Verifica se o usuário NÃO está logado
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver logado, manda ele direto para a tela de login
    header("Location: login.php");
    exit;
}
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    header("Location: listar.php");
    exit;
}

$id = $_GET['id'];

try {
    
    $stmt = $conn->prepare("SELECT * FROM orcamentos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $orcamento = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$orcamento) {
        header("Location: listar.php");
        exit;
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>WATTRON - Editar Orçamento</title>
    <style>
        body { background-color: #121212; color: white; font-family: Arial, sans-serif; padding: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #28a745; font-weight: bold; }
        input { width: 300px; padding: 8px; background: #222; border: 1px solid #444; color: white; border-radius: 4px; }
        button { background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        button:hover { background: #218838; }
    </style>
</head>
<body>

    <h2>Editar Orçamento #<?php echo $orcamento['id']; ?></h2>

    <form action="atualizar.php" method="POST">
        
        <input type="hidden" name="id" value="<?php echo $orcamento['id']; ?>">

        <div class="form-group">
            <label>Cliente:</label>
            <input type="text" name="cliente" value="<?php echo $orcamento['cliente']; ?>" required>
        </div>

        <div class="form-group">
            <label>Máquina:</label>
            <input type="text" name="modelo_maquina" value="<?php echo $orcamento['modelo_maquina']; ?>" required>
        </div>

        <div class="form-group">
            <label>Valor das Peças (R$):</label>
            <input type="number" step="0.01" name="valor_pecas" value="<?php echo $orcamento['valor_pecas']; ?>" required>
        </div>

        <div class="form-group">
            <label>Valor da Mão de Obra (R$):</label>
            <input type="number" step="0.01" name="valor_mao_de_obra" value="<?php echo $orcamento['valor_mao_de_obra']; ?>" required>
        </div>

        <button type="submit">Salvar Alterações</button>
        <a href="listar.php" style="color: #aaa; margin-left: 15px; text-decoration: none;">Cancelar</a>
    </form>

</body>
</html>