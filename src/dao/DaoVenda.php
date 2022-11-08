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

  public function incluir(Venda $venda)
  {

    $sql = 'insert into venda(data_venda,cliente_id) values(?,?);';
    $pst = Conexao::getPreparedStatement($sql);

    $pst->bindValue(1, $venda->getDataVenda());
    $pst->bindValue(2, $venda->getCliente());
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
