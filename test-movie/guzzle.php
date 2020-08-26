<?php 
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
    'query' => [
        'apikey' => '137b5f53',
        's'      => 'iron man'
    ]//kalau lewat param
]);

$result = json_decode($response->getBody()->getContents(), true);

var_dump($result);

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
</head>
<body>
    <?php foreach($result['Search'] as $movie): ?>
    <ul>
        <li>Title: <?php echo $movie['Title'] ?></li>
        <li>Year : <?php echo $movie['Year'] ?></li>
        <li>
            <img src="<?php echo $movie['Poster'] ?>" width="80" alt="">
        </li>
    </ul>
    <?php endforeach; ?>
</body>
</html>