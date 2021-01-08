<html>
	<head>
		<title>Grava��o de dados do produto</title>
		<style>
			body {background-color: lightgreen;}
		</style>
	</head>
	<body>
	<?php
	
		//1� Aqui est� sendo recebido os dados vindo do formul�rio
		$nome 	  		= $_POST["nome"];
		$marca 	  		= $_POST["marca"];
		$fabricante		= $_POST["fabricante"];
		$entrada		= $_POST["entrada"];
		$saida			= $_POST["saida"];
		$qtdeI			= $_POST["qtde"];
		$precoF			= $_POST["preco"];
		$garantia	  	= $_POST["garantia"];
		$obs  			= $_POST["obs"];
		
		//1.2 Convertendo vari�veis para int e float
		$qtde = (int) $qtdeI;
		$preco = (float) $precoF;
		//2� Aqui est� sendo feito a valida��o dos dandos
		if($qtde < 1)
		{
			die("A quantidade de acess�rio deve ser informado corretamente!");
		}
		if($preco < 1)
		{
			die("O pre�o do produto deve ser v�lido");
		}
		
		//3� Exibindo os dados vindo do formul�rio
		echo "<h2>Grava��o de dados do produto</h2>";
		echo "Nome do produto: <b>$nome</b> <br>";
		echo "Marca: <b>$marca</b> <br>";
		echo "Fabricante: <b>$fabricante</b> <br>";
		echo "Entrada do produto no estoque: <b>$entrada</b> <br>";
		echo "Sa�da do produto do estoque: <b>$saida</b> <br>";
		echo "Quantidade: <b>$qtde</b> <br>";
		echo "Pre�o do produto: <b>$preco</b> <br>";
		echo "Garantia: <b>$garantia</b> <br>";
		echo "Observa��o sobre o produto: <b>$obs</b> <br>";
		echo "</b><hr>";
		
		$servidor 	= "localhost";
		$usuario	= "root";
		$senha		= "";
		$banco		= "dinocoforcars";
	
		$conect = mysqli_connect($servidor, $usuario, $senha);
	
		// 4.2 - Abrir o banco de dados: dinocoforcars
		mysqli_select_db($conect, $banco) 
			or die("Erro na abertura / sele��o do banco:" 
				. mysqli_error($conect) );
		
		//5� Tentativa de inser��o de dados
		$sql =
		"INSERT INTO produtos
		(nome,	marca,	fabricante,	entrada, 	saida,		qtde,	preco,	garantia,	obs) VALUES
		('$nome','$marca','$fabricante','$entrada','$saida','$qtde','$preco','$garantia','$obs')";
		
		// Envia o comando de inser��o que est� na vari�vel para o MYSQL gravar
		mysqli_query($conect, $sql) or
			die("Erro na inser��o do produto: " . mysqli_error($conect));
			
		// Cadastro feito com sucesso
		echo "<hr>Produto <b>$nome</b> cadastrado com sucesso!!";
	?>
	</body>
</html>