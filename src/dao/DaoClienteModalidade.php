<?php

class DaoClienteModalidade
{

  public function listar()
  {
    $lista = [];
    $pst = Conexao::getPreparedStatement('select cm.id as id,c.nome as cliente,m.nome as modalidade from cliente_modalidade cm inner join modalidade m on m.id = cm.modalidade inner join cliente c on c.id=cm.cliente;');
    $pst->execute();
    $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
  }

  public function incluir(ClienteModalidade $cliente)
  {

    $sql = 'insert into cliente_modalidade (cliente,modalidade) values(?,?);';
    $pst = Conexao::getPreparedStatement($sql);
    $pst->bindValue(1, $cliente->getCliente());
    $pst->bindValue(2, $cliente->getModalidade());


    if ($pst->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function remover($id)
  {
    $sql = 'delete from tb_cliente where id=?';
    $pst = Conexao::getPreparedStatement($sql);
    $pst->bindValue(1, $id);
    if ($pst->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
