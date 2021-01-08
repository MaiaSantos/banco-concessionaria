<html>
	<head>
		<title>Listagem dados do console MYSQL</title>
		<style> 
			body {
				background-color:#EED6D8;
				}
			#numPedido{
				text-align: center;
			}
			#AnodeFabricacao{
				text-align: center;
			}
		</style>
	</head>
	<body>
	<?php
		header("Content-Type:text/html; charset=latin1");
		// 1 - Conectar no MySQL
		// Usamos a fun��o mysqli_connect()
		// - Servidor a ser conectado
		// - usu�rio MySQL
		// - senha deste usu�rio
		$servidor = "localhost";
		$usuario  = "root" ; // usu�rio principal MYSQL
		$senha	  = "";
		
		$conect = mysqli_connect($servidor, $usuario, $senha) ;

		// 2 - Selecionar/Abrir o Banco de Dados
		$banco = "dinocoforcars";
		
		mysqli_select_db($conect, $banco) or 
			die("Erro na sele��o do banco dinocoforcars :<br>" . 
				mysqli_error($conect) );
				
		// 3 - Selecionando os dados do console e mostrando na tela
		// Colocando o comando de sele��o na vari�vel selecaoSQL
		$seleSQL = "SELECT * FROM ControledeVendas";
			
		//Colocando o conjunto de dados na variavel conjunto
		$conju = mysqli_query($conect, $seleSQL) or
			die("Erro na sele��o de vendas: <br>" . 
				mysqli_error($conect) );
			
		//Contando as linhas de dentro do conjunto
		$linhas = mysqli_num_rows($conju);
			
		// Se n�o tiver conjunto (linhas = 0), interromper o programa
		if($linhas==0)
		{
			die("Cadastro de vendas est� vazio - Programa interrompido!");
		}
		echo "<h3> Foi encontrado $linhas vendas </h3><hr>";
				
		// 4 - Se linhas > 0 listar conjuntos.
		
		// Repetir o n�mero de linhas que tem dentro de $conju
		// mostrando os dados de cada linha
		$cont=0;
		
		echo "<table border='1'>";
		echo "		<tr bgcolor='#D9ABB7'>";
		echo "			<th>N�m. do pedido</th>";
		echo "			<th>Data da venda</th>";
		echo "			<th>Modelo</th>";
		echo "			<th>Marca</th>";
		echo "			<th>Ano de Fabrica��o</th>";
		echo "			<th>Cor</th>";
		echo "			<th>Placa do Carro</th>";
		echo "			<th>Cliente</th>";
		echo "			<th>Vendedor</th>";
		echo "			<th>Valor</th>";
		echo "			<th>Comis�o</th>";
		echo "			<th>Desconto</th>";
		echo "			<th>Obs</th>";
		echo "		</tr>";
		
		while($cont < $linhas){
				
			//Criando a matriz $dados
			$dados = mysqli_fetch_array($conju);
			//Abrindo uma nova linha na tabela
			
			if($cont % 2 ==0)
			{
				echo "<tr bgcolor='#FACFC9'";
			}
			else
			{
				echo "<tr bgcolor='#F2ACBF'";
			}
			echo "<tr>";	
			
			echo "<td id='numPedido'>"	.$dados["numPedido"]			."</td>";
			echo "<td>"	.$dados["dataDaVenda"]			."</td>";
			echo "<td>"	.$dados["modelo"]			."</td>";
			echo "<td>"	.$dados["marca"]		."</td>";
			echo "<td id='anoDeFabricacao'>"	.$dados["anoDeFabricacao"]	."</td>";
			echo "<td>"	.$dados["cor"]		."</td>";
			echo "<td>"	.$dados["placaDoCarro"]		."</td>";
			echo "<td>"	.$dados["nomeCliente"]			."</td>";
			echo "<td>"	.$dados["vendedor"]		."</td>";
			echo "<td>"	.$dados["valor"]		."</td>";
			echo "<td>"	.$dados["comissao"]		."</td>";
			echo "<td>"	.$dados["desconto"]		."</td>";
			echo "<td>"	.$dados["obs"]			."</td>";
			
			echo "</tr>"; //Fechando a linha da tabela
			
			$cont++;
				
		}
		echo "</table>";
	?>
	
	<hr>
	<h3>Listagem Finalizada.</h3>
	</body>
</html>