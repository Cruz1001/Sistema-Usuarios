<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../app/Controllers/UsuarioController.php';

$db = new Database();
$conn = $db->conectar();
$controller = new UsuarioController($conn);

#Lógica de criação de usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['editar'])) {
  $controller->criarUsuario($_POST);  
  header("Location: ../public/index.php?msg=criado");
  exit;
}

#Lógica de edição de usuarios
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    $controller->editarUsuario($_POST);
    header("Location: ../resources/views/lista.php?msg=editado");
    exit;
}

#Lógica de exclusão de usuarios
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['excluir_id'])) {
    $controller->deletarUsuario($_GET['excluir_id']);
    header("Location: ../resources/views/lista.php?msg=excluido");
    exit;
}