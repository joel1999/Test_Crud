<?php
/** @var mysqli $db */
include "include/connection.php";

//get id halen op mijn index pagina
if (isset($_GET['deleteid'])){
    $Id=$_GET['deleteid'];

    //sql delete query
    $sql="DELETE FROM testklanten WHERE Id =$Id";
    $result=mysqli_query($db,$sql);
    if ($result){
        header('Location: overzicht.php');
    }else{
        die(mysqli_error($db));
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Delete</title>
</head>
<body></body>
</html>
