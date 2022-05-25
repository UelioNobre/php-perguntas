<?php

require("Dicotomica.php");
require("Multipla.php");
require("InputText.php");

class PerguntaFactory
{
  public function create($type, $text)
  {
    $out = new $type($text);
    return $out;
  }
}
