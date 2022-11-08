<?php
class Cliente
{
    private $nome;
    private $id;
    private $data_nascimento;
    private $cpf;
    private $valor_mensalidade;
    private $dia_pagamento;


    function __construct($nome, $data_nascimento, $cpf, $valor_mensalidade, $dia_pagamento)
    {
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->cpf = $cpf;
        $this->valor_mensalidade = $valor_mensalidade;
        $this->dia_pagamento = $dia_pagamento;
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
     * Get the value of data_nascimento
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * Set the value of data_nascimento
     */
    public function setDataNascimento($data_nascimento): self
    {
        $this->data_nascimento = $data_nascimento;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf($cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of valor_mensalidade
     */
    public function getValorMensalidade()
    {
        return $this->valor_mensalidade;
    }

    /**
     * Set the value of valor_mensalidade
     */
    public function setValorMensalidade($valor_mensalidade): self
    {
        $this->valor_mensalidade = $valor_mensalidade;

        return $this;
    }

    /**
     * Get the value of dia_pagamento
     */
    public function getDiaPagamento()
    {
        return $this->dia_pagamento;
    }

    /**
     * Set the value of dia_pagamento
     */
    public function setDiaPagamento($dia_pagamento): self
    {
        $this->dia_pagamento = $dia_pagamento;

        return $this;
    }
}
