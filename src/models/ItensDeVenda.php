<?php

class ItensDeVenda
{
  private $id;
  private $produto;
  private $venda;
  private $quantidade;

  function __construct($produto, $venda)
  {
    $this->produto = $produto;
    $this->venda = $venda;
  }


  public function getQuantidade()
  {
    return $this->quantidade;
  }

  /**
   * Set the value of id
   */
  public function setQuantidade($quantidade): self
  {
    $this->quantidade = $quantidade;

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
   * Get the value of venda
   */
  public function getVenda()
  {
    return $this->venda;
  }

  /**
   * Set the value of venda
   */
  public function setVenda($venda): self
  {
    $this->venda = $venda;

    return $this;
  }
}
