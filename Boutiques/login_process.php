<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Validación de usuarios
if ($username == 'nikte' && $password == 'PUDINESDEFRESA') {
    $_SESSION['user_id'] = 1; // Asigna una sesión ficticia para nikte
    header("Location: index11.php");
} elseif ($username == 'josueito' && $password == 'PANESDEPUDIN') {
    $_SESSION['user_id'] = 2; // Asigna una sesión ficticia para josueito
    header("Location: index11.php");
} else {
    echo "Usuario o contraseña incorrectos. <a href='login.php'>Intentar de nuevo</a>";
}
?>
