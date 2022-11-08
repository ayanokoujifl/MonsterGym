<?php

class Fornecedor
{

  private $id;
  private $nome;
  private $cnpj;


  function __construct($nome, $cnpj)
  {
    $this->nome = $nome;
    $this->cnpj = $cnpj;
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
   * Get the value of cnpj
   */
  public function getCnpj()
  {
    return $this->cnpj;
  }

  /**
   * Set the value of cnpj
   */
  public function setCnpj($cnpj): self
  {
    $this->cnpj = $cnpj;

    return $this;
  }
}
