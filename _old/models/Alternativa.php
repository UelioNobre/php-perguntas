<?php

class Alternativa
{
  public $texto = "";
  public $isTrue = false;
  public function __construct($texto = "", $isTrue = false)
  {
    $this->texto = $texto;
    $this->isTrue = $isTrue;
  }
}
