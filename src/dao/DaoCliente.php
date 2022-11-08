<?php

class DaoCliente
{

    public function listar()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('select * from cliente;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function incluir(Cliente $cliente)
    {

        $sql = 'insert into cliente (cpf,nome,data_nascimento,valor_mensalidade,dia_pagamento) values(?,?,?,?,?);';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $cliente->getCpf());
        $pst->bindValue(2, $cliente->getNome());
        $pst->bindValue(3, $cliente->getDataNascimento());
        $pst->bindValue(4, $cliente->getValorMensalidade());
        $pst->bindValue(5, $cliente->getDiaPagamento());

        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function remover($id)
    {
        $sql = 'delete from cliente where id=?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function update($id, $nome, $cpf, $data_nascimento, $dia_pagamento, $valor_mensalidade)
    {
        $sql = 'update cliente
        set nome = ?,
        cpf=?,
        data_nascimento =?,
        dia_pagamento =?,
        valor_mensalidade =?
        where id = ?';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $nome);
        $pst->bindValue(2, $cpf);
        $pst->bindValue(3, $data_nascimento);
        $pst->bindValue(4, $dia_pagamento);
        $pst->bindValue(5, $valor_mensalidade);
        $pst->bindValue(6, $id);

        if ($pst->execute()) {
            return true;
        } else {
            return false;
        };
    }

    public function findById($id)
    {
        $lista = [];
        $sql = 'select * from cliente where id = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }
}
