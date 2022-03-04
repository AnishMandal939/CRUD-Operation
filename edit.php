<?php
error_reporting(0);

$servername = "localhost";
$username = "admin";
$password = "admin";
$database = "crud";

// create a connection object

$con = mysqli_connect($servername, $username, $password, $database);


if(!$con){
    die("connecting to database failed");
}
else{
// echo "Connection was successful";
}

if(isset($_POST['sub'])){

    if(isset($_POST['srno'])){
        $srno = $_POST['srno'];
        $newtitle = $_POST['newtitle'];
        $newdescr = $_POST['newdescr'];

        $sqledit = "UPDATE `crud`.`notes` SET `Sr.No` = $srno, `title` = '$newtitle', `descr` = '$newdescr', `Time` = NOW() WHERE `notes`.`Sr.No` = $srno;";

        mysqli_query($con, $sqledit);

        header("Location: ./index.php");

mysqli_close($con);
    }
}

?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing in CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Edit Note Info</h1>
    <a href="./index.php"><button class="sub">Go Back</button></a>
    <hr>
    <br>
    <form class="main-wrapper" action="edit.php" method="POST">
        Enter Sr.No of which you want to edit:<br>
        <input class="int" placeholder="select serial number" type="number" name="srno" required=""><br>

        Enter new title:<br>
        <input class="int" placeholder="Enter New Title" type="text" name="newtitle" required=""><br>

        Enter new Description:<br>
        <input class="int" placeholder="Enter New Description" type="text" name="newdescr" required=""><br>
        <hr>
        <button type="submit" class="sub" name="sub">Update notes</button>


    </form>

</body>

</html>
