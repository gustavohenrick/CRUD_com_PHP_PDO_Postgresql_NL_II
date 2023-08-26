<?php

	$servidor = "localhost";
	$porta = 5432;
	$usuario = "postgres";
	$senha = "Drive@3252";
	$dbname = "cold_case";
	
	//Criar a conexao
	 try{
			$conn = new PDO("pgsql:host=$servidor;port=$porta;dbname=$dbname;user=$usuario;password=$senha;options='--client_encoding=UTF8'");
			
		}catch(PDOException $pe){
        echo $pe->getMessage();
    	}   
		
?>