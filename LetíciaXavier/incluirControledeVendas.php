<html>
	<head>
		<title>Gravando o Cadastro da Venda</title>
		<style>
			body {background-color:#F0C89B;}
		</style>
	</head>
	<body>
<?php
	echo "<h2>Gravando a venda!!!</h2>";
	
	//recebendo os dados da variável
	$dataDaVenda		= $_POST["dataDaVenda"];
	$modelo				= $_POST["modelo"];
	$marca 				= $_POST["marca"];
	$anoDeFabricacao	= (int)$_POST["anoDeFabricacao"];
	$cor				= $_POST["cor"];
	$placaDoCarro		= $_POST["placaDoCarro"];
	$nomeCliente		= $_POST["nomeCliente"];
	$vendedor			= $_POST["vendedor"];
	$valor				= (float)$_POST["valor"];
	$comissao			= (float)$_POST["comissao"];
	$desconto			= (float)$_POST["desconto"];
	$obs				=$_POST["obs"];	
	
	// Verificar se o nome do cliente tem ao menos 3 letras
	if ( strlen($nomeCliente) < 10 )
	{
	  die("Nome do cliente deve ter ao menos 10 caracteres.");
	}
	
	// nome do vendedor não pode ficar vazio
	if ($vendedor == "")
	{
		die("Nome do vendedor deve ser informado.");
	}
	
	//aparecer na tela os valores digitados
	
	echo "Data da venda: <b>$dataDaVenda</b> <br>";
	echo "Modelo: <b>$modelo</b> <br>";
	echo "Marca: <b>$marca</b> <br>";
	echo "Ano de Fabricação: <b>$anoDeFabricacao</b> <br>";
	echo "Cor: <b>$cor</b> <br>";
	echo "Placa do Carro: <b>$placaDoCarro</b><br>";
	echo "Nome: <b>$nomeCliente</b> <br>";
	echo "Vendedor: <b>$vendedor</b> <br>";
	echo "Valor: <b>$valor</b> <br>";
	echo "Comissão: <b>$comissao</b> <br>";
	echo "Desconto: <b>$desconto</b> <br>";
	echo "Observação: <b>$obs</b> <br>";
	echo "</b><hr>";
	
	// Enviar os dados para o MYSQL / Gravar o novo time
	// Conectar o PHP no MYSQL
	$servidor 	= "localhost";
	$usuario	= "root";
	$senha		= "";
	$banco		= "DinocoForCars";
	
	$conect = mysqli_connect($servidor, $usuario, $senha);
	
	//  Abrir o banco de dados: 
	mysqli_select_db($conect, $banco) 
		or die("Erro na abertura / seleção do banco:" 
			. mysqli_error($conect) );
	
	// Gravar o novo registro
	
	$sql = "INSERT INTO ControledeVendas 
	(dataDaVenda ,   modelo ,  marca ,   anoDeFabricacao,   cor	, placaDoCarro,  nomeCliente,   vendedor,  valor , comissao, desconto, obs) VALUES 
	('$dataDaVenda','$modelo','$marca ', '$anoDeFabricacao','$cor','$placaDoCarro','$nomeCliente','$vendedor', '$valor' , '$comissao', '$desconto', '$obs')";
	
	//echo $sql;
	
	//5.2 - ENVIAR O COMANDO PRO mysql GRAVAR O NOVO TIME
	mysqli_query($conect, $sql) or die ("Erro na inserção do time: " . mysqli_error($conect) );
	
	//6 - Se chegou até aqui é porque gravou
	echo "<hr>";
	echo "Venda cadastrada com sucesso! <br>";
?>
	</body>
</html>