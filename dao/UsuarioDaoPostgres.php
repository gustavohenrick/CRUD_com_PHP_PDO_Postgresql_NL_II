<?php

// 4. CRIANDO O DAO 2º PARTE DA INTERFACE 
require_once 'models/Usuario.php';


class UsuarioDaoPostgres implements UsuarioDAO{

    private $conn;

    public function __construct(PDO $driver){
        $this->conn =  $driver;
    }

    public function add(Usuario $u){

        $conn = $this->conn->prepare("INSERT INTO tb_usuarios (nome, email) VALUES (:nome, :email)" );
        $conn->bindValue(':nome', $u->getNome());
        $conn->bindValue(':email', $u->getEmail());
        $conn->execute();

        $u->setId( $this->conn->lastInsertId() );
        return $u;
    }

    public function findAll() {
        $array = [];

        $conn =  $this->conn->query("SELECT * FROM tb_usuarios");
        if($conn->rowCount() > 0 ){
            $dados = $conn->fetchAll();

            foreach($dados as $item){
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        } 

        return $array;

    }

    public function findByEmail($email){
        $conn = $this->conn->prepare("SELECT * FROM tb_usuarios WHERE email = :email");
        $conn->bindValue(':email', $email);
        $conn->execute();

        if($conn->rowCount()> 0 ){
            $data = $conn->fetch();

            $u = new  Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);

            return $u;

        } else {
            return false;
        }
    }

    public function findById($id){
        $conn = $this->conn->prepare("SELECT * FROM tb_usuarios WHERE id = :id");
        $conn->bindValue(':id', $id);
        $conn->execute();

        if($conn->rowCount()> 0 ){
            $data = $conn->fetch();

            $u = new  Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);

            return $u;

        } else {
            return false;
        }
    }

    public function update(Usuario $u){

        $conn = $this->conn->prepare("UPDATE tb_usuarios SET nome = :nome, email = :email WHERE id = :id");
        $conn->bindValue(':nome', $u->getNome());
        $conn->bindValue(':email', $u->getEmail());
        $conn->bindValue(':id', $u->getId());
        $conn->execute();

        return true;
    }

    public function delete($id){

        $conn = $this->conn->prepare("DELETE FROM tb_usuarios WHERE id = :id");
        $conn->bindValue(':id', $id);
        $conn->execute();

    }

}