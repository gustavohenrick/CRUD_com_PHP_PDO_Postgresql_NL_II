<?php

require 'ConexaoDB.php';
require 'dao/UsuarioDaoPostgres.php';

$usuarioDao = new UsuarioDaoPostgres($conn);
$dados = $usuarioDao->findAll();

?>

<a href="cadastro.php">CADASTRO DE USUÁRIOS</a> </br></br>

<table border="1" width ="100%">
        
        <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>AÇÕES</th>
        </tr>

        <?php foreach($dados as $usuarios): ?>
                <tr>
                        <td><?=$usuarios->getId();?></td>
                        <td><?=$usuarios->getNome();?></td>
                        <td><?=$usuarios->getEmail();?></td>
                        <td>
                           <a href="editar_usuario.php?id=<?=$usuarios->getId();?>">[ Editar ]</a>                           
                           <a href="deletar_user_action.php?id=<?=$usuarios->getId();?>" onclick="return confirm('Tem Certeza que Deseja excluir o usuário?')">[ Excluir ]</a>       
                        </td>
                        
                       
                </tr>
        <?php endforeach; ?>

</table>



