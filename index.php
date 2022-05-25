<?php

require_once 'models/Pergunta.php';
require_once 'models/Questionario.php';
require_once 'models/Alternativa.php';


$p1 = new Pergunta("Quais desses são pseudofrutos?");
$p2 = new Pergunta("Qual o resultado da soma de 2+2?");

$questionario = new Questionario();
$questionario->addPergunta($p1);
$questionario->addPergunta($p2);

// // Deve mostrar o questionario.
$questionario->show();

// // Deve calcular as respostas.
// $questionario->calculate();

// // Deve executar um questionário.
// $questionario->run();
