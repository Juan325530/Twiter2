<?php
  session_start();
  if (isset( $_SESSION["twitter_codigousuario"] )) {
    header("Location: home.php");
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device, initial-scale=1.0">
        <title>Twitter</title>
        <link rel="shortcut icon" href="img/twitter.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">   <!--Estilos del framework Boostrap-->
        <link rel="stylesheet" href="css/estilos-login.css">   <!--Para redirigir a una hoja en otro lado-->
        <link rel="stylesheet" href="css/common.css">   <!--Estilos comunes para todas las paginas-->
        <script src="https://kit.fontawesome.com/05161e6086.js" crossorigin="anonymous"></script>
    </head>  
                                                                        
    <body>
        
        <div id="contenido"> 
            <center class="col-sm-9 ml-auto mr-auto">
                <img src="img/twitter.png" alt="">
            </center>
            <section id="formulario" class="text-center col-lg-6 col-md-9 col-sm-10 col-10">
                <h3>Iniciar sesión en Twitter</h3>
                <div class="form-row mt-5">
                    <input class ="control form-control col-12" id="correo" type="text" required="" placeholder="Teléfono, correo o usuario">
                    <div class="invalid-feedback">Credenciales incorrectas.</div>
                </div>
                <div class="form-row mt-5">
                    <input class ="control form-control col-12" id="contrasena" type="password" required="" placeholder="Contraseña">
                    <div class="invalid-feedback">Credenciales incorrectas.</div>
                </div>                
                <center class="mt-5">
                    <input id="iniciar" class="btn btn-primary btn-lg col-md-6 col-sm-8 blue-tw-btn" onclick="iniciarSesion()" type="button" value="Iniciar sesión">
                </center>
                <div class="col-sm-9 d-flex justify-content-between ml-auto mr-auto mt-5">
                    <a class="link-help" href="index.php">¿Olvidaste tu contraseña?</a>
                    <a class="link-help" href="index.php">Registrate en Twitter</a>
                </div>
            </section> 
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="js/funciones-validacion.js"></script>
        <script src="js/controlador-usuarios.js"></script>
    </body> 
</html>