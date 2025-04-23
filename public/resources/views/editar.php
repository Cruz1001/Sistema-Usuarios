<?php
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../app/Controllers/UsuarioController.php';
require_once __DIR__ . '/../../../app/Models/Usuario.php';


$db = new Database();
$conn = $db->conectar();

$usuario = new Usuario($conn);

if (!isset($_GET['id'])) {
    echo "ID Não Informado.";
    exit;
}

$id = $_GET['id'];
$dados = $usuario->buscarUsuarioPorId($id);
if (!$dados) {
    echo "Usuário não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            padding: 50px;
        }

        .container {
            background-color: white;
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .voltar {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #2196F3;
            text-decoration: none;
            font-weight: bold;
        }

        .voltar:hover {
            color: #1976D2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Editar Usuário</h2>

    <form action="../../public/index.php?rota=usuario" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($dados['id']) ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($dados['email']) ?>" required>

        <label>RG:</label>
        <input type="text" name="rg" value="<?= htmlspecialchars($dados['rg']) ?>" required>

        <label>CPF:</label>
        <input type="text" name="cpf" value="<?= htmlspecialchars($dados['cpf']) ?>" required>

        <button type="submit" name="editar">Salvar Alterações</button>
    </form>

    <a href="lista.php" class="voltar">← Voltar à Lista</a>
</div>

</body>
</html>
