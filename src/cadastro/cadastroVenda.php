  <?php

  require_once '../dao/DaoVenda.php';
  require_once '../models/Venda.php';
  require_once '../dao/Conexao.php';

  $data = filter_input(INPUT_POST, 'dateSale');
  $cliente = filter_input(INPUT_POST, 'client');
  $quantidade = filter_input(INPUT_POST, 'quantity');
  $produto = filter_input(INPUT_POST, 'value-product');


  $dc = new DaoVenda();
  $retorno = [];
  if ($dc->incluir($data, $cliente, $produto, $quantidade)) {
    $retorno = [
      'status' => 'ok',
      'message' => 'Cadastro realizado com sucesso'
    ];
  } else {
    $retorno = [
      'status' => 'error',
      'message' => 'Cadastro não realizado com sucesso'
    ];
  }
  echo json_encode($retorno);
