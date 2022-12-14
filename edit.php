<?php

/** @var mysqli $db */
include "include/connection.php";


$Id=$_GET['editid'];
$sql="SELECT * FROM testklanten WHERE Id=$Id";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$Naam=$row['Naam'];
$Achternaam=$row['Achternaam'];
$Email=$row['Email'];


if(isset($_POST['submit'])) {
    $Naam = $_POST['Naam'];
    $Achternaam = $_POST['Achternaam'];
    $Email = $_POST['Email'];

    $sql = "UPDATE testklanten SET Naam='$Naam',Achternaam='$Achternaam',Email='$Email' WHERE Id=$Id";
    echo"$sql";
    $result = mysqli_query($db, $sql);

    if ($result) {
    header('Location: overzicht.php');
//        echo "upda succ";
    } else {
        die(mysqli_error($db));
    }
//Close connection
    mysqli_close($db);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Update</title>
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4">Update klant</h1>
<form method="post">
    <div class="field">
        <label class="label">Naam</label>
        <div class="control">
            <label>
                <input class="input" type="text" placeholder="Naam" name="Naam" value=<?php echo "$Naam"; ?> >
            </label>
        </div>
    </div>
    <div class="field">
        <label class="label">Achternaam</label>
        <div class="control">
            <label>
                <input class="input" type="text" placeholder="Achternaam" name="Achternaam" value=<?php echo "$Achternaam"; ?>>
            </label>
        </div>
    </div>

    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <label>
                <input class="input" type="email" placeholder="Email" name="Email" value=<?php echo "$Email"; ?>>
            </label>
        </div>
    </div>

    <div class="control">
        <div class="control">
            <button class="button is-primary" name="submit" type="submit">Update</button>
        </div>
    </div>

</form>
</div>
</body>
</html>
