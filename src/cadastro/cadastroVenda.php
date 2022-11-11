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

  require_once '../dao/DaoVenda.php';
  require_once '../models/Venda.php';
  require_once '../dao/Conexao.php';

  $data = filter_input(INPUT_POST, 'dateSale');
  $cliente = filter_input(INPUT_POST, 'client');
  $quantidade = filter_input(INPUT_POST, 'quantity');
  $produto = filter_input(INPUT_POST, 'value-product');

  $dc = new DaoVenda();
  if ($dc->incluir($data, $cliente, $produto, $quantidade)) {
    echo '<span class="formResp">Venda cadastrada com sucesso!</span>';
  } else {
    echo '<span class="formResp">Erro no cadastro da venda!</span>';
  }
  ?>
</body>

</html>