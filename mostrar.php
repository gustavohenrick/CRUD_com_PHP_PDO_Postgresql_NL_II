<?php

include_once 'ConexaoDB.php';


$dados = '';
//Buscar na tabela tb_lucros os dados
$result_usuario = "SELECT id, mes, ano_2018, ano_2019 FROM tb_lucros ORDER BY id";
$resultado_usuario = $conn->prepare($result_usuario);
$resultado_usuario->execute();

while($row = $resultado_usuario->fetch(PDO::FETCH_ASSOC))
{
  $dados .= '<option value = '.$row['id'].'>'.$row['mes'].'</option>';
}


echo $dados; 


?>