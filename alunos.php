<?php
	//gerar cabeçalho JSON com charset UTF-8
	header('Content-type: application/json;charset=utf-8');
	//incluir arquivo de conexão com banco de dados
	include "conecta.php";

	//selecionar os alunos ordenado pelo nome - alfabetica
	$sql = "select * from aluno order by nome";
	$consulta = $con->prepare($sql);
	$consulta->execute();

	//quantos resultados foram colhidos - nr de linhas de resultado
	$c = $consulta->rowCount();

	//iniciar variável $i com 1
	$i = 1;

	//inserir [ na tela o \n cria uma nova linha (newline)
	echo "[\n";
	while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
		//cria a primeira linha de resuntados - Ex.: {"nome":"Francisco","ra":"1234"}
		echo "{\"nome\":\"$dados->nome\",\"ra\":\"$dados->ra\"}";
		//verificar se o $i é menor que o nr de resultados, se for adiciona uma virgula e um newline
		if ($i < $c) echo ",\n";
		//soma mais um ao $i
		$i++;
	}
	//adiciona uma nova linha e finaliza com ] 
	echo "\n]";