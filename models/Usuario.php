<?php

// 1. Classe que irá trabalhar com os Objetos da classe USUARIO

class Usuario {

    private $id;
    private $nome;
    private $email;

// 2. Criando o GET e SET ou seja os parametros que irá capiturar e receber informações

    public function getId() {
        return $this->id;
    }
    
    public function setId($i){
        $this->id = trim($i);        
    }

    

    public function getNome() {
        return $this->nome;
    }

    public function setNome($n){
        $this->nome = ucwords(trim($n));
    }



    public function getEmail(){
        return $this->email;
    }

    public function setEmail($e){
        $this->email=strtolower(trim($e));
    }

}


//3. CRIANDO A INTERFACE Manipulação do Banco da dados / CRUD


interface UsuarioDAO {

    public function add(Usuario $u);
    public function findAll();
    public function findByEmail($email);
    public function findById($id);
    public function update(Usuario $u);
    public function delete($id);
}