<?php

class DaoFuncionario
{

    public function listar()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('select * from funcionario');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function incluir($nome, $cpf, $data, $diaPagamento, $salario, $tipo)
    {

        $sql = 'insert into Funcionario (nome,cpf,data_nascimento,dia_pagamento,salario,tipo) values(?,?,?,?,?,?);';
        $pst = Conexao::getPreparedStatement($sql);

        $pst->bindValue(1, $nome);
        $pst->bindValue(2, $cpf);
        $pst->bindValue(3, $data);
        $pst->bindValue(4, $diaPagamento);
        $pst->bindValue(5, $salario);
        $pst->bindValue(6, $tipo);

        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function remover($id)
    {
        $sql = 'delete from funcionario where id=?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
