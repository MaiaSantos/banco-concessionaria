<?php

// Recebendo dados


$fabricante = $_POST["fabricante"];
$modelo = $_POST["modelo"];
$ano = $_POST["ano"];
$UF = $_POST["UF"];
$cor = $_POST["cor"];
$portas = $_POST["portas"];
$motor = $_POST["motor"];
$tipo = $_POST["tipo"];
$kmRodados = $_POST["kmRodados"];
$preco = (float)$_POST["preco"];
$estoque = $_POST["estoque"];
$obs = $_POST["obs"];

// Tratamento especial CHECKBOX

$automatico = 0; // Significa que o carro não é automático

if(isset($_POST["automatico"]))
	{
		$automatico = $_POST["automatico"];
	}
	
$novo = 0; // Significa que o carro é SEMI-NOVO

if(isset($_POST["novo"]))
	{
		$novo = $_POST["novo"];
	}
	
$garantia = 0; // Significa que o carro não tem garantia

if(isset($_POST["garantia"]))
	{
		$garantia = $_POST["garantia"];
	}

// Validação de alguns campos

if(($novo == 1) && ($kmRodados > 0)) {
	die ("O carro é <b>NOVO</b>, portanto não pode ter mais que 0KM rodados.");
}

else if (($novo == 0) && ($kmRodados == 0)) {
	die ("O carro é <b>SEMI-NOVO</b>, deve ser informado quantos KM rodados ele possuí.");
}

// Apresentando os dados recebidos

echo "<h1>Novo cadastro criado</h1> <br>";
echo "Fabricante: <b>$fabricante</b> <br>";
echo "Modelo do Carro: $modelo <br>";
echo "Ano: $ano <br>";
echo "UF: <b>$UF</b> <br>";
echo "Cor: $cor <br>";
echo "Número de portas: $portas <br>";
echo "Motor: $motor <br>";

if ($tipo == "") {
	echo "Tipo do carro: <b>Não foi informado</b> <br>";
}
else {
	echo "Tipo do carro: $tipo <br>";
}


echo "KM Rodados: $kmRodados <br>";
echo "Preço: R$$preco <br>";
echo "QTD no estoque: $estoque <br>";

// Verificação do campo Observações
if ($obs == ""){
	echo "Observações: <b>NÃO</b> foi constatada nenhuma informação. <br>";
}

else {
	echo "Observações: $obs <br>";
}

echo "<hr>";

echo "<h3>Informações adicionais</h3>";

// Verificação do campo automático
if($automatico == 1) {
	echo "Carro <b>É</b> automático <br>";
}

else {
	echo "Carro <b>NÃO</b> é automático <br>";
}

// Verificação para ver se o carro é novo ou não
if($novo == 1) {
	echo "Carro é <b>NOVO</b> <br>";
}

else {
	echo "Carro é <b>SEMI-NOVO</b> <br>";
}

// Verificação da garantia
if ($garantia == 1) {
	echo "Carro <b>POSSUÍ</b> garantia<br>";
}

else {
	echo "Carro <b>NÃO</b> possuí garantia <br>";
}

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "DinocoForCars";
	
$con = mysqli_connect($servidor, $usuario, $senha);

mysqli_select_db($con, $banco) 
	or die ("Erro na abertura / seleção do banco".mysqli_error($con));
	
	
$sql = "INSERT INTO carros
	(fabricante, modelo, ano, UF, cor, portas, automatico, motor, garantia, tipo, kmRodados, novo, preco,
		estoque, obs) VALUES 
	('$fabricante', '$modelo', '$ano', '$UF', '$cor', '$portas', '$automatico', '$motor', '$garantia', '$tipo',
		'$kmRodados', '$novo', '$preco', '$estoque', '$obs')";

mysqli_query($con, $sql) or die ("Erro na inserção do carro".mysqli_error($con));
	
	// 6 - Se chegou até aqui é porque gravou
	echo "<hr>";
	echo "Carro cadastrado com sucesso! <br>";
	
?>

<a href="formCarros.html">Novo cadastro de carro</a>