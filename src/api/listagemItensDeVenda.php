<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="../assets/favicon/site.webmanifest">
  <link rel="stylesheet" href="../../dist/output.css">
  <title>Itens de Venda</title>
</head>

<body class="bg-body">
  <header class="mt-4 flex justify-center items-center">
    <img src="../assets/heading.svg" alt="heading" class="mx-auto w-1/4" />
    <img src="../assets/haltere.svg" alt="Haltere" class="absolute right-16" />
  </header>

  <h2 class="text-center text-2xl mt-4 text-teal-500">
    <i> Listagem de Itens de Venda</i>
  </h2>

  <table border="1px">
    <tr class="first-tr">
      <th>
        ID
      </th>
      <th>
        Venda
      </th>
      <th>
        Produto
      </th>
      <th>
        Produto
      </th>
      <th>
        Quantidade
      </th>
      <th>
        Total
      </th>
    </tr>

    <?php
    require_once '../dao/DaoItensDeVenda.php';
    require_once '../dao/Conexao.php';

    $dc = new DaoItensDeVenda();
    $lista = $dc->listar();

    foreach ($lista as $linha) {
      echo '<tr>';
      echo '<td>' . $linha['id'] . '</td>';
      echo '<td>' . $linha['venda_id'] . '</td>';
      echo '<td>' . $linha['produto_id'] . '</td>';
      echo '<td>' . $linha['produto'] . '</td>';
      echo '<td>' . $linha['quantidade'] . '</td>';
      echo '<td>' . $linha['total'] . '</td>';
    }
    ?>
  </table>
  <div class="pattern-redirectors">

    <a href="../forms/forms.php" class="redirectors">Cadastre-se</a>

    <p href="#" onclick="history.back()" class="redirectors">
      Voltar
    </p>
    <a href="../index.html" class="redirectors">Tela de inicio</a>
  </div>
  <script src="../forms/0911/itensDeVenda.js"></script>
</body>

</html>