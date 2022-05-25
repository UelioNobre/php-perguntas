<?php

class AlternativaInput
{
  /**
   * A string da alternativa.
   *
   * @var [string]
   */
  public $texto;

  /**
   * Resposta certa: true/false.
   *
   * @var [bool]
   */
  public $isTrue;

  /**
   * O primeiro parametro deve ser uma string.
   * O segundo parametro deve ser um boolean.
   *
   * @param string $texto O texto da alternativa
   * @param boolean $isTrue Se a alternativa é a correta.
   */
  public function __construct($texto = "", $stringTrue = "")
  {
    $this->texto = $texto;
    $this->isTrue = $stringTrue;
  }

  public function show()
  {
    $out = ($this->isTrue) ? '[x]' . $this->texto : $this->texto;
    $out = $this->texto;
    return $out . "\n";
  }
}
