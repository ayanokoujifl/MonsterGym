<?php

class Produto
{
  private $id;
  private $nome;
  private $valor;
  private $fornecedor;
  private $estoque;

  function __construct($nome, $valor, $estoque, $fornecedor)
  {
    $this->$nome;
    $this->$valor;
    $this->estoque = $estoque;
    $this->$fornecedor;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }


  public function getEstoque()
  {
    return $this->estoque;
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
   * Get the value of valor
   */
  public function getValor()
  {
    return $this->valor;
  }

  /**
   * Set the value of valor
   */
  public function setValor($valor): self
  {
    $this->valor = $valor;

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

  /**
   * Get the value of produtos
   */
  public function getProdutos()
  {
    return $this->produtos;
  }

  /**
   * Set the value of produtos
   */
  public function setProdutos($produtos): self
  {
    $this->produtos = $produtos;

    return $this;
  }
}
