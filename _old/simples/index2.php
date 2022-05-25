<?php

/**
 * Tipos de alternativas para o usuário.
 * Caixa de texto.
 * Perguntas com multipla escolha.
 * Perguntas com escolha única.
 */

class Alternativas
{
  public $text = "";
  public $isTrue = false;
  public function __construct($text = "", $isTrue = false)
  {
    $this->text = $text;
    $this->isTrue = $isTrue;
  }
}

class Pergunta
{
  public $texto = "";
  public $alternativas = array();
  public $isRandom = false;
  public $isMultiple = false;

  public function showPergunta()
  {
    $output = sprintf("%s\n", $this->texto);

    // Se for do tipo aleatorio, embaralha as alternativas.
    if ($this->isRandom) shuffle($this->alternativas);

    $acumulaAlt = "";
    foreach ($this->alternativas as $k => $a)
      $acumulaAlt .= $k . ' - ' . sprintf("%s\n", $a->text);

    $output = $output . $acumulaAlt;
    echo $output . PHP_EOL;
  }

  public function addAlternativas($alternativa)
  {
    $this->alternativas[] = $alternativa;
  }

  public function confere($opcao)
  {

    // se for de multipla escolha.
    if ($this->isMultiple) {
      print("é muitiplo " . $this->isMultiple);
      return false; //  falta calcular.
    }

    if ($opcao < 0 || $opcao > count($this->alternativas) - 1)
      return false;
    return $this->alternativas[$opcao]->isTrue && true;
  }
}
