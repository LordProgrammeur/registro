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