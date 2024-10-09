<?php
require("conexion.php");
$conexion = retornarConexion();
if (!isset($_POST['email'], $_POST['password_user'])) {

    // si no hay datos muestra error y re direccionar

    header('Location:../login.php');
}

// evitar inyección sql

if ($stmt = $conexion->prepare('SELECT email,password_user FROM usuarios WHERE email = ?')) {

    // parámetros de enlace de la cadena s

    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
}

// acá se valida si lo ingresado coincide con la base de datos

$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($email, $password_user);
    $stmt->fetch();

    // se confirma que la cuenta existe ahora validamos la contraseña

    if ($_POST['password_user'] === $password_user) {

        // la conexion sería exitosa, se crea la sesión

        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['email'];
        
        header('Location:../index.php');
    }
} else {
    // usuario incorrecto
    echo "no";
    header('Location:../login.php');
}

