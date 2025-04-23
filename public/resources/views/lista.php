<?php
require_once __DIR__ . '/../../../config/Database.php';
require_once __DIR__ . '/../../../app/Controllers/UsuarioController.php';
require_once __DIR__ . '/../../../app/Models/Usuario.php';
?>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'excluido'): ?>
    <p style="color: green;">Usuário excluído com sucesso!</p>
<?php endif; ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 40px;
        }
        h2 {
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .voltar {
            margin-top: 30px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .voltar:hover {
            background-color: #45a049;
        }

        .btn {
            padding: 6px 12px;
            margin-left: 10px;
            margin-top: 10px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            display: inline-block;
        }

        .editar {
            background-color: #2196F3;
        }

        .editar:hover {
            background-color: #1976D2;
        }

        .excluir {
            background-color: #f44336;
        }

        .excluir:hover {
            background-color: #d32f2f;
        }

        .acoes {
            margin-top: 10px;
        }
        .search-form {
        margin-bottom: 20px;
    }

    .search-form input[type="text"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        width: 250px;
    }

    .search-form button {
        padding: 10px 20px;
        background-color: #4CAF50;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        margin-left: 10px;
        transition: background-color 0.3s ease;
    }

    .search-form button:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>

<?php
try {
    $db = new Database();
    $conn = $db->conectar();

    $usuario = new Usuario($conn);
    if (isset($_GET['busca']) && !empty($_GET['busca'])) {
        $busca = $_GET['busca'];
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nome LIKE :busca");
        $stmt->bindValue(':busca', "%$busca%");
        $stmt->execute();
    } else {
        $stmt = $usuario->listar();
    }

        echo "<h2>Lista de Usuários</h2>";
    ?>
        <form method="GET" action="" class="search-form">
            <input type="text" name="busca" placeholder="Buscar por nome..." value="<?= isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : '' ?>">
            <button type="submit">Buscar</button>
        </form>
        <br>
    <?php
        if ($stmt->rowCount() > 0) {
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = htmlspecialchars($row['id']);
            $cpf = htmlspecialchars($row['cpf']);
            echo "<li>
                    <strong>Nome:</strong> " . htmlspecialchars($row['nome']) . "<br>
                    <strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>
                    <strong>RG:</strong> " . htmlspecialchars($row['rg']) . "<br>
                    <strong>CPF:</strong> " . htmlspecialchars($row['cpf']) . "<br>

                    <div class='acoes'>
                        <a href='../../public/index.php?rota=usuario&excluir_id=$id' class='btn excluir' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?');\">Excluir</a>
                        <a href='../../resources/views/editar.php?id=$id' class='btn editar'>Editar</a>
                    </div>
                </li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhum usuário encontrado.</p>";
    }

} catch (PDOException $e) {
    error_log("Erro de PDO em lista.php: " . $e->getMessage());
    echo "<p style='color:red;'>Erro ao conectar ou consultar o banco de dados: " . $e->getMessage() . "</p>";
} catch (\Throwable $e) {
    error_log("Erro geral em lista.php: " . $e->getMessage() . " no arquivo " . $e->getFile() . " linha " . $e->getLine());
    echo "<p style='color:red;'>Ocorreu um erro inesperado: " . $e->getMessage() . " em " . $e->getFile() . " linha " . $e->getLine() . "</p>";
}
?>

<a href="../../public/index.php" class="voltar">← Voltar para página inicial</a>

</body>
</html>
