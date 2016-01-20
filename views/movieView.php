<?php 

    require_once '../connection.php';
    require_once '../model/movies.php';
    
    $imdb_id = $_GET['id'];
    
    $conn = getConnection();
    $movieModel = new Movies($conn);
    $matches = $movieModel->findByMovieId($imdb_id);
    
    if (count($matches) == 1) { 
        $url = "http://www.omdbapi.com/?i={$imdb_id}&tomatoes=true";
        $json = file_get_contents($url);
        $movieData = json_decode($json);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="img/page-icon.png">
    <title>2014 Movie Revenues</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body class="container text-center">
    
    <?php foreach($matches as $match): ?>
        <h1><?=htmlentities($match['title'])?></h1>
        <h3>Released on <?=htmlentities(date("jS F, Y", strtotime($match['released'])))?></h3>
        <h3>There were <?=htmlentities(number_format($match['tickets']))?> tickets sold</h3>
        <h3>It grossed $<?=htmlentities(number_format($match['gross']))?></h3>
        <h3>The runtime is <?=htmlentities($movieData->Runtime)?></h3>
        <h3>Awards: <?=htmlentities($movieData->Awards)?></h3>
        <h2>Rotton Tomatoes Rating</h2>
        <h4>Tomato Meter: <?=htmlentities($movieData->tomatoMeter)?></h4>
        <h4>Tomato Rating: <?=htmlentities($movieData->tomatoRating)?></h4>
        <h4>Consensus: <?=htmlentities($movieData->tomatoConsensus)?></h4>
        <h4>User Meter: <?=htmlentities($movieData->tomatoUserMeter)?></h4>
        <h4>User Rating: <?=htmlentities($movieData->tomatoUserRating)?></h4>
    <?php endforeach; ?>
    
</body>
</html>