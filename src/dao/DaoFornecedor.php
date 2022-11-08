<?php

class DaoFornecedor
{

    public function listar()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('select * from fornecedor');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function incluir(Fornecedor $fornecedor)
    {

        $sql = 'insert into Fornecedor (cnpj,nome) values(?,?);';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $fornecedor->getCnpj());
        $pst->bindValue(2, $fornecedor->getNome());

        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function remover($id)
    {
        $sql = 'delete from fornecedor where id=?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
