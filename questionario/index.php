<?php

require_once 'src/Questionario.php';
require_once 'src/Pergunta.php';
require_once 'src/Alternativa.php';

$questionario = new Questionario('Questionário de Teste');

$alt_1 = new Alternativa("Sim");
$alt_2 = new Alternativa("Não", true);

$per_1 = new Pergunta("Masculino é feminino?");
$per_1->addAlternativa($alt_1);
$per_1->addAlternativa($alt_2);

// --

$alt_1 = new Alternativa("Caju", true);
$alt_2 = new Alternativa("Maça", true);
$alt_3 = new Alternativa("Uva");
$alt_3 = new Alternativa("Banana");

$per_2 = new Pergunta("Quais destes é um pseudofruto?");
$per_2->addAlternativa($alt_1);
$per_2->addAlternativa($alt_2);
$per_2->addAlternativa($alt_3);

$questionario->addPergunta($per_1);
$questionario->addPergunta($per_2);

// Mostra o questionário.
// $questionario->show();

// Executa o questionário.
$questionario->run();

// Analisa os resultados.
$questionario->verify();

// Exibe os resultados
$questionario->results();
