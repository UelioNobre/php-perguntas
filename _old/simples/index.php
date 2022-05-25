<?php

require('index2.php');

class Questionario
{
  public $perguntas = [];
  public $resultados = [];

  public function addPergunta($pergunta)
  {
    $this->perguntas[] = $pergunta;
  }

  public function getPerguntas()
  {
    return $this->perguntas;
  }

  public function show()
  {

    print "Este questionário tem " . count($this->perguntas) . " perguntas.\n";

    foreach ($this->getPerguntas() as $k => $p) {
      print("Pergunta " . ($k + 1) . "/" . count($this->perguntas) . "\n");
      $p->showPergunta();

      // Se a pergunta for de multipla escolha,
      // Pede para o usuário informar mais dados.

      if ($p->isMultiple) :
        $respostas = [];

        // filtra a quantidade de respostas certas.
        $respostas_certas = array_filter($p->alternativas, function ($a) {
          return $a->isTrue;
        });

        // Itera sobre a quantidade de respostas encontradas.
        for ($i = 0; $i < count($respostas_certas); $i++) {
          $resposta = (int) readline("Digite a alternativa " . ($i + 1) . ": ");
          $respostas[] = $resposta;
        }

        $resultado = $p->confere($respostas);
        $this->resultados[] = $resultado;

      // Confere a resposta.

      else : // Calcula a resposta multipla.

        // Espera a(s) resposta(s) do usuário.
        $resposta = (int)readline("Informe a alternativa correta: ");

        // Processa a resposta do usuário.
        $resultado = $p->confere($resposta);

        print('Opção informada: ' . $resposta . PHP_EOL);
        print("\n\n");

        $this->resultados[] = $resultado;
      endif;
    }

    // Exibe o resultado
    print_r($this->resultados);

    // soma os resultados
    $soma = array_sum($this->resultados);
    print("Você acertou " . $soma . " de " . count($this->perguntas) . " perguntas.\n");

    print("Fim do questionário." . PHP_EOL);
  }
}

$questionario = new Questionario();

$p1 = new Pergunta();
$p1->texto = "Qual a capital do Ceará?";
$p1->isRandom = true;

$alt01 = new Alternativas("Fortaleza", true);
$alt02 = new Alternativas("Juazeiro do Norte");
$alt03 = new Alternativas("Crato");
$p1->addAlternativas($alt01);
$p1->addAlternativas($alt02);
$p1->addAlternativas($alt03);

$p2 = new Pergunta();
$p2->texto = "Qual o maior pais da America do Sul?";
$alt01 = new Alternativas("Uruguai");
$alt02 = new Alternativas("Peru");
$alt03 = new Alternativas("Brasil", true);
$p2->addAlternativas($alt01);
$p2->addAlternativas($alt02);
$p2->addAlternativas($alt03);


// Multipla escolha.
$p3 = new Pergunta();
$p3->texto = "Quais desses é um pseudofruto?\nEscolha dois.";
$p3->isMultiple = true;

$alt01 = new Alternativas("Laranja", false);
$alt02 = new Alternativas("Maçã", true);
$alt03 = new Alternativas("Caju", true);
$p3->addAlternativas($alt01);
$p3->addAlternativas($alt02);
$p3->addAlternativas($alt03);

// $questionario->addPergunta($p1);
// $questionario->addPergunta($p2);
$questionario->addPergunta($p3);
$questionario->show();
