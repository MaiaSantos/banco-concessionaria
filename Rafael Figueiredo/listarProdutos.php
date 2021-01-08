<html>
	<head>
		<title>Listagem dados do console MYSQL</title>
		<style> 
			body {
				background-color: lightblue;
				}
			#quant{
				text-align: center;
			}
			#garan{
				text-align: center;
			}
		</style>
	</head>
	<body>
	<?php
		header("Content-Type:text/html; charset=latin1");
		// 1 - Conectar no MySQL
		// Usamos a função mysqli_connect()
		// - Servidor a ser conectado
		// - usuário MySQL
		// - senha deste usuário
		$servidor = "localhost";
		$usuario  = "root" ; // usuário principal MYSQL
		$senha	  = "";
		
		$conect = mysqli_connect($servidor, $usuario, $senha) ;

		// 2 - Selecionar/Abrir o Banco de Dados
		$banco = "dinocoforcars";
		
		mysqli_select_db($conect, $banco) or 
			die("Erro na seleção do banco dinocoforcars :<br>" . 
				mysqli_error($conect) );
				
		// 3 - Selecionando os dados do console e mostrando na tela
		// Colocando o comando de seleção na variável selecaoSQL
		$selecaoSQL = "SELECT * FROM produtos";
			
		//Colocando o conjunto de dados na variavel conjunto
		$conjunto = mysqli_query($conect, $selecaoSQL) or
			die("Erro na seleção de produtos: <br>" . 
				mysqli_error($conect) );
			
		//Contando as linhas de dentro do conjunto
		$linhas = mysqli_num_rows($conjunto);
			
		// Se não tiver conjunto (linhas = 0), interromper o programa
		if($linhas==0)
		{
			die("Cadastro de produtos está vazio - Programa interrompido!");
		}
		echo "<h3> Foi encontrado $linhas produtos </h3><hr>";
				
		// 4 - Se linhas > 0 listar conjuntos.
		
		// Repetir o número de linhas que tem dentro de $conjuntos 
		// mostrando os dados de cada linha
		$cont=0;
		
		echo "<table border='1'>";
		echo "		<tr bgcolor='carmesin'>";
		echo "			<th>ID</th>";
		echo "			<th>Nome</th>";
		echo "			<th>Marca</th>";
		echo "			<th>Fabricante</th>";
		echo "			<th>Entrada</th>";
		echo "			<th>Saida</th>";
		echo "			<th>Quantidade</th>";
		echo "			<th>Preço</th>";
		echo "			<th>Garantia</th>";
		echo "			<th>Obs</th>";
		echo "		</tr>";
		
		while($cont < $linhas){
				
			//Criando a matriz $dados
			$dados = mysqli_fetch_array($conjunto);
			//Abrindo uma nova linha na tabela
			
			if($cont % 2 ==0)
			{
				echo "<tr bgcolor='turquoise'";
			}
			else
			{
				echo "<tr bgcolor='gold'";
			}
			echo "<tr>";	
			
			echo "<td>"	.$dados["id"]			."</td>";
			echo "<td>"	.$dados["nome"]			."</td>";
			echo "<td>"	.$dados["marca"]		."</td>";
			echo "<td>"	.$dados["fabricante"]	."</td>";
			echo "<td>"	.$dados["entrada"]		."</td>";
			echo "<td>"	.$dados["saida"]		."</td>";
			echo "<td id='quant'>"	.$dados["qtde"]			."</td>";
			echo "<td>"	.$dados["preco"]		."</td>";
			echo "<td id='garan'>"	.$dados["garantia"]		."</td>";
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