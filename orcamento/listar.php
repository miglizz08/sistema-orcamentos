<?php
require_once 'conexao.php';

try{
    $stmt = $conn->prepare("SELECT * FROM orcamentos ORDER BY id DESC");
    $stmt->execute();
    $orcamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$faturamento_total = 0;
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Orçamentos</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #121212; color: #e0e0e0; padding: 30px; }
        h2 { color: #28a745; text-align: center; }
        table { width: 100%; border-collapse: collapse; background: #1e1e1e; margin-top: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.5); }
        th, td { padding: 15px; border: 1px solid #333; text-align: left; }
        th { background: #252525; color: #28a745; text-transform: uppercase; font-size: 0.9em; }
        tr:hover { background: #262626; }
        .valor { font-family: 'Courier New', Courier, monospace; }
        .total-geral { background: #28a745; color: white; padding: 15px; margin-top: 20px; border-radius: 5px; text-align: right; font-size: 1.2em; }
        a.btn { display: inline-block; background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; }
        a.btn-excluir { background: #dc3545; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 0.9em; }
        a.btn-excluir:hover { background: #c82333; }
        a.btn-editar { background: #007bff; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 0.9em; margin-right: 5px; }
        a.btn-editar:hover { background: #0056b3; }
    </style>
</head>
<body>

    <h2>Gerenciamento de Orçamentos</h2>
    
    <a href="cadastro.php" class="btn">+ Novo Orçamento</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Máquina</th>
                <th>Peças (R$)</th>
                <th>Mão de Obra (Lucro)</th>
                <th>Total do Orçamento</th>
                <th>Ações</th> </tr>
        </thead>
        <tbody>
            <?php foreach($orcamentos as $item): 
                $faturamento_total += $item['valor_total'];
            ?>
            <tr>
                <td>#<?php echo $item['id']; ?></td>
                <td><?php echo $item['cliente']; ?></td>
                <td><?php echo $item['modelo_maquina']; ?></td>
                <td class="valor">R$ <?php echo number_format($item['valor_pecas'], 2, ',', '.'); ?></td>
                <td class="valor" style="color: #4db8ff;">R$ <?php echo number_format($item['valor_mao_de_obra'], 2, ',', '.'); ?></td>
                <td class="valor" style="font-weight: bold; color: #28a745;">R$ <?php echo number_format($item['valor_total'], 2, ',', '.'); ?></td>
                
                <td>
                    <a href="editar.php?id=<?php echo $item['id']; ?>" class="btn-editar">Editar</a>
                    
                    <a href="excluir.php?id=<?php echo $item['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja apagar este orçamento?');">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total-geral">
        <strong>Faturamento Total Acumulado: R$ <?php echo number_format($faturamento_total, 2, ',', '.'); ?></strong>
    </div>

</body>
</html>