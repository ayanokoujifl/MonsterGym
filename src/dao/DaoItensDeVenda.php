<?php
class DaoItensDeVenda
{
  public function listar()
  {
    $lista = [];
    $pst = Conexao::getPreparedStatement('select i.*,p.nome as produto,v.quantidade as quantidade,v.total as total from itensdevenda i inner join produto p 
    on i.produto_id = p.id inner join venda v
    on v.id = i.venda_id;');
    $pst->execute();
    $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
  }

  public function incluir(ItensDeVenda $itensDeVenda)
  {

    $sql = 'insert into itensDeVenda(venda_id,produto_id,quantidade) values(?,?,?);';
    $pst = Conexao::getPreparedStatement($sql);

    $pst->bindValue(1, $itensDeVenda->getVenda());
    $pst->bindValue(2, $itensDeVenda->getProduto());
    $pst->bindValue(3, $itensDeVenda->getQuantidade());
    if ($pst->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function remover(ItensDeVenda $itensDeVenda)
  {
    $sql = 'delete from itensDeVenda where id=?';
    $pst = Conexao::getPreparedStatement($sql);
    $pst->bindValue(1, $itensDeVenda->getId());
    if ($pst->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
