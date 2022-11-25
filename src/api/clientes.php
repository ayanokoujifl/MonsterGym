    <?php
    require_once '../dao/DaoCliente.php';
    require_once '../dao/Conexao.php';

    $dc = new DaoCliente();
    $lista = $dc->listar();

    echo json_encode($lista)
    ?>

