<?php

require 'ConexaoDB.php';
require 'dao/UsuarioDaoPostgres.php';

$usuarioDao = new UsuarioDaoPostgres($conn);


$id = filter_input(INPUT_GET, 'id');

if($id) {

    $usuarioDao->delete($id);

}
header("Location: index.php");
exit;


?>

