<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../styles/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../styles/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../styles/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../styles/assets/favicon/site.webmanifest">

    <link rel="stylesheet" href="../../dist/output.css">

    <title>Cadastro de clientes</title>
</head>

<body>
    <?php


    require_once '../dao/DaoCliente.php';
    require_once '../models/Cliente.php';
    require_once '../dao/Conexao.php';

    $nome = filter_input(INPUT_POST, 'username');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $idade = filter_input(INPUT_POST, 'date');
    $mensalidade = filter_input(INPUT_POST, 'amount');
    $pagamento = filter_input(INPUT_POST, 'day');

    $cliente = new Cliente($nome, $idade, $cpf, $mensalidade, $pagamento);
    $dc = new DaoCliente();
    if ($dc->incluir($cliente)) {
        echo '<span class="text-emerald-600"> <p class="text-emerald-600">' . $cliente->getNome() . ' foi cadastrado!</p></span>';
    } else {
        echo '<span class="formResp">Erro no cadastro de cliente!</formResp>';
    }
    ?>
</body>

</html>