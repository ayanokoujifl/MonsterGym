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
    <title>Cadastro de Modalidade</title>
</head>

<body>
    <?php

    require_once '../dao/DaoModalidade.php';
    require_once '../models/Modalidade.php';
    require_once '../dao/Conexao.php';

    $nome = filter_input(INPUT_POST, 'input_nome');
    $valor = filter_input(INPUT_POST, 'input_valor');

    $modalidade = new Modalidade($nome, $valor);
    $dc = new DaoModalidade();
    if ($dc->incluir($modalidade)) {
        echo '<span class="formResp">' . $modalidade->getNome() . ' cadastrado com sucesso!</span>';
    } else {
        echo '<span class="formResp">Erro no cadastro de modalidade!</span>';
    }

    ?>
</body>

</html>