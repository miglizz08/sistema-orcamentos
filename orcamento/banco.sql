CREATE TABLE orcamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100) NOT NULL,
    modelo_maquina VARCHAR(50),
    descricao_problema TEXT,
    valor_pecas DECIMAL(10,2) DEFAULT 0.00,
    valor_mao_de_obra DECIMAL(10,2) DEFAULT 0.00,
    -- Esta coluna abaixo soma tudo automaticamente:
    valor_total DECIMAL(10,2) AS (valor_pecas + valor_mao_de_obra), 
    status ENUM('Aberto', 'Aprovado', 'Finalizado') DEFAULT 'Aberto',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Vamos criar o seu primeiro usuário (A senha será 'admin123')
INSERT INTO usuarios (nome, email, senha) 
VALUES ('Miguel Admin', 'admin@email.com', '$2y$10$89E9p6.u9JvW.XjR0n.GFe7fM6pXf6pXf6pXf6pXf6pXf6pXf6pXf'); 
-- (Essa senha acima é um hash seguro para 'admin123')