<?php
	
	$nome				= $_POST["nome"];
	$email				= $_POST["email"];
	$senha				= $_POST["senha"];
	$CNH				= $_POST["CNH"];
	$telefone			= $_POST["telefone"];
	$CPF				= $_POST["CPF"];
	$CEP      			= $_POST["CEP"];
	$modeloDoCarro		= $_POST["modeloDoCarro"];
	$ano				= $_POST["ano"];
	$placaDoCarro		= $_POST["placaDoCarro"];
	$valor				= $_POST["valor"];
	$dataDeEntrada		= $_POST["dataDeEntrada"];
	$tipoDeCobertura	= $_POST["tipoDeCobertura"];
	$duracaoDoSeguro	= $_POST["duracaoDoSeguro"];
	$apolice			= $_POST["apolice"];
	$obs				= $_POST["obs"];
	
	echo "<h2> Seguros </h2>";
	echo "Nome: <b>$nome</b> <br>";
	echo "Email: $email <br>";
	echo "Senha: $senha <br>";
	echo "CNH: $CNH <br>";
	echo "Telefone: $telefone <br>" ;
	echo "CPF: $CPF <br>";			
	echo "CEP: $CEP <br>";
	echo "Modelo do carro: $modeloDoCarro <br>";
	echo "Ano: $ano <br>";
	echo "Placa do carro: $placaDoCarro <br>";
	echo "Valor: $valor <br>";
	echo "Data de entrada: $dataDeEntrada <br>";
	echo "Tipo de cobertura: $tipoDeCobertura <br>";
	echo "Duracao do seguro: $duracaoDoSeguro <br>";
	echo "Apólice: $apolice <br>";
	echo "Observações: $obs <br>";
	echo "<hr>";		
	
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "DinocoForCars";

	
$con = mysqli_connect($servidor, $usuario, $senha);

mysqli_select_db($con, $banco) 
	or die ("Erro na abertura / seleção do banco".mysqli_error($con));

$sql = "INSERT INTO seguros
	(nome, email, senha, CNH, telefone, CPF, CEP, modeloDoCarro, ano, placaDoCarro, valor, dataDeEntrada, tipoDeCobertura, 
		duracaoDoSeguro, apolice, obs) VALUES
	('$nome', '$email', '$senha', '$CNH', '$telefone', '$CPF', '$CEP', '$modeloDoCarro', '$ano', '$placaDoCarro',
		'$valor', '$dataDeEntrada', '$tipoDeCobertura', '$duracaoDoSeguro', '$apolice', '$obs')";

mysqli_query($con, $sql) or die ("Erro na inserção do seguro".mysqli_error($con));  
	
	
	echo "<hr>";
	echo "Seguro cadastrado com sucesso! <br>"; 
	

?>
	
<a href="seguro.html">Novo cadastro de seguro</a>