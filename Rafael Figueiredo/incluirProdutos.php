<html>
	<head>
		<title>Gravação de dados do produto</title>
		<style>
			body {background-color: lightgreen;}
		</style>
	</head>
	<body>
	<?php
	
		//1º Aqui está sendo recebido os dados vindo do formulário
		$nome 	  		= $_POST["nome"];
		$marca 	  		= $_POST["marca"];
		$fabricante		= $_POST["fabricante"];
		$entrada		= $_POST["entrada"];
		$saida			= $_POST["saida"];
		$qtdeI			= $_POST["qtde"];
		$precoF			= $_POST["preco"];
		$garantia	  	= $_POST["garantia"];
		$obs  			= $_POST["obs"];
		
		//1.2 Convertendo variáveis para int e float
		$qtde = (int) $qtdeI;
		$preco = (float) $precoF;
		//2º Aqui está sendo feito a validação dos dandos
		if($qtde < 1)
		{
			die("A quantidade de acessório deve ser informado corretamente!");
		}
		if($preco < 1)
		{
			die("O preço do produto deve ser válido");
		}
		
		//3º Exibindo os dados vindo do formulário
		echo "<h2>Gravação de dados do produto</h2>";
		echo "Nome do produto: <b>$nome</b> <br>";
		echo "Marca: <b>$marca</b> <br>";
		echo "Fabricante: <b>$fabricante</b> <br>";
		echo "Entrada do produto no estoque: <b>$entrada</b> <br>";
		echo "Saída do produto do estoque: <b>$saida</b> <br>";
		echo "Quantidade: <b>$qtde</b> <br>";
		echo "Preço do produto: <b>$preco</b> <br>";
		echo "Garantia: <b>$garantia</b> <br>";
		echo "Observação sobre o produto: <b>$obs</b> <br>";
		echo "</b><hr>";
		
		$servidor 	= "localhost";
		$usuario	= "root";
		$senha		= "";
		$banco		= "dinocoforcars";
	
		$conect = mysqli_connect($servidor, $usuario, $senha);
	
		// 4.2 - Abrir o banco de dados: dinocoforcars
		mysqli_select_db($conect, $banco) 
			or die("Erro na abertura / seleção do banco:" 
				. mysqli_error($conect) );
		
		//5º Tentativa de inserção de dados
		$sql =
		"INSERT INTO produtos
		(nome,	marca,	fabricante,	entrada, 	saida,		qtde,	preco,	garantia,	obs) VALUES
		('$nome','$marca','$fabricante','$entrada','$saida','$qtde','$preco','$garantia','$obs')";
		
		// Envia o comando de inserção que está na variável para o MYSQL gravar
		mysqli_query($conect, $sql) or
			die("Erro na inserção do produto: " . mysqli_error($conect));
			
		// Cadastro feito com sucesso
		echo "<hr>Produto <b>$nome</b> cadastrado com sucesso!!";
	?>
	</body>
</html>