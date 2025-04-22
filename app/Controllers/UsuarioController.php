<?php

require_once __DIR__ . '/../Models/Usuario.php';

class UsuarioController{
  private $conn;
  private $usuario;

  public function __construct($db){
    $this->conn = $db;
    $this->usuario = new Usuario($this->conn);
  }

  public function criarUsuario($dados){
    $this->usuario->nome = $dados['nome'];
    $this->usuario->rg = $dados['rg'];
    $this->usuario->cpf = $dados['cpf'];
    $this->usuario->email = $dados['email'];

    if($this->usuario->criar()){
      return 'Usuario criado com sucesso!';
    } else {
      return 'Erro ao criar usuario!';
    }
  }

  public function listarUsuarios()
  {
      $stmt = $this->usuario->listar();

      $usuarios = [];
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $usuarios[] = $row;
      }

      return $usuarios;
  }

  public function deletarUsuario($id)
  {
      $this->usuario->id = $id;
      if ($this->usuario->deletar()) {
          return 'Usuario deletado com sucesso!';
      } else {
          return 'Erro ao deletar usuario!';
      }
  }
  public function editarUsuario($dados) {
    $this->usuario->id = $dados['id'];
    $this->usuario->nome = $dados['nome'];
    $this->usuario->rg = $dados['rg'];
    $this->usuario->cpf = $dados['cpf'];
    $this->usuario->email = $dados['email'];

    if ($this->usuario->editar()) {
        return 'Usuário editado com sucesso!';
    } else {
        return 'Erro ao editar usuário!';
    }
}
  
  public function buscarUsuarioPorId($id) {
    $this->usuario->id = $id;
    $stmt = $this->usuario->buscarPorId();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}