<?php
/** @var mysqli $db */

//Require DB settings with connection variable
require_once "include/connection.php";

?>
<!doctype html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css">
</head>

<body>
<div class="container px-4">
    <h1 class="title mt-4">Klant overzicht</h1>
    <table class="table is-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Naam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php
     $sql="SELECT * from testklanten";
     $result=mysqli_query($db,$sql);
     if ($result){
         while ($row=mysqli_fetch_assoc($result)){
             $Id=$row['Id'];
             $Naam=$row['Naam'];
             $Achternaam=$row['Achternaam'];
             $Email=$row['Email'];

             echo
                 '<tr>
                    <th scope ="row">'.$Id.'</th>
                    <td>'.$Naam.'</td>
                    <td>'.$Achternaam.'</td>
                    <td>'.$Email.'</td>
                     <td>
                    <a href="detail.php?detailid='.$Id.'"><i class="material-icons">visibility</i></a>
                    <a href="edit.php?editid='.$Id.'"><i class="material-icons">edit</i></a>
                    <a href="delete.php?deleteid='.$Id.'"><i class="material-icons">delete</i></a>
                     </td>
                 </tr>';
         }
     }
         ?>
        <tr>
            <td>
                <a href="create.php"><i class="material-icons">person_add</i></a>
<!--                <button><a href="create.php"><i class="material-icons">person_add</i></a></button>-->
            </td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="6" class="has-text-centered">&copy; Klanten</td>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>