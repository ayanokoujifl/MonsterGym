<?php
class DaoVenda
{
  public function listar()
  {
    $lista = [];
    $pst = Conexao::getPreparedStatement('select * from venda');
    $pst->execute();
    $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
  }

  public function incluir($data, $cliente, $produto, $quantidade)
  {

    $sql = 'insert into venda(data_venda,cliente_id,produto,quantidade) values(?,?,?,?);';
    $pst = Conexao::getPreparedStatement($sql);

    $pst->bindValue(1, $data);
    $pst->bindValue(2, $cliente);
    $pst->bindValue(3, $produto);
    $pst->bindValue(4, $quantidade);

    if ($pst->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
  public function remover(Venda $venda)
  {
    $sql = 'delete from venda where id=?';
    $pst = Conexao::getPreparedStatement($sql);
    $pst->bindValue(1, $venda->getId());
    if ($pst->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
