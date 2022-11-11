    <?php
    require_once '../dao/DaoProduto.php';
    require_once '../dao/Conexao.php';

    $dc = new DaoProduto();
    $lista = $dc->listar();

    echo json_encode($lista)
    ?>