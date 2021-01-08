<?php

	$servidor = "localhost";
	$usuario  = "root" ; 
	$senha	  = "";
	
	$con = mysqli_connect($servidor, $usuario, $senha) ;

	$banco = "dinocoforcars";
	
	mysqli_select_db($con, $banco) or 
		die("Erro na seleção do banco dinocoforcars :<br>" . 
			mysqli_error($con) );
	
	$comandoSQL = "SELECT * FROM seguros";	
	
	$registros = mysqli_query($con, $comandoSQL) or 
		die("Erro na seleção de seguros: <br>" . 
			mysqli_error($con) );

	
	$linhas = mysqli_num_rows($registros);
	
	if($linhas==0)
	{
		die("Cadastro de seguro está vazio - Programa interrompido!");
	}
	echo "Encontrados $linhas seguro <hr>";
	
	$contador=0;
	
	while ($contador <$linhas)
	{
		// Criando a matriz $dados
		$dados = mysqli_fetch_array($registros);
		
		echo "id: " 					. $dados["id"] 						. "<br>";
		echo "Nome: " 					. $dados["nome"]					. "<br>";
		echo "Email:" 					. $dados["email"]					. "<br>";
		echo "Senha:" 					. $dados["senha"]					. "<br>";
		echo "CNH: "					. $dados["CNH"]						. "<br>";
		echo "Telefone: "				. $dados["telefone"]				. "<br>";
		echo "CPF:"						. $dados["CPF"]						. "<br>";
		echo "Modelo do carro:"			. $dados["modeloDoCarro"]			. "<hr>";
		echo "Ano:"						. $dados["ano"]						. "<hr>";
		echo "Placa do carro:"			. $dados["placaDoCarro"]			. "<hr>";
		echo "Valor:"					. $dados["valor"]					. "<hr>";
		echo "Data de entrada:"			. $dados["dataDeEntrada"]			. "<hr>";
		echo "Tipo de cobertura:"		. $dados["tipoDeCobertura"]			. "<hr>";
		echo "Duracao do seguro:"		. $dados["duracaoDoSeguro"]			. "<hr>";
		echo "Apólice:"					. $dados["apolice"]					. "<hr>";
		echo "Observações:"				. $dados["obs"]						. "<hr>";
		
	   $contador++;
	}
?>