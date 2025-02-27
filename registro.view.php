<?php
// Verificar que se haya recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    // $datos = json_decode(file_get_contents("php://input"), true);

    // Realizar cualquier procesamiento adicional aquí (guardar en la base de datos, enviar por correo electrónico, etc.)

    // Datos de conexión a la base de datos
    $servername = "localhost"; // Nombre del servidor de la base de datos
    $username = "root"; // Nombre de usuario de la base de datos
    $password = ""; // Contraseña de la base de datos
    $dbname = "pet-stylo"; // Nombre de la base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    
    // Datos a insertar
    $correo = $_POST['correo'];
    $estatura = $_POST['estatura'];
    $nombre = $_POST['nombre'];
    $nombre_mascota = $_POST['nombre_mascota'];
    $peso = $_POST['peso'];
    $raza = $_POST['raza'];
    $telefono = $_POST['telefono'];

    // Consulta SQL para insertar datos
    $sql = "INSERT INTO usuario (correo, estatura, nombre, nombre_mascota, peso, raza, telefono)
    VALUES ('$correo', '$estatura', '$nombre', '$nombre_mascota', '$peso', '$raza', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();

    // Devolver una respuesta JSON
    // echo json_encode(array("message" => "Datos recibidos correctamente lo hizo felipe", "data" => $datos));
} else {
    // Si no es una solicitud POST, devolver un error
    // http_response_code(405); // Método no permitido
    // echo json_encode(array("error" => "Método no permitido"));
    echo "algo pasó";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="petshop" content="pet products and services">
  <title>Pet stylo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <style>
    .registro {
      background: linear-gradient(#70d0df, #e2e2e2, #70d0df);
    }
  </style>
</head>

<body>
  <header class="navbar navbar-expand-sm fondoHeader">
    <div class="container-fluid">
      <!--Icono-->
      <a class="navbar-brand" href="#">
        <img class="logo" src="Pictures/logo sin fondo.png" alt="">
      </a>
      <!--Icono menu-->
      <button style="background-color: #ee8133;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--Elementos del menu colapsable-->
      <div style="background-color: #70d0df;" class="collapse navbar-collapse rounded p-4" id="menu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Citas</a>
          </li>
          <li class="nav-item dropdown">
            <a style="background-color: #ee8133;" class="btn nav-link dropdown-toggle" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown">Horarios</a>
            <ul class="dropdown-menu">
              <li class="dropdown-item">Lunes a Viernes: 8:00am a 6:00pm</li>
              <li class="dropdown-item">Sabados y Domingos: 11:00am  a 4:00pm</li>
            </ul>
          </li>
        </ul>
        <a class="d-flex ms-auto" href="">Inicia sesion</a>
      </div>
    </div>
    <!--formulario-->
  </header>
  <section>
    <div class="registro container mt-5 p-4 rounded">
      <h1>Registro de Datos</h1>
      <form class="formulario" action="" method="POST">
        <div class="form-group">
          <label for="nombre">Nombre :</label>
          <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Escribe tu nombre"> 
          <span style="display: none;" class="advertencia">campo nombre obligatorio</span>
        </div>
        <div class="form-group">
          <label for="email">Correo Electrónico:</label>
          <input name= "correo" type="email" class="form-control" id="email" value="<?php echo "Correo de la db"?>" placeholder="Escribe tu correo electrónico">
          <span style="display: none;" class="advertencia">campo correo obligatorio</span>
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono:</label>
          <input name="telefono" type="tel" class="form-control" id="telefono" placeholder="Escribe tu número de teléfono">
          <span style="display: none;" class="advertencia">campo telefono obligatorio</span>
        </div>
        <div class="form-group">
          <label for="estatura-mascota">Estatura de tu mascota:</label>
          <input name="estatura"type="text" class="form-control" id="estatura-mascota" placeholder="Estatura de tu mascota">
          <span style="display: none;" class="advertencia">campo estatura obligatorio</span>
        </div>
        <div class="form-group">
          <label for="peso-mascota">Peso de tu mascota:</label>
          <input name="peso" type="text" class="form-control" id="peso-mascota" placeholder="Peso de tu mascota">
          <span style="display: none;" class="advertencia">campo peso obligatorio</span>
        </div>
        <div class="form-group">
          <label for="raza-mascota">Raza de tu mascota :</label>
          <input name="raza"type="text" class="form-control" id="raza-mascota" placeholder="Raza de tu mascota">
          <span style="display: none;" class="advertencia">campo raza obligatorio</span>
        </div>
        <div class="form-group">
          <label for="nombre-mascota">Nombre de mascota:</label>
          <input name="nombre_mascota"type="text" class="form-control" id="nombre-mascota" placeholder="Escribe nombre">
          <span style="display: none;" class="advertencia">campo nombre mascota obligatorio</span>
        </div>
        <button type="submit" id ="boton" class="btn btn-primary">Registrar</button>
      </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <!-- <script src="script.js"></script> -->
  </section>
</body>

</html>