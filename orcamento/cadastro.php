<?php
session_start();
// Verifica se o usuário NÃO está logado
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver logado, manda ele direto para a tela de login
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo orçamento</title>

    <style>
        body { font-family: Arial, sans-serif; background: #121212; color: white; padding: 20px; }
        form { background: #1e1e1e; padding: 20px; border-radius: 8px; max-width: 400px; margin: auto; }
        label { display: block; margin-top: 10px; color: #bbb; }
        input { width: 100%; padding: 10px; margin: 5px 0 15px 0; border-radius: 4px; border: 1px solid #333; background: #252525; color: white; box-sizing: border-box; }
        button { background: #28a745; color: white; border: none; padding: 12px; cursor: pointer; width: 100%; font-weight: bold; border-radius: 4px; }
        button:hover { background: #218838; }
    </style>

</head>
<body>

    <h2 style="text-align:center;"> Novo Orçamento </h2>

    <form action="salvar.php" method="POST">
        <label>Nome do Cliente:</label>
        <input type="text" name="cliente" required>

        <label>Modelo da Máquina:</label>
        <input type="text" name="modelo_maquina">

        <label>Valor Das Peças:</label>
        <input type="number" step="0.01" name="valor_pecas" value="0.00">

        <label>Mão de Obra:</label>
        <input type="number" step="0.01" name="valor_mao_de_obra" value="0.00">

        <button type="submit">Gravar Orçamento</button>
    </form>
    
</body>
</html>