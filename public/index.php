<?php
$rota = $_GET['rota'] ?? 'home';

switch ($rota) {
    case 'usuario':
        require_once __DIR__ . '/../routes/usuario.php';
        break;
    default:
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 40px;
        }

        h2 {
            color: #333;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Bem-vindo à página inicial!</h2>

    <a href="resources/views/cadastro.php" class="btn">Cadastrar Novo Usuário</a>
    <a href="resources/views/lista.php" class="btn">Ver Lista de Usuários</a>
</div>

</body>
</html>
