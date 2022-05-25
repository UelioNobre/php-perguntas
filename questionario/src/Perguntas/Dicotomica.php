<?php

require "IPergunta.php";

class Dicotomica implements IPergunta
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
    echo "\n\nPergunta Dicotomica :: Somente uma resposta certa (Radio)\n";
    echo "$this->texto.\n";
    foreach ($this->alternativas as $k => $alternativa) {
      $aux = $alternativa->show();
      echo "\t" . $k . ' - ' . $aux . "";
    }
  }

  public function waitAwswer()
  {
    $this->resposta = (int) readline("Informe a alternativa: ");
    return $this->resposta;
  }

  public function verify()
  {
    $keyExists = array_key_exists($this->resposta, $this->alternativas);
    if (!$keyExists) {
      return 0;
    }

    $isTrue = $this->alternativas[$this->resposta]->isTrue;
    return ($isTrue === true) ? 1 : 0;
  }
}
