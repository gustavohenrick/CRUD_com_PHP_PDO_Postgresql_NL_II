<?php

require 'ConexaoDB.php';
require 'dao/UsuarioDaoPostgres.php';

$usuarioDao = new UsuarioDaoPostgres($conn);


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');

if($name && $email) {

    if($usuarioDao->findByEmail($email) === false) {

        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);

        $usuarioDao->add( $novoUsuario );

        header("Location: index.php");
        exit;

    } else {
        header("Location: cadastro.php");
        exit;
    }
       
}  else {

    header("Location: cadastro.php");
    exit;

}

?>




