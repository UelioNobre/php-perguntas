<?php



class InputText implements IPergunta
{
  public $texto;
  public $resposta;
  public $alternativa;

  public function __construct($texto = "")
  {
    $this->texto = $texto;
  }

  public function addAlternativa($alternativa)
  {
    $this->alternativa = $alternativa;
  }

  public function show()
  {
    echo "$this->texto\n";
  }


  // Faz um loop sobre as respostas certas.
  public function waitAwswer()
  {
    $this->resposta = strtolower(trim(fgets(STDIN)));
    return $this->resposta;
  }

  public function verify()
  {
    $isRight = ($this->alternativa->isTrue == $this->resposta);
    return $isRight ? 1 : 0;
  }
}
