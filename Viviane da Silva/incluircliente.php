<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Dinoco For Cars</title>
</head>

<body>
    <?php

    //1º Aqui está sendo recebido os dados vindo do formulário
    $nome           = $_POST["nome"];
    $dataNascimento = $_POST["dataNascimento"];
    $cpf            = $_POST["cpf"];
    $rg             = $_POST["rg"];
    $sexo           = $_POST["sexo"];
    $email          = $_POST["email"];
    $telefone       = $_POST["telefone"];
    $celular        = $_POST["celular"];
    $pais           = $_POST["pais"];
    $estado         = $_POST["estado"];
    $cidade         = $_POST["cidade"];
    $bairro         = $_POST["bairro"];
    $cep            = $_POST["cep"];
    $rua            = $_POST["rua"];
    $numero         = $_POST["numero"];
    $complemento    = $_POST["complemento"];
    $referencia     = $_POST["referencia"];

    //2º Aqui é a validação dos dandos

    if ($nome == "") {
        die("O nome do cliente deve ser informado!");
    }
    if (($dataNascimento < "1949/01/01") or ($dataNascimento > "2100/12/31")) {
        die(" A data de nascimento do cliente deve ser informado!");
    }
    if ($cpf == "") {
        die("o CPF deve ser informado!");
    }
    if ($rg == "") {
        die("O RG deve ser informado!");
    }
    if ($sexo == "") {
        die("O sexo deve ser informado!");
    }
    if ($telefone == "") {
        die("O telefone deve ser informado!");
    }
    if ($celular == "") {
        die("O celular deve ser informado!");
    }
    if ($pais == "") {
        die("O país deve ser informado!");
    }
    if ($estado == "") {
        die("O estado deve ser informado!");
    }
    if ($cidade == "") {
        die("A cidade deve ser informada!");
    }
    if ($bairro == "") {
        die("O bairro deve ser informado!");
    }
    if ($cep == "") {
        die("O CEP deve ser informado!");
    }
    if ($rua == "") {
        die("A rua deve ser informada!");
    }
    if ($numero == "") {
        die("O número da residência deve ser informado!");
    }

    //3º Exibindo os dados vindo do formulário
    echo "<h2>Dados do Cliente recebido</h2>";
    echo "Nome do Cliente: <b>$nome</b> <br>";
    echo " Data de nascimento: <b>$dataNascimento</b> <br>";
    echo "CPF do Cliente: <b>$cpf</b> <br>";
    echo "RG do Cliente: <b>$rg</b> <br>";
    echo "Sexo: <b>$sexo</b> <br>";
    echo "Email: <b>$email</b> <br>";
    echo "Telefone: <b>$telefone</b> <br>";
    echo "Celular: <b>$celular</b> <br>";
    echo "País: <b>$pais</b> <br>";
    echo "Estado: <b>$estado</b> <br>";
    echo "Cidade: <b>$cidade</b> <br>";
    echo "Bairro: <b>$bairro</b> <br>";
    echo "Rua: <b>$rua</b> <br>";
    echo "Número: <b>$numero</> <br>";
    echo "Complemento: <b>$complemento</b> <br>";
    echo "Ponto de Referência: <b>$referencia</b> <br>";

    //4 conctando a página Php
    $con = mysqli_connect("localhost", "root", "");

    //4.1 abrir banco de dados dinocoforcar;
    mysqli_select_db($con, "dinocoforcar") or
        die("Erro na abertura do banco:" . mysqli_error($con));

    //5 tentativa de inserção de registros;

    $sql = "INSERT INTO  clientes (nome, dataNascimento, cpf, rg, sexo, email, telefone, celular, pais,
  estado, cidade, bairro,  cep, rua, numero, complemento, referencia ) VALUES ('$nome', '$dataNascimento', '$cpf', '$rg', 
  '$sexo', '$email', '$telefone', '$celular', '$pais', '$estado', '$cidade', '$bairro', '$cep', '$rua', '$numero', '$complemento',
  '$referencia')";

    mysqli_query($con, $sql) or die("Erro na inserção do cliente" . mysqli_error($con));

    echo "cliente <b>$nome</b> cadastrado com sucesso"



    ?>



</body>

</html>