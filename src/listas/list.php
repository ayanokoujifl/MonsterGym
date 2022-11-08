<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../../dist/output.css" rel="stylesheet" />

  <title>Visualizar cadastrados</title>
</head>

<body class="bg-body">
  <header class="mt-4 flex justify-center items-center">
    <img src="../assets/heading.svg" alt="heading" class="mx-auto w-1/4" />
    <img src="../assets/haltere.svg" alt="Haltere" class="absolute right-16" />
  </header>

  <section class="mt-12">
    <ul class="font-bebas flex flex-1 justify-center items-center w-min mx-auto gap-10">
      <li class="bg-teal-900 px-6 py-3 text-sky-200 rounded-lg w-full text-center text-2xl">
        <a href="../listas/listagemCliente.php" id="cliente"> Clientes</a>
      </li>
      <li class="bg-teal-900 px-6 py-3 text-sky-200 rounded-lg w-full text-center text-2xl">
        <a href="../listas/listagemEquipamento.php"> Equipamentos</a>
      </li>
      <li class="bg-teal-900 px-6 py-3 text-sky-200 rounded-lg w-full text-center text-2xl">
        <a href="../listas/listagemFornecedor.php"> Fornecedores</a>
      </li>
      <li class="bg-teal-900 px-6 py-3 text-sky-200 rounded-lg w-full text-center text-2xl">
        <a href="../listas/listagemFuncionario.php"> Funcionários</a>
      </li>
      <li class="bg-teal-900 px-6 py-3 text-sky-200 rounded-lg w-full text-center text-2xl">
        <a href="../listas/listagemModalidade.php"> Modalidades</a>
      </li>
      <li class="bg-teal-900 px-6 py-3 text-sky-200 rounded-lg w-full text-center text-2xl">
        <a href="../listas/listagemProduto.php"> Produtos</a>
      </li>
      <li class="bg-teal-900 px-6 py-3 text-sky-200 rounded-lg w-full text-center text-2xl">
        <a href="../listas/listagemVenda.php"> Vendas</a>
      </li>
    </ul>
  </section>
  <div id="show-table">
    <p class="flex justify-center w-1/2 mx-auto mt-14 outline[3px] outline-dotted outline-gray-500 text-teal-500 font-semibold text-xl px-48 py-16 text-justify">
      Será apresentado uma tabela com a listagem de todos os cadastros que
      você desejar saber, transparencia e visibilidade é valorizado em nossa
      instituição
    </p>
    <section id="tables">
      <div id="table-client">

        <h2 class="text-center text-2xl mt-4 text-teal-500">
          <i> Listagem de Clientes</i>
        </h2>


        <table>
          <tr class="border-b-2 border-teal-700">
            <th>
              ID
            </th>
            <th>
              Nome
            </th>
            <th>
              CPF
            </th>
            <th>
              Nascimento
            </th>
            <th>
              Dia mensalidade
            </th>
            <th>
              Valor mensalidade
            </th>
          </tr>
          <?php
          require_once '../dao/DaoCliente.php';
          require_once '../dao/Conexao.php';

          $dc = new DaoCliente();
          $lista = $dc->listar();

          foreach ($lista as $linha) {
            echo '<tr>';
            echo '<td>' . $linha['id'] . '</td>';
            echo '<td>' . $linha['nome'] . '</td>';
            echo '<td>' . $linha['cpf'] . '</td>';
            echo '<td>' . $linha['data_nascimento'] . '</td>';
            echo '<td>' . $linha['dia_pagamento'] . '</td>';
            echo '<td>' . $linha['valor_mensalidade'] . '</td>';
            echo
            '<td>  
            <form action="../remove/excluiCliente.php" method="POST">
                <input type="hidden" name="id" id="id" value="' . $linha['id'] . '"/>
                <button>Excluir</button>
            </form>

            <form action="../edita/formEditaCliente.php" method="POST">
                <input type="hidden" name="id" id="id" value="' . $linha['id'] . '"/>
                <button>Editar</button>
            </form>
        </td>';
          }
          ?>

        </table>


        <div class="flex justify-around relative top-10 font-serif tracking-wide text-xl">

          <a href="../forms/forms.php" class=" font-bold text-teal-200 bg-teal-900 flex items-center px-4 py-3 rounded hover:bg-teal-700 transition-colors">Cadastre-se</a>

          <a href="./listagemClienteModalidade.php" class="px-4 py-3 font-semibold  text-teal-200 bg-teal-900 rounded hover:bg-teal-700 transition-colors">Ver Clientes e suas Modalidades</a>

          <p href="#" onclick="history.back()" class="px-4 py-3 font-bold h-fit flex items-center  text-teal-200  bg-teal-900 rounded hover:bg-teal-700 transition-colors cursor-pointer">
            Voltar
          </p>
          <a href="../index.html" class="px-4 py-3 font-bold h-fit w-fit flex items-center text-teal-200 bg-teal-900 rounded cursor-pointer hover:bg-teal-700 transition-colors">Tela de inicio</a>
        </div>
      </div>
    </section>
    <!--
    <div id="content-table">
      <p
        class="flex justify-center w-1/2 mx-auto mt-14 outline[3px] outline-dotted outline-gray-500 text-teal-500 font-semibold text-xl px-48 py-16 text-justify"
      >
        Aqui será apresentado uma tabela com a listagem de todos os cadastros
        que você desejar saber, transparencia e visibilidade é valorizado em
        nossa instituição
      </p>
    </div>
  -->
</body>

</html>