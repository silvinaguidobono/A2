<?php
// Destruye la sesión del usuario
// Va al formulario de acceso si no tengo usuario en cookies
// Va a usuario recordado si tengo usuario en cookies

    session_start();
    /*
    // elimino las variables de sesión
    if (isset($_SESSION['usuario'])){
        unset($_SESSION['usuario']);
    }
    if (isset($_SESSION['clave'])){
        unset($_SESSION['clave']);
    }
    */
    // Destruye la sesión del usuario
    session_destroy();
    
    header("Location: http://localhost:8080/index.php");