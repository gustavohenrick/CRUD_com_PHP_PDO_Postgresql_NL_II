<?php

include_once 'ConexaoDB.php';


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    //VERIFICANDO SE O EMIAL JÁ FOI CADASTRADO
    $resultado_usuario = $conn->prepare("SELECT email FROM tb_usuarios WHERE email = :email");
    $resultado_usuario->bindValue(':email', $email, PDO::PARAM_STR);
    $resultado_usuario->execute();

    if($resultado_usuario-> rowCount() === 0){

    // CASO E-MAIL NÃO FOI USANDO, REALIZAR O CADASTRO

    $result_usuario = "INSERT INTO tb_usuarios (nome, email) 
    VALUES (:name, :email) ";

    $resultado_usuario = $conn->prepare($result_usuario);
    

    $resultado_usuario->bindValue(':name', $name, PDO::PARAM_STR);
    $resultado_usuario->bindValue(':email', $email, PDO::PARAM_STR);
    $resultado_usuario->execute();

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




