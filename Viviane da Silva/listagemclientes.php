<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Listagem dados do Cliente</title>
    <style>
        body {
            font-size: 14px;
            background-color: rgb(192, 192, 189);

        }

        h1 {
            background-color: rgba(252, 252, 252, 0.404);
            text-align: center;
            border-radius: 3px;
            color: rgb(65, 64, 64);
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        #tb {
            border-radius: 8px;
            box-shadow: 0 0 5px 0 rgba(168, 168, 168, 0.5);

        }

        .tabela1 {
            background-color: rgb(253, 238, 32);
            border-radius: 3px;
        }

        .tabela2 {
            background-color: rgb(248, 246, 145);
            padding: 3px;
        }
    </style>
</head>

<body>
    <?php
    header("Content-Type:text/html; charset='latin1'");
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";

    $con = mysqli_connect($servidor, $usuario, $senha);

    //2 selecionar bancos de bados 

    $banco = "dinocoforcar";

    mysqli_select_db($con, "$banco") or
        die("Erro na seleção de bancos de dados" . mysqli_error($con));

    //3 colocar comando de seleção de dados 

    $comandoSQL = " select * from clientes;";

    // imprimir a variavel na tela 
    // copiar o que aparece no conmsole do MYSQL
    // Para ver se está funcionando corretamente

    //echo $comandoSQL; mostra se deu certo 
    //4
    $registros = mysqli_query($con, $comandoSQL) or
        die("Erro na seleção de clientes: <br>" .
            mysqli_error($con));

    //5 verificar o número de registros existentes
    $linhas = mysqli_num_rows($registros);
    echo "<h1> Listagem de clientes</h1>";
    // se não ter registros (linhas=0) , interromper o programa

    if ($linhas < 1) {
        die("Cadastro de times está vazio! - Programa Interropido");
    }
    echo "Encontrado $linhas clientes <hr>";

    // 6 repetir o numero de linhas que tem 
    // mostrar os dados de cada linha 
    $contador = 0;

    echo "<table id='tb'>";
    echo "  <tr>";
    echo "      <th class='tabela1'>Id</th>";
    echo "      <th class='tabela1'>Nome</th>";
    echo "      <th class='tabela1'>Data de Nascimento</th>";
    echo "      <th class='tabela1'>CPF</th>";
    echo "      <th class='tabela1'>RG</th>";
    echo "      <th class='tabela1'>Sexo</th>";
    echo "      <th class='tabela1'>Email</th>";
    echo "      <th class='tabela1'>Telefone</th>";
    echo "      <th class='tabela1'>Celular</th>";
    echo "      <th class='tabela1'>Pais</th>";
    echo "      <th class='tabela1'>Estado</th>";
    echo "      <th class='tabela1'>Cidade</th>";
    echo "      <th class='tabela1'>Bairro</th>";
    echo "      <th class='tabela1'>CEP</th>";
    echo "      <th class='tabela1'>Rua</th>";
    echo "      <th class='tabela1'>Numero</th>";
    echo "      <th class='tabela1'>Complemento</th>";
    echo "      <th class='tabela1'>Referencia</th>";

    echo "  </tr>";
    while ($contador < $linhas) {

        // Criando a matriz $dados
        $dados = mysqli_fetch_array($registros);
        //abrindo uma nova linha da tabela
        echo "<tr>";

        echo "<td class='tabela2'> " . $dados["id"] . "</td>";
        echo "<td class='tabela2'> " . $dados["nome"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["dataNascimento"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["cpf"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["rg"]  . "</td>";
        echo "<td class='tabela2'>" . $dados["sexo"]  . "</td>";
        echo "<td class='tabela2'>" . $dados["email"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["telefone"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["celular"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["pais"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["estado"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["cidade"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["bairro"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["cep"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["rua"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["numero"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["complemento"]  . "</td>";
        echo "<td class='tabela2'> " . $dados["referencia"]  . "</td>";

        echo "</tr>"; //fechado a linha da tabela

        $contador++;
    }

    echo "</table>";

    ?>
    <hr>
    <footer> Registro Finalizado</footer>
</body>

</html>