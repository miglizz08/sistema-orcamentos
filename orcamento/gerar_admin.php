<?php
require_once 'conexao.php';

$senha_criptografada = password_hash('admin123', PASSWORD_DEFAULT);

$sql_delete = "DELETE FROM usuarios WHERE email = 'admin@email.com'";
$conn->query($sql_delete);

$sql_insert = "INSERT INTO usuarios (nome, email, senha) VALUES ('Miguel Admin', 'admin@email.com', :senha)";
$stmt = $conn->prepare($sql_insert);
$stmt->execute(['senha' => $senha_criptografada]);

echo "<h1 style='color: #00ff66; background: #0b0f12; padding: 20px;'>Usuário gerado com sucesso!</h1>";
echo "<p>Pode voltar para a tela de <a href='login.php'>Login</a> e entrar com <b>admin@email.com</b> e senha <b>admin123</b>.</p>";
?>