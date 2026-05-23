CREATE TABLE orcamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100) NOT NULL,
    modelo_maquina VARCHAR(50),
    descricao_problema TEXT,
    valor_pecas DECIMAL(10,2) DEFAULT 0.00,
    valor_mao_de_obra DECIMAL(10,2) DEFAULT 0.00, -- Agora é uma coluna normal
    -- Esta coluna abaixo soma tudo automaticamente:
    valor_total DECIMAL(10,2) AS (valor_pecas + valor_mao_de_obra), 
    status ENUM('Aberto', 'Aprovado', 'Finalizado') DEFAULT 'Aberto',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);