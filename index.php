<?php
include_once 'common.php';
include_once 'db.php';

ini_set('session.use_only_cookies', 1);
// ini_set('session.auto_start', 1);

session_start();

$PATH = $_SERVER['REQUEST_URI'];
$METHOD = $_SERVER['REQUEST_METHOD'];

// pr($_SERVER);
// pr($PATH);

// Pretty print
function pr($data)
{
    echo "<pre>";
    print_r($data); // or var_dump($data);
    echo "</pre>";
}

// readfile('search.html');

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Declare  character set, metadata, title and linking style.css stylesheet -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Find the best camping sites near you ">
    <meta name="keywords" content="camping, camp sites, camping sites, campfire, CampFire">
    <meta name="author" content="Teodor Tomescu">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CampFire | Welcome!</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/scripts/app.js"></script>
</head>
<body>
    <!-- Create header -->
    <?php include './header.php'?>
    <?php 
        if ($PATH === '/' || strpos($PATH, '/index.php') === 0) {
            include 'search.php';
        } else if (strpos($PATH, '/results') === 0) {
            include 'results.php';
        } else if (strpos($PATH, '/campsite') === 0) {
            include 'campsite.php';
        } else if (strpos($PATH, '/login') === 0) {
            include 'login.php';
        } else if (strpos($PATH, '/logout') === 0) {
            include 'logout.php';
        } else if (strpos($PATH, '/signup') === 0) {
            include 'signup.php';
        } else if (strpos($PATH, '/submit') === 0) {
            include 'submit.php';
        } 
    ?>
    
    <!-- Create footer -->
    <?php include './footer.php'?>
</body>
</html>