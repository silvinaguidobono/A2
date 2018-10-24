<?php
// Destruye la sesión del usuario y elimina las cookies del usuario
// para permitir el acceso con otro usuario

    session_start();
    ini_set('display_errors',1);
    include_once 'lib/helper.php';

    // Destruyo la sesión del usuario
    session_destroy();
    
    // elimino las cookies
    eliminar_cookies();
        
    // voy a la página principal de la aplicación
    header("Location: index.php");