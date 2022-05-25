<?php

use function PHPSTORM_META\type;

class Pergunta
{
  public $texto;
  public $alternativas = [];
  public $resposta;

  public function __construct($texto = "")
  {
    $this->texto = $texto;
  }

  public function addAlternativa($alternativa)
  {
    $this->alternativas[] = $alternativa;
  }

  public function show()
  {
    echo "Pergunta::show().";
    echo "$this->texto\n";
    foreach ($this->alternativas as $k => $alternativa) {
      $aux = $alternativa->show();
      echo "\t\t" . $k . ' - ' . $aux . "";
    }
  }

  public function waitAwswer()
  {
    $this->resposta = (int) trim(fgets(STDIN));
  }

  public function verify()
  {
    $isTrue = $this->alternativas[$this->resposta]->isTrue;
    return ($isTrue === true) ? 1 : 0;
  }
}
