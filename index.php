<?php
require_once 'controllers/UserController.php';

$controller = new UserController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->store();
} else {
    $controller->showForm();
}
