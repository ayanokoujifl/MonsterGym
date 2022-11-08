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

    <h2 class="text-center text-2xl mt-4 text-teal-500">
        <i>Listagem de Funcionarios:</i>
    </h2>
    <div>

        <table border="1px">
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
                    Data Nascimento
                </th>
                <th>
                    Modalidades
                </th>
                <th>
                    Salario
                </th>
                <th>
                    Recebimento
                </th>
            </tr>
            <?php
            require_once '../dao/DaoFuncionario.php';
            require_once '../dao/Conexao.php';

            $dc = new DaoFuncionario();
            $lista = $dc->listar();

            foreach ($lista as $linha) {
                echo '<tr>';
                echo '<td>' . $linha['id'] . '</td>';
                echo '<td>' . $linha['nome'] . '</td>';
                echo '<td>' . $linha['cpf'] . '</td>';
                echo '<td>' . $linha['data_nascimento'] . '</td>';
                echo '<td>' . $linha['dia_pagamento'] . '</td>';
                echo '<td>' . $linha['salario'] . '</td>';
                echo '<td>' . $linha['tipo'] . '</td>';
                echo '<td>  <form action="../remove/excluiFuncionario.php" method="POST">
                <input type="hidden" name="id" id="id" value="' . $linha['id'] . '"/>
                <button>Excluir</button>
            </form></td>';
            }
            ?>
        </table>


        <div class="flex justify-around relative top-10 font-serif tracking-wide text-xl">

            <a href="../forms/forms.php" class=" font-bold text-teal-200 bg-teal-900 flex items-center px-4 py-3 rounded hover:bg-teal-700 transition-colors">Cadastre-se</a>

            <p href="#" onclick="history.back()" class="px-4 py-3 font-bold h-fit flex items-center  text-teal-200  bg-teal-900 rounded hover:bg-teal-700 transition-colors cursor-pointer">
                Voltar
            </p>
            <a href="../index.html" class="px-4 py-3 font-bold h-fit w-fit flex items-center text-teal-200 bg-teal-900 rounded cursor-pointer hover:bg-teal-700 transition-colors">Tela de inicio</a>
        </div>
</body>
</head>

</html>