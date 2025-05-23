<?php
require '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Insertar usuario con foto
    $stmt = $pdo->prepare("INSERT INTO users (nombre, password, telefono, direccion) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $password, $telefono, $direccion]);

    header("Location: ../login.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro en Biblioteca</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<div class="container">
    <h1>Registrate</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="nombre">Usuario</label>
        <input type="text" name="nombre" id="nombre" placeholder="Usuario" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Password" required>

        <label for="telefono">Correo electrónico</label>
        <input type="number" name="telefono" id="telefono" placeholder="Nro Contacto" required>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion" placeholder="Direccion" required>

        <button type="submit">Registrarse</button>
    </form>
</div>