<?php
// Página de acceso a parte privada del usuario
// Permite ingresar una url para acceder a través de un iframe

session_start();
ini_set('display_errors',1);
include_once 'lib/helper.php';

$usuario="";
// Rescato el nombre del usuario de la sesión para mostrar en la página
if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
}

// Si recibo datos del formulario
if ($_POST){
    $url="";
    $errores=array(); // inicializo vector de errores de validación
    
    if (isset($_POST['url']) && !empty($_POST['url'])){ 
        // valido la URL
        if (filter_var($_POST['url'], FILTER_VALIDATE_URL)){
            $url=$_POST['url'];
        }else{
            $errores[]="La URL es inválida";
        }
    }else{
        $errores[]="Debe ingresar una página a visualizar";
    }
    if (count($errores)>0){
        imprime_errores($errores);
    }
}else{
    $url="";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sesión del usuario</title>
        <link rel="stylesheet" href="css/style.css"/>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="container">
            <h1>Sesión del usuario: <?= $usuario; ?></h1>
            <br>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <p>
                    <label for="url">Página a visualizar</label>
                    <br>
                    <input type="text" placeholder="Ingrese una url" name="url"
                           value=""/>
                </p>
                <input type="submit" name="abrir" value="Abrir página"/>
            </form>
            <br>
            <?php 
                if ($url<>""){
                    echo '<iframe src="'.$url.'" height="200" width="300"></iframe>';
                }
            ?>
            <hr>
            <p><a href="cerrar_sesion.php">Cerrar sesión</a></p>
        </div>
    </body>
</html>               