<?php
// Destruye la sesión del usuario
// Va al formulario de acceso si no tengo usuario en cookies
// Va a usuario recordado si tengo usuario en cookies

    session_start();
    
    // Destruye la sesión del usuario
    session_destroy();
    
    header("Location: index.php");