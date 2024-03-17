<?php
require '../vendor/autoload.php';
session_start();

use Dotenv\Dotenv;
use GuzzleHttp\Client;

$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $rec = htmlspecialchars($_POST['rec']);

    $apiUrl = getenv('GPT_API_URL');
    $apiKey = getenv('GPT_API_KEY');
    $model = getenv('GPT_MODEL');

    $data = [
        "model" => $model,
        "messages" => [
            [
                "role" => "system",
                "content" => "Ти - шеф-повар. Твоїй подрузі $name потрібен простий кулінарний рецепт розміром від 100 до 200 слів, у якому пристуні інгредієнти: $rec. Відповідай грамотною українською мовою. Якщо $rec не стосується кулінарії , то не давай рецепт, а повідом про те, що введений інгредієнт не стосується кулінарії. Ти повинен надати рецепт у вигляді тексту. На кожен інгредієнт повинно бути надано кількість та порядок його використання. Якщо рецепт не можливо скласти, повідом про це. Якщо інгредієнт $rec не є основним, просто надай самий популярний рецепт з його використанням. Якщо $rec - це назва готової страви, то надай популярний рецепт на неї, але попередь, що це не інгредієнт."
            ]
        ],
    ];

    $client = new Client();

    $response = $client->request('POST', $apiUrl, [
        'headers' => [
            'Authorization' => 'Bearer '.$apiKey,
            'Content-Type' => 'application/json',
        ],
        'json' => $data,
    ]);

    $body = $response->getBody();
    $_SESSION['name'] = $name;
    $_SESSION['response'] = json_decode($body, true)['choices'][0]['message']['content'];
    header('Location: index.php');
    exit;
}
