<?php
// Destruye la sesión del usuario y elimina las cookies del usuario
// para permitir el acceso con otro usuario

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
    // Destruyo la sesión del usuario
    session_destroy();
    
    // elimino las cookies
    if (isset($_COOKIE['usuario'])){
        setcookie('usuario',"", time()-1800);
    }
    if (isset($_COOKIE['clave'])){
        setcookie('clave',"", time()-1800);
    }
    if (isset($_COOKIE['fecha'])){
        setcookie('fecha',"", time()-1800);
    }
    if (isset($_COOKIE['hora'])){
        setcookie('hora',"", time()-1800);
    }
    header("Location: http://localhost:8080/index.php");