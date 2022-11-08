<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../dist/output.css" />

  <title>Cadastre-se</title>
</head>

<?php

require_once '../dao/Conexao.php';
require_once '../dao/DaoCliente.php';

$id = filter_input(INPUT_POST, 'id');

$dao = new DaoCliente();
$lista = $dao->findById($id);
$cliente = $lista[0];

?>

<body class="bg-body">
  <header class="mt-3 flex justify-center items-center">
    <img src="../assets/heading.svg" alt="heading" class="mx-auto w-1/4" />
    <img src="../assets/haltere.svg" alt="Haltere" class="absolute right-16" />
  </header>

  <main class="mt-5">

    <form action="../edita/editaCliente.php" method="post" class="flex justify-center flex-col bg-teal-900 w-fit mx-auto px-8 py-9 rounded-xl gap-8">
      <input type="hidden" name="id" id="id" value="<?php echo $cliente['id'] ?>">

      <div class="flex items-center bg-gray-900-40 gap-4 px-3 py-2 focus-within:ring-2 ring-cyan-300 rounded-lg">
        <img src="../assets/icons/username.svg" alt="username" class="w-5 h-5" />
        <input name="username" id="username" type="text" class="bg-transparent flex flex-1 placeholder:text-teal-300 outline-none text-teal-200" value="<?php echo $cliente['nome']; ?>" />
      </div>

      <div class="flex items-center bg-gray-900-40 gap-4 px-3 py-2 focus-within:ring-2 ring-cyan-300 rounded-lg">
        <img src="../assets/icons/identificator.svg" alt="Document" class="w-5 h-5" />
        <input name="cpf" id="cpf" type="text" class="bg-transparent flex flex-1 placeholder:text-teal-300 outline-none text-teal-200" value="<?php echo $cliente['cpf']; ?>" />
      </div>

      <div class="flex items-center bg-gray-900-40 gap-4 px-3 py-2 focus-within:ring-2 ring-cyan-300 rounded-lg">
        <img src="../assets/icons/calendar.svg" alt="Calendar" class="w-5 h-5" />
        <input name="date" id="date" type="text" class="bg-transparent flex flex-1 placeholder:text-teal-300 outline-none text-teal-200" value="<?php echo $cliente['data_nascimento'] ?>" onfocus='(this.type="date")' />
      </div>

      <div class="flex items-center bg-gray-900-40 gap-4 px-3 py-2 focus-within:ring-2 ring-cyan-300 rounded-lg">
        <img src="../assets/icons/amount.svg" alt="cash" class="w-5 h-5" />
        <input name="amount" id="amount" type="text" class="bg-transparent flex flex-1 placeholder:text-teal-300 outline-none text-teal-200" value="<?php echo $cliente['valor_mensalidade'] ?>" />
      </div>

      <div class="flex items-center bg-gray-900-40 gap-4 px-3 py-2 focus-within:ring-2 ring-cyan-300 rounded-lg">
        <img src="../assets/icons/day.svg" alt="payment" class="w-5 h-5" />
        <input name="day" id="day" type="number" class="bg-transparent flex flex-1 placeholder:text-teal-300 outline-none text-teal-200" value="<?php echo $cliente['dia_pagamento'] ?>" />
      </div>

      <button class="bg-teal-700 text-gray-900-40 text-center px-6 py-1 rounded-md">
        Concluir cadastro
      </button>
    </form>
  </main>
</body>

</html>