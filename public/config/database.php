<?php
class Database {
    private $host = 'dpg-d04ftnh5pdvs73cav2ag-a.ohio-postgres.render.com';
    private $db_name = 'sistemabd_wofk';
    private $username = 'sistemabd_wofk_user';
    private $password = 'zDHi47l99sOjzyQYAGodEmopylRWSBE8';
    public $conn;

    public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "pgsql:host={$this->host};port=5432;dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
            exit;
        }

        return $this->conn;
    }
}
