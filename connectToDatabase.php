<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "registerform";

    $conn = mysqli_connect($serverName, $userName, $password, $databaseName);

    if (!$conn) {
       die(mysqli_connect_error());
    }
    echo "<h1>connection successful</h1>";
?>

<!-- create a table -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registerform";

try {
  $conncreate = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conncreate->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS user_register (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    fecha_nacimiento DATE,
    correo VARCHAR(100),
    telefono VARCHAR(20),
    direccion VARCHAR(150),
    provincia VARCHAR(50),
    codigo_postal VARCHAR(10),
    numero_tarjeta VARCHAR(20),
    dni VARCHAR(20),
    imagen VARCHAR(150),
    sexo ENUM('Masculino','Femenino','Otro'),
    terminos BOOLEAN
  )";

  // use exec() because no results are returned
  $conncreate->exec($sql);
  echo "Table created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

<!-- rertieve data from the database  -->

