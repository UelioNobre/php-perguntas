<?php

class Questionario
{
  private $texto;
  private $perguntas = [];
  private $respostas = [];

  public function __construct($texto = "")
  {
    // echo "Um questionário foi criado.\n";
    $this->texto = $texto;
  }

  /**
   * Adiciona perguntas ao questionário.
   */
  public function addPergunta(IPergunta $pergunta)
  {
    $this->perguntas[] = $pergunta;
  }

  /**
   * Exibe o questionário - somente leitura.
   *
   * @return void
   */
  public function show()
  {
    echo "Exibindo as perguntas questionário.\n";
    foreach ($this->perguntas as $pergunta) {
      $pergunta->show();
    }
  }

  // Run form
  public function run()
  {
    foreach ($this->perguntas as $pergunta) {
      $pergunta->show();
      $pergunta->waitAwswer();
    }
  }

  // Verify the answers.
  public function verify()
  {
    foreach ($this->perguntas as $pergunta) {
      $this->respostas[] = [$pergunta, $pergunta->verify()];
    }
  }

  // Show the results.
  public function results()
  {
    echo "Resultados do questionário.\n";
    foreach ($this->respostas as $k => $r) {
      $pergunta = $r[0];
      $resposta = $r[1];
      $isAssert = ($resposta === 1) ? "Correta" : "Incorreta";

      echo $pergunta->texto . "\n";
      echo "Resposta: " . $isAssert . "\n\n";
    }


    $perguntasCertas = array_filter($this->respostas, function ($r) {
      if ($r[1] > 0) {
        return $r;
      }
    });

    echo "Total de perguntas: " . count($this->perguntas) . "\n";
    echo "Total de acertos: " . count($perguntasCertas) . "\n";
  }
}
