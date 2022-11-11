<?php
class Equipamento
{
    private $nome;
    private $id;
    private $tempo_revisao;
    private $fornecedor;



    function __construct($nome, $tempo_revisao, $fornecedor)
    {
        $this->nome = $nome;
        $this->tempo_revisao = $tempo_revisao;
        $this->fornecedor = $fornecedor;
    }

    

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of tempo_revisao
     */
    public function getTempoRevisao()
    {
        return $this->tempo_revisao;
    }

    /**
     * Set the value of tempo_revisao
     */
    public function setTempoRevisao($tempo_revisao): self
    {
        $this->tempo_revisao = $tempo_revisao;

        return $this;
    }

    /**
     * Get the value of fornecedor
     */
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * Set the value of fornecedor
     */
    public function setFornecedor($fornecedor): self
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }
}
