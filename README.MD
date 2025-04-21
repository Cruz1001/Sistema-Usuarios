# Sistema De Cadastro de Usuários
Este projeto é um sistema completo de cadastro de usuários, desenvolvido em PHP puro com POO, utilizando PDO para acesso seguro ao banco de dados. Idealizado como exercício prático para consolidar conhecimentos em back-end e organização de projetos
# Funcionalidades
- Cadastro de usuários (nome, RG, CPF e e-mail)

- Consulta e listagem de todos os usuários cadastrados

- Edição de usuários

- Exclusão de usuários

- Busca por CPF

- Segurança básica com sanitização dos dados
# Estrutura do Projeto
cadastro-usuarios-php/
├── app/
│   ├── Controllers/
│   │   └── UsuarioController.php      # Lógica de controle (regras de negócio)
│   ├── Models/
│   │   └── Usuario.php                # Modelo com métodos CRUD e conexão com DB
│
├── config/
│   └── database.php                   # Arquivo de conexão com o banco de dados
│
├── public/
│   └── index.php                      # Ponto de entrada da aplicação
│
├── resources/
│   └── views/
│       ├── cadastro.php               # Página com formulário de cadastro/edição
│       └── lista.php                  # Página com a listagem de usuários
│
├── routes/
│   └── usuario/                       # Arquivos com definição das rotas de usuário
│       └── web.php                    # Define as rotas HTTP (ex: /criar, /editar)

# Tecnologias usadas
- PHP

- MySQL

- HTML + CSS + JavaScript (máscaras de input)

# Como Executar Localmente
## Clone o repositório:

git clone https://github.com/seu-usuario/cadastro-usuarios-php.git
cd cadastro-usuarios-php

## Crie o banco de dados no MySQL:

CREATE DATABASE cadastro_usuarios;

## Crie a tabela usuarios:

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  rg VARCHAR(20),
  cpf VARCHAR(20),
  email VARCHAR(100)
);

Configure o banco em config/database.php com suas credenciais locais.

## Suba um servidor local:

php -S localhost:8000 -t public
Acesse http://localhost:8000 no navegador.

