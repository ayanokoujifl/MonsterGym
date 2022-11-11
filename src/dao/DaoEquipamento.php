<?php
class DaoEquipamento
{
    public function listar()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('select * from equipamento;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function incluir(Equipamento $equipamento)
    {

        $sql = 'insert into Equipamento (nome,periodo_revisao,id_fornecedor) values(?,?,?);';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $equipamento->getNome());
        $pst->bindValue(2, $equipamento->getTempoRevisao());
        $pst->bindValue(3, $equipamento->getFornecedor());
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function remover(Equipamento $equipamento)
    {
        $sql = 'delete from equipamentos where id=?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $equipamento->getId());
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
