<?php

include_once 'ConexaoDB.php';

$id =  filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $name && $email) {

    $resultado_usuario = $conn->prepare("UPDATE tb_usuarios SET nome = :name, email = :email WHERE id = :id ");
    $resultado_usuario->bindValue(':id', $id,  PDO::PARAM_INT);
    $resultado_usuario->bindValue(':name', $name, PDO::PARAM_STR);
    $resultado_usuario->bindValue(':email', $email, PDO::PARAM_STR);
    $resultado_usuario->execute();

    header("Location: index.php");
    exit;

}  else {

    header("Location: editar_usuario.php");
    exit;

}



?>




