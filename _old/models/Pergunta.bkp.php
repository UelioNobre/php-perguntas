<?php

class Pergunta
{
  public $texto;
  public $alternativas = [];
  public $isMultiple = false;

  public function __construct($texto)
  {
    $this->texto = $texto;
  }

  public function addAlternativa($alternativa)
  {
    $this->alternativas[] = $alternativa;
  }

  public function mostrarAlternativas()
  {
    $alternativas = [];

    foreach ($this->alternativas as $k => $alternativa) {
      $alternativas[] = $k . ' - ' . $alternativa->texto;
    }

    return implode(PHP_EOL, $alternativas);
  }

  public function waitRespostaMultipla()
  {

    $alts = array_filter($this->alternativas, function ($a) {
      return $a->isTrue;
    });

    $size = sizeof($alts);
    $respostas = [];

    for ($i = 0; $i < $size; $i++) {
      $respostas[] =
        readline('Informe a(s) resposta(s): ');
    }
    return $respostas;
  }

  public function waitResposta()
  {

    $resposta = null;
    if ($this->isMultiple) {
      $resposta = $this->waitRespostaMultipla();
    } else {
      $resposta = readline('Informe uma alternativa: ');
    }

    return $resposta;
  }

  public function conferirResposta($resposta)
  {
    $resposta = null;
    if ($this->isMultiple) {
      echo "Conferindo respostas multiplas...\n";
    }
  }
}
