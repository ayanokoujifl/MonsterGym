<?php
class DaoProduto
{
  public function listar()
  {
    $lista = [];
    $pst = Conexao::getPreparedStatement('select * from produto');
    $pst->execute();
    $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
  }

  public function incluir(Produto $produto)
  {

    $sql = 'insert into produto(nome,valor,estoque,id_fornecedor) values(?,?,?,?);';
    $pst = Conexao::getPreparedStatement($sql);

    $pst->bindValue(1, $produto->getNome());
    $pst->bindValue(2, $produto->getValor());
    $pst->bindValue(3, $produto->getFornecedor());
    if ($pst->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function remover(Produto $produto)
  {
    $sql = 'delete from produto where id=?';
    $pst = Conexao::getPreparedStatement($sql);
    $pst->bindValue(1, $produto->getId());
    if ($pst->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
