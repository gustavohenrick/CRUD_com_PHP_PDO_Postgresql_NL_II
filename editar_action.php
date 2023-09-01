<?php

require 'ConexaoDB.php';
require 'dao/UsuarioDaoPostgres.php';

$usuarioDao = new UsuarioDaoPostgres($conn);

$id =  filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $name && $email) {

    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDao->update($usuario);

    header("Location: index.php");
    exit;

}  else {

    header("Location: editar_usuario.php?id=".$id);
    exit;

}



?>




