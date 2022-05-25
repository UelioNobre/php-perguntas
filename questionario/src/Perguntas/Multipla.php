<?php


class Multipla implements IPergunta
{
  public $texto;
  public $respostas = [];
  public $alternativas = [];

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
    echo "\n\nPergunta Multipla :: Multiplas respostas certas (Checkbox)\n";
    echo "$this->texto\n";
    foreach ($this->alternativas as $k => $alternativa) {
      $aux = $alternativa->show();
      echo "\t" . $k . ' - ' . $aux . "";
    }
  }

  private function isRightsAnswers()
  {
    $isRightSize = array_filter($this->alternativas, function ($alt) {
      return $alt->isTrue == true;
    });

    return $isRightSize;
  }

  // Faz um loop sobre as respostas certas.
  public function waitAwswer()
  {
    $size = count($this->isRightsAnswers());
    $count = 0;

    do {
      $respCont = $count + 1;
      $resposta = (int) readline("Informe a opção {$respCont}: ");
      $keyExists = array_key_exists($resposta, $this->alternativas);

      if ($keyExists) {
        $this->respostas[] = $resposta;
        $count++;
      } else {
        echo "Opção inválida!\n";
        echo $this->show();
      }
    } while ($count < $size);

    return $this->respostas;
  }

  public function verify()
  {
    $aux = [];
    $rightsAnswers = count($this->isRightsAnswers());

    foreach ($this->respostas as $key) {

      $keyExists = array_key_exists($key, $this->alternativas);
      if (!$keyExists) {
        return 0;
      }


      if ($this->alternativas[$key]->isTrue == true) {
        $aux[] = $key;
      };
    }

    $auxSize = count($aux);
    return ($auxSize == $rightsAnswers) ? 1 : 0;
  }
}
