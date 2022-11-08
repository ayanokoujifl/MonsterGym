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
  <title>Funcionarios</title>

<body class="bg-body">
  <header class="mt-4 flex justify-center items-center">
    <img src="../assets/heading.svg" alt="heading" class="mx-auto w-1/4" />
    <img src="../assets/haltere.svg" alt="Haltere" class="absolute right-16" />
  </header>

  <h2 class=" text-center text-2xl mt-4 text-teal-500">
    <i>Listagem de Clientes e Modalidades:</i>
  </h2>


  <table>
    <tr>
      <th>
        ID
      </th>
      <th>
        Cliente
      </th>
      <th>
        Modalidade
      </th>
    </tr>

    <?php
    require_once '../dao/DaoClienteModalidade.php';
    require_once '../dao/Conexao.php';

    $dc = new DaoClienteModalidade();
    $lista = $dc->listar();

    foreach ($lista as $linha) {
      echo '<tr>';
      echo '<td>' . $linha['id'] . '</td>';
      echo '<td>' . $linha['cliente'] . '</td>';
      echo '<td>' . $linha['modalidade'] . '</td>';
    }
    ?>
  </table>
  <div class="flex justify-around relative top-5 font-serif tracking-wide text-xl">

    <a href="../forms/forms.php" class=" font-bold text-teal-200 bg-teal-900 flex items-center px-4 py-3 rounded hover:bg-teal-700 transition-colors">Cadastre-se</a>


    <p class=" font-bold text-teal-200 bg-teal-900 flex items-center px-4 py-3 rounded hover:bg-teal-700 transition-colors" onclick="history.back()">
      Voltar
    </p>
    <a href="../index.html" class=" font-bold text-teal-200 bg-teal-900 flex items-center px-4 py-3 rounded hover:bg-teal-700 transition-colors">Tela de inicio</a>

  </div>
</body>
</head>

</html>