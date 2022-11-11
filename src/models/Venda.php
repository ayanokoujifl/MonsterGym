<?php

class Venda
{
  private $id;
  private $data_venda;
  private $cliente;
  private $produto;
  private $quantidade;


  function __construct($data, $cliente, $produto, $quantidade)
  {
    $this->data_venda = $data;
    $this->cliente = $cliente;
    $this->produto = $produto;
    $this->quantidade = $quantidade;
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
   * Get the value of data_venda
   */
  public function getDataVenda()
  {
    return $this->data_venda;
  }

  /**
   * Set the value of data_venda
   */
  public function setDataVenda($data_venda): self
  {
    $this->data_venda = $data_venda;

    return $this;
  }

  /**
   * Get the value of cliente
   */
  public function getCliente()
  {
    return $this->cliente;
  }

  /**
   * Set the value of cliente
   */
  public function setCliente($cliente): self
  {
    $this->cliente = $cliente;

    return $this;
  }

  /**
   * Get the value of produto
   */
  public function getProduto()
  {
    return $this->produto;
  }

  /**
   * Set the value of produto
   */
  public function setProduto($produto): self
  {
    $this->produto = $produto;

    return $this;
  }

  /**
   * Get the value of quantidade
   */
  public function getQuantidade()
  {
    return $this->quantidade;
  }

  /**
   * Set the value of quantidade
   */
  public function setQuantidade($quantidade): self
  {
    $this->quantidade = $quantidade;

    return $this;
  }
}
