<?php
/** @var mysqli $db */
include "include/connection.php";

if(isset($_POST['submit'])){
    $Naam=$_POST['Naam'];
    $Achternaam=$_POST['Achternaam'];
    $Email=$_POST['Email'];

    $sql="INSERT INTO testklanten (Naam,Achternaam,Email) VALUES('$Naam','$Achternaam','$Email')";
    $result=mysqli_query($db,$sql);
    if ($result){
        header('Location: overzicht.php');
    }else{
        die(mysqli_error($db));
    }
    //Close connection
    mysqli_close($db);

//    // Redirect to overzicht.php
//    header('Location: overzicht.php');
//    exit;
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
    <title>Add</title>
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4">Birria bestelling</h1>
<form action="#" method="post">
    <div class="field">
        <label class="label">Naam</label>
        <div class="control">
            <label>
                <input class="input" type="text" placeholder="Naam" name="Naam">
            </label>
        </div>
    </div>
    <div class="field">
        <label class="label">Achternaam</label>
        <div class="control">
            <label>
                <input class="input" type="text" placeholder="Achternaam" name="Achternaam">
            </label>
        </div>
    </div>

    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <label>
                <input class="input" type="email" placeholder="Email" name="Email">
            </label>
        </div>
    </div>

    <div class="control">
<!--        <label class="label">Submit</label>-->
        <div class="control">
            <button class="button is-primary" name="submit" type="submit">Submit</button>
        </div>
    </div>

</form>
</div>
</body>
</html>