<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../styles/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../styles/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../styles/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../styles/assets/favicon/site.webmanifest">
    <title>Cadastro de clientes</title>
</head>

<body>
    <?php

    require_once '../dao/DaoFuncionario.php';
    require_once '../models/Funcionario.php';
    require_once '../dao/Conexao.php';

    $nome = filter_input(INPUT_POST, 'input_nome');
    $cpf = filter_input(INPUT_POST, 'input_cpf');
    $nasc = filter_input(INPUT_POST, 'input_idade');
    $valueEmployee = filter_input(INPUT_POST, 'value-employee');
    $recebimento = filter_input(INPUT_POST, 'pay_day');
    $salario = filter_input(INPUT_POST, 'input_salario');

    $dc = new DaoFuncionario();
    if ($dc->incluir($nome, $cpf, $nasc, $recebimento, $salario, $valueEmployee)) {
        echo '<span class="formResp">' . $nome . ' cadastrado com sucesso!';
    } else {
        echo '<span class="formResp"> Erro no cadastro de cliente!</span>';
    }

    ?>
</body>

</html>