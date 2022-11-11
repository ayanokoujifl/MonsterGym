<?php

require_once '../dao/Conexao.php';
require_once '../dao/DaoFornecedor.php';

$dao = new DaoFornecedor();
$lista=$dao->listar();

echo json_encode($lista);
