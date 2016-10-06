<!DOCTYPE html>
<html>
<head>
	<title>Autocomplete com PHP, jQuery e JSON</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/easy-autocomplete.min.css">

	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.easy-autocomplete.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			//exemplo 01
			var options = {
				//arquivo com os dados em json
			    url: "alunos.json",
			    //valor - utilize o campo com o nome recuperado do json acima - no caso nome ou ra
			    getValue: "nome",
			    //modo de listagem, aqui ele irá procurar em toda a lista conforme o usuário for digitando
			    list: {
			        match: {
			            enabled: true
			        }
			    }
			};
			//aplicar o autocomplete no campo com o id exemplo1
			$("#exemplo1").easyAutocomplete(options);


			//exemplo 02
			var options = {
				//arquivo com os dados em json
			    url: "alunos.php",
			    //valor a ser listado - nome ou ra
			    getValue: function(element) {
			        return element.nome;
			    },
			    //modo de listagem
			    list: {
			    	//ao selecionar elemento adicionar uma função para pegar o valor do ra
			        onSelectItemEvent: function() {
			            var selectedItemValue = $("#nome").getSelectedItemData().ra;
			            //ao mudar a seleçao (change) atribuir ao id ra o valor do ra
			            $("#ra").val(selectedItemValue).trigger("change");
			        },

			        match: {
			            enabled: true
			        }
			    }
			};
			$("#nome").easyAutocomplete(options);

			//exemplo 03
			var options = {
				//arquivos com dados do json feito com json_encode
			    url: "alunos2.php",
			    //valor a ser recuperado
			    getValue: "nome",
			    //modo de listagem, buscar em toda lista
			    list: {
			        match: {
			            enabled: true
			        }
			    }
			};
			//aplicar ao id exemplo3
			$("#exemplo3").easyAutocomplete(options);
		});

		
	</script>
</head>
<body>
<div class="container">
	<h1>Autocomplete com jQuery, JSON, PHP e Mysql</h1>

	<p>Site oficial do Plugin: <a href="http://easyautocomplete.com/" title="EasyAutocomplete">http://easyautocomplete.com/</a></p>

	<h2>Exemplo 1</h2>

	<p>Este exemplo utiliza um arquivo JSON pronto, com os dados dos alunos</p>

	<input type="text" id="exemplo1" class="form-control" placeholder="Digite um nome">

	<h2>Exemplo 2</h2>

	<p>Este exemplo utiliza um arquivo JSON dinâmico com PHP e MySQL escrito de modo básico</p>

	<div class="row">
		<div class="col-md-2 col-sm-3">

			<input type="text" id="ra" class="form-control" readonly placeholder="RA">

		</div>
		<div class="col-md-10 col-sm-9">
			<input type="text" id="nome" class="form-control" placeholder="Digite um nome">
		</div>
	</div>

	<h2>Exemplo 3</h2>

	<p>Este exemplo utiliza um arquivo JSON dinâmico com PHP e MySQL escrito com json_encode</p>

	<input type="text" id="exemplo3" class="form-control" placeholder="Digite um nome">
</body>
</html>