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

  require_once './formCadastroEquipamento.php';
  require_once '../dao/DaoVenda.php';
  require_once '../models/Venda.php';
  require_once '../dao/Conexao.php';

  $data = filter_input(INPUT_POST, 'data');
  $cliente = filter_input(INPUT_POST, 'cliente');

  $venda = new Venda($data, $cliente);
  $dc = new DaoEquipamento();
  if ($dc->incluir($func)) {
    echo '<span class="formResp">' . $func->getNome() . ' cadastrado com sucesso!</span>';
  } else {
    echo '<span class="formResp">Erro no cadastro do Equipamento!</span>';
  }
  ?>
</body>

</html>