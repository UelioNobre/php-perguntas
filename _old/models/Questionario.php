<?php
class Questionario
{
  private $perguntas = [];
  private $respostas = [];

  public function __construct()
  {
    print("Criando um novo questionário.\n");
  }

  public function addPergunta($pergunta)
  {
    $this->perguntas[] = $pergunta;
  }

  /**
   * Exibe o questionário.
   */

  public function show()
  {
    print("Exibindo as perguntas.\n");

    foreach ($this->perguntas as $pergunta) {
      $titulo = $pergunta->texto;
      $alternativas = $pergunta->mostrarAlternativas();

      print("\n\n");
      print("$titulo\n");
      print("\n");
      print("$alternativas\n");
      print("\n\n");

      // recebe a(s) resposta(s) do usuário.
      $resposta = $pergunta->waitResposta();


      // conferindo a(s) resposta(s) do usuário.
      $this->respostas[] = $pergunta->conferirResposta($resposta);

      // salva o status do questionario.
      print("\n\n");
      var_dump($this->respostas);
      print("\n\n");


      // espera o usuário digitar uma opção.

    }
  }
}
