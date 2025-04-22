<?php
class Usuario
{
        private $conn;
        private $table = 'usuarios';

        public $id;
        public $nome;
        public $rg;
        public $cpf;
        public $email;
        
        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function criar(){
            $query = "INSERT INTO " . $this->table . " SET nome = :nome, rg = :rg, cpf = :cpf, email = :email";

            $stmt = $this->conn->prepare($query);

            
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->rg=htmlspecialchars(strip_tags($this->rg));
            $this->cpf=htmlspecialchars(strip_tags($this->cpf));
            $this->email=htmlspecialchars(strip_tags($this->email));

            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':rg', $this->rg);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':email', $this->email);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function listar(){
            $query = "SELECT id, nome, rg, cpf, email FROM " . $this->table . " ORDER BY id DESC";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
        
        public function editar(){
            $query = "UPDATE " . $this->table . " SET nome = :nome, rg = :rg, cpf = :cpf, email = :email WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->rg=htmlspecialchars(strip_tags($this->rg));
            $this->cpf=htmlspecialchars(strip_tags($this->cpf));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->id=htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':rg', $this->rg);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }
        public function deletar(){
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $this->id=htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }
        public function buscarUsuarioPorId($id) {
            $query = "SELECT id, nome, rg, cpf, email FROM " . $this->table . " WHERE id = :id LIMIT 1";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $usuario;
          }

}