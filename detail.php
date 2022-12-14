<?php
/** @var mysqli $db */

//Require database in this file
require_once "include/connection.php";

//Retrieve the GET parameter from the 'Super global'
$Id = mysqli_escape_string($db, $_GET['detailid']);

//Get the record from the database result
$query = "SELECT * FROM testklanten WHERE Id ='$Id'";
$result = mysqli_query($db, $query)
or die ('Error: ' . $query );

if(mysqli_num_rows($result) != 1)
{
    // redirect when db returns no result
    header('Location: overzicht.php');
    exit;
}

$testklanten = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="css/style.css">
    <title>View</title>
</head>
<body>
<div class="container px-4">
<!--    <h1 class="title mt-4">klant</h1>-->
    <h1 class="title mt-4">klant ID = <?= $testklanten['Id'] ?></h1>
    <section class="content">
        <ul>
            <li>Naam: <?= $testklanten['Naam'] ?></li>
            <li>Achternaam: <?= $testklanten['Achternaam'] ?></li>
            <li>Email: <?= $testklanten['Email'] ?></li>
        </ul>
    </section>
    <div>
        <a class="button" href="overzicht.php">Terug</a>
    </div>
</div>
</body>
</html>