<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "registerform";

    $conn = mysqli_connect($serverName, $userName, $password, $databaseName);

    if (!$conn) {
       die(mysqli_connect_error());
    }
    echo "<h2>connection successful</h2>";
?>

<!-- create a table -->


<!-- rertieve data from the database  -->

