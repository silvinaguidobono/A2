<?php
// Página de usuario recordado
// su nombre de usuario y contraseña están en una cookie
// muestro su nombre, fecha y hora de última visita a la página ppal
// permite acceder a su sesión o acceder con otro usuario
// guardo nombre de usuario y contraseña en variables de sesión
// para recordar el usuario mientras navegue por la aplicación


    session_start();
    ini_set('display_errors',1);

    // guardo en variables los datos de la cookie para mostrar en la página
    $usuario="";
    if (isset($_COOKIE['usuario'])){
        $usuario=$_COOKIE['usuario'];
    }
    if (isset($_COOKIE['clave'])){
        $clave=$_COOKIE['clave'];
    }
    if (isset($_COOKIE['fecha'])){
        $fecha=$_COOKIE['fecha'];
        // actualizo la fecha del último acceso a la página principal en cookies
        $fecha_actual=date('Y-m-d');
        setcookie('fecha', $fecha_actual, time()+1800,"/A2");  
    }
    if (isset($_COOKIE['hora'])){
        $hora=$_COOKIE['hora'];
        // actualizo la hora del último acceso a la página principal en cookies
        $hora_actual=date("H:i:s");
        setcookie('hora', $hora_actual, time()+1800,"/A2");  
    }
    
    // guardo usuario y contraseña en las variables de sesión
    $_SESSION['usuario']=$usuario;
    $_SESSION['clave']=$clave;
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Usuario recordado</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container">
            <h1>
                Nombre de usuario: <?php echo $usuario."<br>"; ?>
            </h1>
            <p>
                Fecha último acceso: <?php echo $fecha."<br>"; ?>
            </p>
            <p>
                Hora último acceso: <?php echo $hora."<br>"; ?>
            </p>
            <br>
            <hr>
            <p><a href="sesion.php">Iniciar sesión</a></p>
            <p><a href="cerrar_usuario.php">Acceder con otro usuario</a></p>
        </div>
        
    </body>
</html>