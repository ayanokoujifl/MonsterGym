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
  <title>Exclusão de clientes</title>
</head>

<body>
  <?php


  require_once '../dao/DaoCliente.php';
  require_once '../models/Cliente.php';
  require_once '../dao/Conexao.php';

  $id = filter_input(INPUT_POST, 'id');
  $nome = filter_input(INPUT_POST, 'username');
  $cpf = filter_input(INPUT_POST, 'cpf');
  $idade = filter_input(INPUT_POST, 'date');
  $mensalidade = filter_input(INPUT_POST, 'amount');
  $pagamento = filter_input(INPUT_POST, 'day');

  $dc = new DaoCliente();
  if ($dc->update($id, $nome, $cpf, $idade, $mensalidade, $pagamento)) {
    echo '<span class="formResp"> <p class="resp">' . $id . ' alterado com sucesso  </p></span>';
  } else {
    echo '<span class="formResp">Erro no cadastro de cliente!</formResp>';
  }
  ?>
  <a href="../index.html" class="inicio-form">Inicio</a>
</body>

</html>