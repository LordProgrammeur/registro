<?php

require_once 'config/database.php';

class UserController {
    private $conn;

    public function __construct() {
        $config = require 'config/database.php';
        $this->conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function showForm() {
        include 'views/register.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $correo = $_POST['correo'];
            $estatura = $_POST['estatura'];
            $nombre = $_POST['nombre'];
            $nombre_mascota = $_POST['nombre_mascota'];
            $peso = $_POST['peso'];
            $raza = $_POST['raza'];
            $telefono = $_POST['telefono'];

            $sql = "INSERT INTO usuario (correo, estatura, nombre, nombre_mascota, peso, raza, telefono)
                    VALUES ('$correo', '$estatura', '$nombre', '$nombre_mascota', '$peso', '$raza', '$telefono')";

            if ($this->conn->query($sql) === TRUE) {
                echo "Datos insertados correctamente";
            } else {
                echo "Error al insertar datos: " . $this->conn->error;
            }
        } else {
            echo "Algo pasó";
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}
