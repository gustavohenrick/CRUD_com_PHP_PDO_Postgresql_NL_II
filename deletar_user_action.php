<?php

include_once 'ConexaoDB.php';


$id = filter_input(INPUT_GET, 'id');

if($id) {

    $resultado_usuario = $conn->prepare("DELETE FROM tb_usuarios WHERE id = :id ");
    $resultado_usuario->bindValue(':id', $id);
    $resultado_usuario->execute();

    
}
header("Location: index.php");
exit;


?>

