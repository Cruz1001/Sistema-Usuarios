<?php
require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../../app/Controllers/UsuarioController.php';
require_once __DIR__ . '/../../app/Models/Usuario.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 2rem 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
        }

        label {
            margin-top: 1rem;
            display: block;
            font-weight: 500;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 0.7rem;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-top: 0.4rem;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .button, 
        .button:link, 
        .button:visited, 
        input[type="submit"].button {
            display: block;
            margin-top: 1rem;
            width: 100%;
            padding: 0.75rem;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Cadastro de Usuário</h2>

        <form action="../../public/index.php?rota=usuario" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label for="rg">RG:</label>
            <input type="text" name="rg" required>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <input type="submit" value="Cadastrar" class="button">
        </form>

        <a href="../../public/index.php" class="button">Voltar para a página inicial</a>
    </div>

    <script>
    function mascaraCPF(cpf) {
        cpf = cpf.replace(/\D/g, '');
        cpf = cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4'); 
        return cpf;
    }

    
    function mascaraRG(rg) {
        rg = rg.replace(/\D/g, ''); 
        rg = rg.replace(/^(\d{2})(\d{3})(\d{3})(\d{1})$/, '$1.$2.$3-$4'); 
        return rg;
    }

   
    document.querySelector('[name="cpf"]').addEventListener('input', function(e) {
        e.target.value = mascaraCPF(e.target.value);
    });

    document.querySelector('[name="rg"]').addEventListener('input', function(e) {
        e.target.value = mascaraRG(e.target.value);
    });
    </script>
</body>
</html>
