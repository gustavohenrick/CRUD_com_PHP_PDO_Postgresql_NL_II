<?php

include_once 'ConexaoDB.php';

$dados = '';
//Buscar na tabela tb_lucros os dados
$result_usuario = "SELECT id, nome, email FROM tb_usuarios ORDER BY id";
$resultado_usuario = $conn->prepare($result_usuario);
$resultado_usuario->execute();

if($resultado_usuario -> rowCount() >0 ){
        $dados = $resultado_usuario->fetchAll(PDO::FETCH_ASSOC);
}

?>

<a href="cadastro.php">CADASTRO DE USUÁRIOS</a> </br></br>

<table border="1" width ="100%">
        
        <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>AÇÕES</th>
        </tr>

        <?php foreach($dados as $tb_usuarios): ?>
                <tr>
                        <td><?php echo $tb_usuarios['id']; ?> </td>
                        <td><?php echo $tb_usuarios['nome']; ?> </td>
                        <td><?php echo $tb_usuarios['email']; ?> </td>
                        <td>
                           <a href="editar_usuario.php?id=<?=$tb_usuarios['id'];?>">[ Editar ]</a>                           
                           <a href="deletar_user_action.php?id=<?=$tb_usuarios['id'];?>" onclick="return confirm('Tem Certeza que Deseja excluir o usuário?')">[ Excluir ]</a>       
                        </td>
                        
                       
                </tr>
        <?php endforeach; ?>

</table>



