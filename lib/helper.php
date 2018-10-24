<?php
// Función para imprimir los errores contenidos en un vector
function imprime_errores($array_errores){
    foreach ($array_errores as $error) {
        echo $error."<br>";
    }
}

// Función que elimina las cookies para permitir el ingreso con otro usuario
function eliminar_cookies(){
    
    if (isset($_COOKIE['usuario'])){
        setcookie('usuario',"", time()-1800,"/A2");
    }
    if (isset($_COOKIE['clave'])){
        setcookie('clave',"", time()-1800,"/A2");
    }
    if (isset($_COOKIE['fecha'])){
        setcookie('fecha',"", time()-1800,"/A2");
    }
    if (isset($_COOKIE['hora'])){
        setcookie('hora',"", time()-1800,"/A2");
    }
    
}