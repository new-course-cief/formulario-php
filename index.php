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
<?php

 if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
} else {
    $nombre = "";
};

if (isset($_POST['apellido'])) {
    $apellido = $_POST['apellido'];
  } else {
    $apellido = "";
};
  

if (isset($_POST['fecha_nacimiento'])) {
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
} else {
    $fecha_nacimiento = "";
}

if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];
} else {
    $correo = "";
}

if (isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
} else {
    $telefono = "";
}

if (isset($_POST['direccion'])) {
    $direccion = $_POST['direccion'];
} else {
    $direccion = "";
}

if (isset($_POST['provincia'])) {
    $provincia = $_POST['provincia'];
} else {
    $provincia = "";
}

if (isset($_POST['codigo_postal'])) {
    $codigo_postal = $_POST['codigo_postal'];
} else {
    $codigo_postal = "";
}

if (isset($_POST['numero_tarjeta'])) {
    $numero_tarjeta = $_POST['numero_tarjeta'];
} else {
    $numero_tarjeta = "";
}

if (isset($_POST['dni'])) {
    $dni = $_POST['dni'];
} else {
    $dni = "";
}

if (isset($_POST['sexo'])) {
    $sexo = $_POST['sexo'];
} else {
    $sexo = "";
}

if (isset($_POST['terminos'])) {
    $terminos = $_POST['terminos'];
} else {
    $terminos = "";
}; 

/* looping through each input to rmeove warning message  */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   /*  $inputs = array('nombre', 'apellido', 'fecha_nacimiento', 'correo', 'telefono', 'direccion', 'provincia', 'codigo_postal', 'numero_tarjeta', 'dni', 'sexo', 'terminos');

    foreach ($inputs as $input) {
    if (isset($_POST[$input])) {
        ${$input} = $_POST[$input];
    } else {
        ${$input} = "";
    }
    } */

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["miImagen"]["name"]);
   

    /* $target_file = $target_dir . basename($_FILES["miImagen"]["name"]); */
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["miImagen"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    /*  if ($_FILES["miImagen"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    } */

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["miImagen"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["miImagen"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
}

?>
 
    

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css?v=3">
    <title>Regristration Form</title>
</head>
<body>

    <div class="notification">
        <p class="notification-message"></p>
    </div>

    <h2>registro usuario</h2>
    <div class = "inputs-container">
       
        <form method="POST" action="index.php" enctype="multipart/form-data">
            <div class="name-surname">
                <div class="input-label">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" >
                </div>

                <div class="input-label">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" >
                </div>
            </div>
           

            <div class="input-label">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
            </div>

            <div class="input-label">
                <label for="correo">Correo electrónico:</label>
                <input type="email" name="correo" id="correo" >
            </div>

            <div class="input-label">
                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono">
            </div>

            <div class="input-label">
                <label for="direccion">Dirección postal:</label>
                <input type="text" name="direccion" id="direccion">
            </div>
            <div class="provincia-cp">
                <div class="input-label">
                    <label for="provincia">Provincia:</label>
                    <select name="provincia" id="provincia" >
                        <option value="Barcelona">Barcelona</option>
                        <option value="Tarragona">Tarragona</option>
                        <option value="Lleida">Lleida</option>
                    </select>
                </div>

                <div class="input-label">
                    <label for="codigo_postal">Código postal:</label>
                    <input type="text" name="codigo_postal" id="codigo_postal">
                </div>
            </div>

           

            <div class="input-label">
                <label for="numero_tarjeta">Número de tarjeta de crédito:</label>
                <input type="text" name="numero_tarjeta" id="numero_tarjeta">
            </div>

            <div class="input-label">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni">
            </div>

            <div class="sexo-e-imagen">
            <div class="input-label">
                <label for="imagen" >Sube Imagen:</label>
                <input type="file" name="miImagen" id="imagen" >
            </div>
            <div class="input-label">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option value="femenino">Femenino</option>
                    <option value="masculino">Masculino</option>
                    <option value="masculino">Otros</option>
                </select>
            </div>
            </div>
            

            <div class="checkbox-container">
                <input type="checkbox" name="terminos" id="terminos">
                <label for="terminos">Acepto los términos y condiciones</label>
            </div>

            <button type="submit">
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                    </svg>
                    </div>
                </div>
                <span>Enviar</span>
            </button>
        </form>

    </div>
      
    <h2>datos directamente de post</h2>
    <div class ="business-card">
        <div><img src="<?php echo $target_file?>" alt="My Image"></div>
        <div>
            <p>nombre: <?php echo $nombre. ' ' . $apellido ?></p>
            <p>correo: <?php echo $correo ?></p>
            <p>telefono: <?php echo $telefono ?></p>
            <p>direccion: <?php echo $direccion. ' ' .$codigo_postal. ' ' .$provincia ?></p>
            <p>sexo: <?php echo $sexo ?></p>
        </div>   
   </div>
    <h2>Datos de Base de Datos</h2>
   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registerform";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO user_register (nombre, apellido, fecha_nacimiento, correo, telefono, direccion, provincia, codigo_postal, numero_tarjeta, dni, imagen, sexo, terminos)
        VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$correo', '$telefono', '$direccion', '$provincia', '$codigo_postal', '$numero_tarjeta', '$dni', '$target_file', '$sexo', '$terminos')";
        
    
        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
   }
    
   
   ?>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registerform";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id, nombre, apellido, fecha_nacimiento, correo, telefono, direccion, provincia, codigo_postal, numero_tarjeta, dni, imagen, sexo, terminos FROM user_register";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row

    /* $row is an associative array(it's representin gin this case the data of user(database row)) representing a single row in the result set, 
    $field takes the field name... e.g email, id etc
    $value is the corresponding value to each $field(field). */

    while ($row = mysqli_fetch_assoc($result)) {         
            echo '<div class="business-card">';
            echo '<div><img src="' . $row['imagen'] . '" alt="My Image"></div>';
            echo '<div>';
                echo '<p>nombre: ' . $row['nombre'] . ' ' . $row['apellido'] . '</p>';
                echo '<p>correo: ' . $row['correo'] . '</p>';
                echo '<p>telefono: ' . $row['telefono'] . '</p>';
                echo '<p>direccion: ' . $row['direccion'] . ', ' . $row['codigo_postal'] . ', ' . $row['provincia'] . '</p>';
                echo '<p>sexo: ' . $row['sexo'] . '</p>';
                echo '<span class="modifier-forms">';
                    echo '<form method="post" action="delete.php" class="data-form delete-data-form">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<button type="submit">Delete</button>';
                    echo '</form>'; 
                    echo '<form method="get" action="edit.php" class="data-form edit-data-form">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<button type="submit">Edit</button>';
                    echo '</form>'; 
                echo '</span>';
            echo '</div>';
        echo '</div>';
      
       
   
    }

    
    }
    else {
    echo "0 results";
    }

    mysqli_close($conn);
    ?>
</body>
</html>