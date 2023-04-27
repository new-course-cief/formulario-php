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
</body>
</html>
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
     };

     if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user_register WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              
                echo '
            <form method="POST" action="index.php" enctype="multipart/form-data" class="edit-form">
                    <div class="name-surname">
                        <div class="input-label">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" value="'.$row["nombre"].'">
                        </div>
                        <div class="input-label">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" id="apellido" value="'.$row["apellido"].'">
                        </div>
                    </div>
                    <div class="input-label">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="'.$row["fecha_nacimiento"].'">
                    </div>
                    <div class="input-label">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" name="correo" id="correo" value="'.$row["correo"].'">
                    </div>
                    <div class="input-label">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" name="telefono" id="telefono" value="'.$row["telefono"].'">
                    </div>
                    <div class="input-label">
                        <label for="direccion">Dirección postal:</label>
                        <input type="text" name="direccion" id="direccion" value="'.$row["direccion"].'">
                    </div>
                    <div class="provincia-cp">
                        <div class="input-label">
                            <label for="provincia">Provincia:</label>
                            <select name="provincia" id="provincia">
                                <option value="Barcelona" '.(($row["provincia"]=="Barcelona")?"selected":"").'>Barcelona</option>
                                <option value="Tarragona" '.(($row["provincia"]=="Tarragona")?"selected":"").'>Tarragona</option>
                                <option value="Lleida" '.(($row["provincia"]=="Lleida")?"selected":"").'>Lleida</option>
                            </select>
                        </div>
                        <div class="input-label">
                            <label for="codigo_postal">Código postal:</label>
                            <input type="text" name="codigo_postal" id="codigo_postal" value="'.$row["codigo_postal"].'">
                        </div>
                    </div>
                    <div class="input-label">
                        <label for="numero_tarjeta">Número de tarjeta de crédito:</label>
                        <input type="text" name="numero_tarjeta" id="numero_tarjeta" value="'.$row["numero_tarjeta"].'">
                    </div>
                    <div class="input-label">
                        <label for="dni">DNI:</label>
                        <input type="text" name="dni" id="dni" value="'.$row["dni"].'">
                    </div>
                    <div class="sexo-e-imagen">
                    <div class="input-label">
                        <label for="imagen" >Sube Imagen:</label>
                        <input type="file" name="miImagen" id="imagen" value="' . $row["imagen"] . '">
                    </div>
                    <div class="input-label">
                        <label for="sexo">Sexo:</label>
                        <select name="sexo" id="sexo">
                            <option value="femenino"' . ($row["sexo"] == "femenino" ? ' selected="selected"' : '') . '>Femenino</option>
                            <option value="masculino"' . ($row["sexo"] == "masculino" ? ' selected="selected"' : '') . '>Masculino</option>
                            <option value="otros"' . ($row["sexo"] == "otros" ? ' selected="selected"' : '') . '>Otros</option>
                        </select>
                    </div>
                </div>
            
                <div class="checkbox-container">
                    <input type="checkbox" name="terminos" id="terminos"' . ($row["terminos"] == "on" ? ' checked="checked"' : '') . '>
                    <label for="terminos">Acepto los términos y condiciones</label>
                </div>
            
                <form method="post" action="delete.php" class="data-form delete-data-form">
                <input type="hidden" name="id" value="' . $row['id'] . '">
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

                </form>      
             ' ;  
            }
        } else {
            echo 'No results found';
        }
        
     }


     // Check if the form has been submitted
    /*  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $provincia = $_POST['provincia'];
        $codigo_postal = $_POST['codigo_postal'];
        $numero_tarjeta = $_POST['numero_tarjeta'];
        $dni = $_POST['dni'];
        $imagen = $_POST['imagen'];
        $sexo = $_POST['sexo'];
        $terminos = $_POST['terminos'];

        // Update the database record
        $sql = "UPDATE user_register SET 
                    nombre='$nombre', 
                    apellido='$apellido', 
                    fecha_nacimiento='$fecha_nacimiento', 
                    correo='$correo', 
                    telefono='$telefono', 
                    direccion='$direccion', 
                    provincia='$provincia', 
                    codigo_postal='$codigo_postal', 
                    numero_tarjeta='$numero_tarjeta', 
                    dni='$dni', 
                    imagen='$imagen', 
                    sexo='$sexo', 
                    terminos='$terminos' 
                WHERE id='$id'";
                
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    // Close the database connection
    mysqli_close($conn); */
    ?>
