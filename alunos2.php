<?php
	//gerar cabeçalho JSON com UTF-*
	header('Content-type: application/json;charset=utf-8');
	//incluir o arquivo de conexão com o banco
	include "conecta.php";

	//selecionar os dados do banco
	$sql = "select * from aluno order by nome";
	$consulta = $con->prepare($sql);
	$consulta->execute();
	
	//adicionar os dados em um array
	while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
		$json[] = $dados;
	}

	//converter os dados em json com json_encodee mostrar os dados na tela
	echo json_encode($json);
	