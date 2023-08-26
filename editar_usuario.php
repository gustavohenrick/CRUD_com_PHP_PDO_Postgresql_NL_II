<?php

include_once 'ConexaoDB.php';

$info ='';

$id = filter_input(INPUT_GET, 'id');

if($id) {

    $resultado_usuario = $conn->prepare("SELECT * FROM tb_usuarios WHERE id = :id");
    $resultado_usuario->bindValue(':id', $id,  PDO::PARAM_INT);
    $resultado_usuario->execute();

    if($resultado_usuario->rowCount() > 0 ){

        $info = $resultado_usuario->fetch( PDO::FETCH_ASSOC );

    } else {
        header("Location: index.php");
        exit;  
    }

} else {
    header("Location: cadastro.php");
    exit;
}

?>

<h1>EDITAR USUÁRIOS</h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$info['id'];?>" />
 
    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$info['nome'];?>" />
    </label><br/><br/>

    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?=$info['email'];?>" />
    </label><br/><br/>

    <input type="submit" value="Salvar" />

</form>
