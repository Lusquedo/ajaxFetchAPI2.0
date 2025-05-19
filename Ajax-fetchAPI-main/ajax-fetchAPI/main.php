<?php
header('Content-Type: application/json; charset=UTF-8');

// Piadas locais (array)
$piadasLocais = [
    ['setup' => 'Por que o livro de matemática se suicidou?', 'delivery' => 'Porque tinha muitos problemas.'],
    ['setup' => 'O que é um vegetariano que come carne?', 'delivery' => 'Um ex-vegetariano.'],
    ['setup' => 'Por que o computador foi ao médico?', 'delivery' => 'Porque estava com um vírus.'],
    ['setup' => 'O que a parede falou para a outra?', 'delivery' => 'Te encontro na esquina!'],
    ['setup' => 'Como os pássaros se comunicam?', 'delivery' => 'Através de tweets.'],
    ['setup' => 'O que o zero disse para o oito?', 'delivery' => 'Que cinto bonito!']
];

// 50% de chance de usar API local Ou Api Pública
$usarApi = rand(0, 1) === 1;

if ($usarApi) {
    // Tenta buscar piada da API externa
    $apiUrl = 'https://v2.jokeapi.dev/joke/Any?lang=pt';

    $respostaApi = @file_get_contents($apiUrl);

    if ($respostaApi !== false) {
        echo $respostaApi;
        exit;
    }
    
}

$piadaLocal = $piadasLocais[array_rand($piadasLocais)];
echo json_encode($piadaLocal);
?>
