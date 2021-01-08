<?php
// salvar como listarCarros.php na pasta ArthurOliveira
	header("Content-Type:text/html;charset=latin1"); // Escreve isso e converte pra ANSI e resolve o problema de acentua��o

	
	// 1 - Conectando no MySQL
	
	$servidor = "localhost";
	$usuario = "root"; // usu�rio principal MySQL
	$senha = "";
	
	$con = mysqli_connect($servidor, $usuario, $senha);
	
	// 2 - Selecionando e abrindo o Banco de Dados
	
	$banco = "DinocoForCars";
	
	mysqli_select_db($con, $banco) or 
		die("Erro na sele��o do banco:<br>".mysqli_error($con));
		
	// 3 - Colocar o comando de sele��o de dados
	// na vari�vel $comandoSQL
	
	$comandoSQL = "SELECT * FROM carros";
	
	//echo $comandoSQL;
	
	// 4 - Enviar o comandoSQL (vari�vel) para o MySQL
	
	$registro = mysqli_query($con, $comandoSQL) or
		die("Erro na sele��o dos times:<br>".mysqli_error($con));
	
	// Se chegou at� aqui � porque criou o objeto $registro
	
	// 5 - Verificar o n�mero de registros existentes
	// Fun��o mysqli_num_rows conta o n�mero de linhas / registros de dentro
	// de um objeto Record Set.
	
	$linhas = mysqli_num_rows($registro);
	
	// Se n�o tiver registros (linhas = 0), interromper o programa
	
	if($linhas < 1) {
		die("Cadastro de carros est� vazio - Programa interrompido!");
	}
	echo "Encontrados $linhas carros <hr>";
	
	// 6 - Se linhas maior que 0 listar registros
	
	// Repetir o n�mero de linhas que tem dentro de $registros
	// mostrando os dados de cada linha
	
	$contador = 0;
	
	
	
	echo "<table border='1'>";
	echo "<tr>";
	echo "		<th>ID</th>";
	echo "		<th>Fabricante</th>";
	echo "		<th>Modelo</th>";
	echo "		<th>Ano</th>";
	echo "		<th>UF</th>";
	echo "		<th>Cor</th>";
	echo "		<th>Portas</th>";
	echo "		<th>Autom�tico</th>";
	echo "		<th>Motor</th>";
	echo "		<th>Garantia</th>";
	echo "		<th>Tipo</th>";
	echo "		<th>kmRodados</th>";
	echo "		<th>Novo</th>";
	echo "		<th>Pre�o</th>";
	echo "		<th>Estoque</th>";
	echo "		<th>Obs</th>";
	echo"</tr>";
	
	while ($contador < $linhas)
	{
		// Criando a matriz $dados
		$dados = mysqli_fetch_array($registro);
		
		// abrindo uma nova linha
		echo "<tr>";
		
		echo "<td> " . $dados["id"] . "</td>";
		echo "<td> " . $dados["fabricante"] . "</td>";
		echo "<td> " 	. $dados["modelo"]		. "</td>";
		echo "<td> " . $dados["ano"]	. "</td>";
		echo "<td> "		. $dados["UF"]			. "</td>";
		echo "<td> ". $dados["cor"]		. "</td>";
		echo "<td> "	. $dados["portas"]		. "</td>";
		echo "<td> "		. $dados["automatico"]			. "</td>";
		echo "<td> "	. $dados["motor"]		. "</td>";
		echo "<td> "	. $dados["garantia"]		. "</td>";
		echo "<td> "	. $dados["tipo"]		. "</td>";
		echo "<td> "	. $dados["kmRodados"]		. "</td>";
		echo "<td> "	. $dados["novo"]		. "</td>";
		echo "<td> "	. $dados["preco"]		. "</td>";
		echo "<td> "	. $dados["estoque"]		. "</td>";
		echo "<td> "	. $dados["obs"]		. "</td>";
		
		echo "</tr>"; // fechando a linha
		
		$contador ++;
	}
	echo "</table>";
?>

<hr>
Listagem finalizada.