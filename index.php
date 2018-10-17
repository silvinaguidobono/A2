<?php
// Página principal con formulario de acceso como usuario registrado
// El formulario da la opción de recordar el usuario en este equipo
// Si marca esta opción, se guardará una cookie con el nombre del usuario
// y su contraseña para no solicitarlo en futuras visitas de ese usuario.

    session_start();
    ini_set('display_errors',1);
    include 'lib/helper.php';
    
    // Si existe la cookie de usuario, voy a usuario recordado
    if (isset($_COOKIE['usuario']) && isset($_COOKIE['clave'])){
        header("Location: http://localhost:8080/log_recuerdo.php");
    }
    // Si no existe la cookie, muestro el formulario de acceso
    // Si hay datos enviados por el formulario
    if ($_POST){
        $errores=array(); // inicializo vector de errores
        
        // Valido que haya ingresado un usuario y una contraseña
        if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
            $login= $_POST['usuario'];
        }else{
            $errores[]="Debe ingresar el usuario";
        }
        
        if(isset($_POST['clave']) && !empty($_POST['clave'])){
            $clave=$_POST['clave'];
        }else{
            $errores[]="Debe ingresar la clave";
        }
        
        if (count($errores)==0){
            // Valido usuario y contraseña con archivo JSON
            $dades=(array)json_decode(file_get_contents('lib/dades.json'));
            if (!($login==$dades['usuario'] && $clave==$dades['clave'])){
                $errores[]="Contraseña inválida para ese usuario";
            }
        }
        
        // Si hay errores de validación
        if (count($errores)>0){
            imprime_errores($errores);
        }else{
            // Si no hay errores de validación
            // si marcó la opción de recordar usuario
            if (isset($_POST['recordar']) && $_POST['recordar']=="Si"){
                // almacenar usuario y contraseña en Cookie
                setcookie('usuario',$login, time()+1800);
                setcookie('clave', $clave, time()+1800);
                // almaceno fecha y hora de último acceso a la página ppal
                $fecha=date('Y-m-d');
                $hora=date("H:i:s");
                setcookie('fecha', $fecha, time()+1800);  
                setcookie('hora', $hora, time()+1800);  
                
            }
            // guardo usuario y contraseña en las variables de sesión
            $_SESSION['usuario']=$login;
            $_SESSION['clave']=$clave;
            // entro a la sesión del usuario  
            header("Location: http://localhost:8080/sesion.php");
        } 
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Actividad 2</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container">
            <h1>Actividad 2</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <p>
                    <label for="usuario">Usuario</label>
                    <br>
                    <input type="text" placeholder="Ingrese su usuario" name="usuario"/>
                </p>
                <p>
                    <label for="clave">Contraseña</label>
                    <br>
                    <input type="text" placeholder="Ingrese su contraseña" name="clave"/>
                </p>
                <p>
                    <input type="checkbox" name="recordar" 
                           value="Si" />Recuérdame en este equipo
                </p>
                <input type="submit" name="iniciar" value="Iniciar sesión"/>

            </form>
        </div>
    </body>
</html>