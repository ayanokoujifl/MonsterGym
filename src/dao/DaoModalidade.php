<?php
class DaoModalidade
{
    public function listar()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('select * from modalidade');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function incluir(Modalidade $modalidade)
    {

        $sql = 'insert into modalidade(nome,valor) values(?,?);';
        $pst = Conexao::getPreparedStatement($sql);

        $pst->bindValue(1, $modalidade->getNome());
        $pst->bindValue(2, $modalidade->getValor());
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function remover( $id)
    {
        $sql = 'delete from modalidade where id=?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
