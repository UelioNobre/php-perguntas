<?php
// require "src/Alternativa.php.php";
require "src/Pergunta.php";
require "src/Perguntas/PerguntaFactory.php";
require "src/Questionario.php";

require "src/Perguntas/Alternativa.php";
require "src/Perguntas/AlternativaInput.php";

$perguntaFactory = new PerguntaFactory();

// //--- PERGUNTA 1
$tipo = "Dicotomica";
$texto = "Masculino é feminino?";
$pergunta1 = $perguntaFactory->create($tipo, $texto);

$sim = new Alternativa("Sim");
$nao = new Alternativa("Nao", true);
$pergunta1->addAlternativa($sim);
$pergunta1->addAlternativa($nao);

// --- PERGUNTA 2
$tipo = "Multipla";
$texto = "Estados da Região Nordeste.";
$pergunta2 = $perguntaFactory->create($tipo, $texto);

$ceara = new Alternativa("Ceará", true);
$maranhao = new Alternativa("Maranhão", true);
$amapa = new Alternativa("Amapá", false);
$pergunta2->addAlternativa($ceara);
$pergunta2->addAlternativa($maranhao);
$pergunta2->addAlternativa($amapa);

// --- PERGUNTA 3 - 
$tipo = "Dicotomica";
$texto = "Vermelho é Azul?";
$pergunta3 = $perguntaFactory->create($tipo, $texto);

$sim = new Alternativa("Sim");
$nao = new Alternativa("Nao", true);
$pergunta3->addAlternativa($sim);
$pergunta3->addAlternativa($nao);

// --- PERGUNTA 4 - imput de texto.

$tipo = "InputText";
$texto = "Estado onde nasceu Chico Anísio.";
$pergunta4 = $perguntaFactory->create($tipo, $texto);

$input = new AlternativaInput("", "ceara");
$pergunta4->addAlternativa($input);

// --- FECHA AS PERGUNTAS.

$text = "Cidades e estados do Nordeste do Brasil.";
$questionario = new Questionario($text);
$questionario->addPergunta($pergunta1);
$questionario->addPergunta($pergunta2);
$questionario->addPergunta($pergunta3);
$questionario->addPergunta($pergunta4);




// $questionario->show();

echo "\nExecução: \n---------------------------\n\n";
$questionario->run();

echo "\nValidadando questionário...:\n";
$questionario->verify();

echo "\nResultados: \n---------------------------\n\n";
$questionario->results();
