<?php
  session_start();
  if (isset( $_SESSION["twitter_codigousuario"] )) {
    header("Location: home.php");
  }
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Twitter. Es lo que está pasando</title>
        <link rel="icon" href="twitter.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">   <!--Estilos del framework Boostrap-->
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/common.css">   <!--Estilos comunes para todas las paginas-->
        <script src="https://kit.fontawesome.com/05161e6086.js" crossorigin="anonymous"></script>
        
        <style>
            .contenedor {
                width: 265.656px;
                height: 541px;
                background: url(Background.jpeg);
                background-repeat: no-repeat;
                background-size: cover;
            }        
            .texto-encima {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-60%, -50%);
                color: white;
                font-size: .8rem;
            }
            .texto-colado {
                padding: 5em 2em;
            }
            
            /*Responsive - Media query*/
            @media screen and (max-width: 575px) {
                .contenedor {
                    width: 100%;
                    height: 18em;
                }
                .index-contenedor-principal {
                    display: flex;
                    flex-direction: column-reverse;
                }
            }        
        </style>
    </head>

    <body>
        <div class="row margin-zero index-contenedor-principal">
            <div class="contenedor col-md-6 col-sm-4 col-xs-12">  
                <div class="texto-encima">
                    <h5>
                        <i class="fas fa-search"></i>  Sigue lo que te interesa.
                    </h2>
                    <br>
                    <br>
                    <h5>
                        <i class="fas fa-user-friends"></i>  Entérate de lo que está hablando la gente. 
                    </h3>
                    <br>
                    <br>
                    <h5>    
                        <i class="far fa-comment"></i> Únete a la conversación.
                    </h4>
                </div>
            </div>

            <div class="col-md-6 col-sm-8 col-xs-12"> 
                <div class="texto-colado col-sm-12"> 
                    <img id="logo" src="twitter.png" alt="">
                    <h1 style="font-size:revert;" style="color: white;">Mira lo que está pasando en el mundo en este momento</h1>
                    <br>
                    <br>
                    <br>
                    <h3 style="font-size: large;">Únete a Twitter hoy mismo.</h3>
                    <div class="mt-4">
                        <input id="registrate" class ="btn btn-primary btn-lg col-sm-12 blue-tw-btn" type="button" data-toggle="modal" data-target="#exampleModal" value="Regístrate">
                        <br>
                        <br>
                        <a href="login.php" class="btn btn-primary btn-lg col-sm-12 blue-tw-btn" type="button" id="iniciar" aria-pressed="true"> Iniciar sesión</a>
                    </div>
                </div>
            </div>
            <!-- <form name="formulario" id="formulario" action="12-radio-button-jquery.php" method="POST">
                <input type="radio" name="edad" id="edad1" value="20"> 20<br>
                <input type="radio" name="edad" id="edad2" value="30"> 30<br>
                <input type="radio" name="edad" id="edad3" value="40"> 40 
                <br><br>
                <input type="button" id="boton" value="Enviar">
            </form> -->
        </div>

        <!-- Modal -->
        <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content text-white">
                    <div class="modal-header" style="background-color: #15202B;">
                        <h5 class="modal-title" style="font-size: x-large;" id="exampleModalLabel">Crea tu cuenta</h5>
                        <img id="logoFormRegistro" src="twitter.png" alt="" style="margin-left: 200px;">
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body text-black" style="background-color:#15202B;">
                        <div class="form-row">
                            <div class="col-sm-6 col-xs-12 mb-3">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="control caja-texto form-control" required="" type="text">
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                            <div class="col-sm-6 col-sx12 mb-3">
                                <label for="apellido">Apellido</label>
                                <input id="apellido" class="control caja-texto form-control" required="" type="text">
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-sm-6 col-xs-12 mb-3">
                                <label for="correo">Teléfono, correo o usuario</label>
                                <input id="correo" class="control caja-texto form-control" required="" type="email">
                                <div class="invalid-feedback" id="feedbackCorreoInvalido">Campo inválido.</div>
                            </div>
                            <div class="col-sm-6 col-xs-12 mb-3">
                                <label for="fechaNacimiento">Fecha de nacimiento</label>
                                <input id="fechaNacimiento" class="control caja-texto form-control" required="" type="date">
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-sm-6 col-xs-12 mb-3">
                                <label for="contrasena1">Contraseña</label>
                                <input id="contrasena1" class="control caja-texto form-control" required="" type="password">
                                <div class="invalid-feedback">Requisitos: más de 8 caracteres incluyendo 0-9, a-z, A-Z, caracteres especiales.</div>
                            </div>
                            <div class="col-sm-6 col-xs-12 mb-3">
                                <label for="contrasena2">Confirmar contraseña</label>
                                <input id="contrasena2" class="control caja-texto form-control" required="" type="password">
                                <div class="invalid-feedback" id="feedbackContrasena2Invalido">La contraseña no coincide.</div>
                            </div>
                        </div>
                        <center class="mt-3">
                            <button id="iniciar2" type="button" onclick="guardarUsuario()" class="btn btn-primary btn-lg col-sm-10 blue-tw-btn">Iniciar sesión</button>
                        </center>
                    </div>

                    <div class="modal-footer" style="background-color: #15202B;"></div>

                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="js/funciones-validacion.js"></script>
        <script src="js/controlador-usuarios.js"></script>
    </body>

</html>