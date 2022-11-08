<?php

class ClienteModalidade
{
  private $id;
  private $cliente;
  private $modalidade;

  function __construct($id, $cliente, $modalidade)
  {
    $this->id = $id;
    $this->cliente = $cliente;
    $this->modalidade = $modalidade;
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
   * Get the value of modalidade
   */
  public function getModalidade()
  {
    return $this->modalidade;
  }

  /**
   * Set the value of modalidade
   */
  public function setModalidade($modalidade): self
  {
    $this->modalidade = $modalidade;

    return $this;
  }
}
