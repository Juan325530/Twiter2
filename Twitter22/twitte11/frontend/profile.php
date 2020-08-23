<?php
  include("_seguridad.php");
  $idUsuario = $_GET["idusuario"];
  $usersFile = file_get_contents("../backend/data/usuarios.json");
  $users = json_decode($usersFile, true);
  $usuarioSolicitado["resultado"] = 1;
  for ($i=0; $i < count(json_decode($usersFile)); $i++)
  {
    if($users[$i]["codigoUsuario"] == $idUsuario)
    {
      $usuarioSolicitado["codigoUsuario"] = $users[$i]["codigoUsuario"];
      $usuarioSolicitado["nombre"] = $users[$i]["nombre"];
      $usuarioSolicitado["apellido"] = $users[$i]["apellido"];
      $usuarioSolicitado["fechaNacimiento"] = $users[$i]["fechaNacimiento"];
      $usuarioSolicitado["fechaRegistro"] = $users[$i]["fechaRegistro"];
      $usuarioSolicitado["correo"] = $users[$i]["correo"];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?php echo $usuarioSolicitado["nombre"]." ".$usuarioSolicitado["apellido"]." (".$usuarioSolicitado["correo"].")"?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-home.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="shortcut icon" href="img/twitter.ico" type="image/x-icon">
    <script src="js/iconos.js"></script>
  </head>

  <body class="mb-5 mb-sm-0">
    <nav class="navbar navbar-expand-sm navbar-dark bg-bar fixed-top">
        <a class="navbar-brand" href="#"><img src="twitter.png" class="img-fluid my-0"></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation" style="border: 2px solid;">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExampleDefault">
          <form class="form-inline my-2 my-sm-0 mr-sm-3 ml-auto">
            <input class="form-control" id="btn-submit-search" type="text" placeholder="Buscar en Twitter" aria-label="Search">
          </form>
          <ul class="navbar-nav">
            <li class="nav-link active">
              <a class="nav-link d-inline-flex align-items-center" href="_logout.php"><i class="fas fa-2x fa-sign-out-alt mr-2 d-none d-sm-block" aria-hidden="true"></i>Cerrar sesión</a>
            </li>
            <li class="nav-item active d-sm-none d-md-none d-lg-none d-xl-none">
              <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item active d-sm-none d-md-none d-lg-none d-xl-none">
              <a class="nav-link" href="#">Explorar</a>
            </li>
            <li class="nav-item active d-sm-none d-md-none d-lg-none d-xl-none">
              <a class="nav-link" href="#">Notificaciones</a>
            </li>
            <li class="nav-item active d-sm-none d-md-none d-lg-none d-xl-none">
              <a class="nav-link" href="#">Mensajes</a>
            </li>
            <li class="nav-item active d-sm-none d-md-none d-lg-none d-xl-none">
              <a class="nav-link" href="#">Guardados</a>
            </li>
            <li class="nav-item active d-sm-none d-md-none d-lg-none d-xl-none">
              <a class="nav-link" href="#">Listas</a>
            </li>
            <li class="nav-item active d-sm-none d-md-none d-lg-none d-xl-none">
              <a class="nav-link" href="profile.php?idusuario=<?php echo $_SESSION['twitter_codigousuario']?>">Perfil</a>
            </li>
            <li class="nav-item active d-sm-none d-md-none d-lg-none d-xl-none">
              <a class="nav-link" href="#">Más opciones</a>
            </li>
          </ul>
        </div>
      </nav>
    
    <div class="row" style="margin: 0;margin-top: 5.4em;">
      
      <!-- BARRA LATERAL IZQUIERDA-->
      <aside class="col-12 col-sm-4 col-md-4 col-lg-3 white-text py-3 d-none d-sm-block" style="position: fixed;">
        <ul class="col-12 mx-auto mb-0" id="barraLateralDerecha" style="list-style: none;">
          <li class="mb-3">
            <a class="link-user text-white align-items-center" tabindex="1" href="home.php"><i class="fas fa-2x mr-2 fa-home" aria-hidden="true"></i><strong>Inicio</strong></a>
          </li>
          <li class="mb-3">
            <a class="link-user text-white align-items-center" tabindex="1" href="#"><i class="fas fa-2x mr-2 fa-hashtag" aria-hidden="true"></i><strong>Explorar</strong></a>
          </li>
          <li class="mb-3">
            <a class="link-user text-white align-items-center" tabindex="1" href="#"><i class="fas fa-2x mr-2 fa-bell" aria-hidden="true"></i><strong>Notificaciones</strong></a>
          </li>
          <li class="mb-3">
            <a class="link-user text-white align-items-center" tabindex="1" href="#"><i class="fas fa-2x mr-2 fa-envelope" aria-hidden="true"></i><strong>Mensajes</strong></a>
          </li>
          <li class="mb-3">
            <a class="link-user text-white align-items-center" tabindex="1" href="#"><i class="fas fa-2x mr-2 fa-bookmark" aria-hidden="true"></i><strong>Guardados</strong></a>
          </li>
          <li class="mb-3">
            <a class="link-user text-white align-items-center" tabindex="1" href="#"><i class="fas fa-2x mr-2 fa-list-alt" aria-hidden="true"></i><strong>Listas</strong></a>
          </li>
          <li class="mb-3">
            <a class="link-user text-white" tabindex="1" href="profile.php?idusuario=<?php echo $_SESSION['twitter_codigousuario']?>"><i class="fas fa-2x mr-2 fa-user" aria-hidden="true"></i><strong>Perfil</strong></a>
          </li>
          <li class="mb-3">
            <a class="link-user text-white align-items-center" tabindex="1" href="#"><i class="fas fa-2x mr-2 fa-comment-dots" aria-hidden="true"></i><strong>Más opciones</strong></a>
          </li>
          <li class="mt-4">
            <input id="nuevoTweet" class="btn btn-primary btn-lg col-sm-12 blue-tw-btn" type="button" data-toggle="modal" data-target="#formTweet" value="Twitear">
          </li>
        </ul>
      </aside>
  
      <!-- DIV CENTRAL PANTALLA DE INICIO -->
      <div class="col-12 col-sm-8 col-md-8 col-lg-6 py-3 px-3 mb-4 mb-sm-0 ml-auto mr-lg-auto">

        <div class="card bg-tweet"> <!--CART-->
          <div>
            <div id="profile-back-image" class="card-img-top" style="background: url(img/JUAN2.JPG); background-size: cover;"></div>
            <div class="pt-2 pr-2"> 
              <img src="img/JUANPROFILE.JPG" alt="..." class="rounded-circle profile-first-pic">
              <?php
                if ($usuarioSolicitado["codigoUsuario"] == $_SESSION["twitter_codigousuario"]) {
                  echo '<input id="EditarPerfil" class="btn btn-primary blue-tw-btn" type="button" data-toggle="modal" data-target="#FormEditPerfil" value="Editar Perfil">';
                } else {
                  echo '<input type="button" class="btn btn-primary blue-tw-btn float-right" onclick="seguirA('.$usuarioSolicitado["codigoUsuario"].')" value="Seguir">';
                }
              ?>
              <!-- <input id="EditarPerfil" class="btn btn-primary  blue-tw-btn" type="button" data-toggle="modal" data-target="#FormEditPerfil" value="Editar Perfil"> -->
            </div>  
          </div>       
           <div class="card-body">  
            <h5 class="card-title" style="color: white;"><span id="profile-nombre"><?php echo $usuarioSolicitado["nombre"]?></span> <span id="profile-apellido"><?php echo $usuarioSolicitado["apellido"]?></span></h5>
            <p class="card-text"><?php echo $usuarioSolicitado["correo"]?></p>
            <p class="card-text"><i class="fas fa-calendar-alt"></i>Fecha de nacimiento <?php echo $usuarioSolicitado["fechaNacimiento"]?></p>
            <p class="card-text"><i class="fas fa-clock"></i>Se unió en <?php echo $usuarioSolicitado["fechaRegistro"]?></p>        
          </div>
        </div>
        <br>

        <div id="profile-twits">
          <?php
            $contenidoArchivoTwits = file_get_contents('../backend/data/twits.json');
            $twits = json_decode($contenidoArchivoTwits, true);

            $contenidoArchivoUsuarios = file_get_contents('../backend/data/usuarios.json');
            $usuarios = json_decode($contenidoArchivoUsuarios, true);

            $resultado = array();
            for ($i=0; $i < sizeof($twits); $i++)
            {
              if ($twits[$i]["codigoUsuario"] == $idUsuario) {
                for ($j=0; $j < sizeof($usuarios); $j++)
                {
                    if($twits[$i]["codigoUsuario"] == $usuarios[$j]["codigoUsuario"])
                    {
                        $twits[$i]["nombreUsuario"] = $usuarios[$j]["nombre"];
                        $twits[$i]["apellidoUsuario"] = $usuarios[$j]["apellido"];
                    }
                    
                }
                $resultado[] = $twits[$i];
              }
            }

            $comparar = $resultado;
            for ($i=0; $i < sizeof($resultado); $i++)
            {
              if ($resultado[$i]["codigoTwitOriginal"] == 0) { // Si el tweet es una publicacion original ...
                if ($resultado[$i]["codigoUsuario"] == $_SESSION["twitter_codigousuario"]) { // Si la persona que inicio sesion es el autor puede ver botones para editar o borrar publicaciones ...
                  echo '<div class="text-white card mb-2 bg-tweet twit-card-id'.$resultado[$i]["codigoTwit"].'">
                  <div class="card-header">
                      <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                      <a class="text-white" href="profile.php?idusuario='.$resultado[$i]["codigoUsuario"].'">'.$resultado[$i]["nombreUsuario"].' '.$resultado[$i]["apellidoUsuario"].'</a>
                  </div>
                  <div class="card-body">
                      <div class="twit-contenido-id'.$resultado[$i]["codigoTwit"].'">'.$resultado[$i]["contenidoTwit"].'</div>
                  </div>
                  <div class="card-footer d-flex justify-content-around">
                      <button class="link-style" type="button" onclick="compartirTweet(\''.$resultado[$i]["contenidoTwit"].'\', \''.$resultado[$i]["codigoTwit"].'\');">
                          <i class="fas fa-share mr-2" aria-hidden="true"></i>
                          <span class="twit-cantidadReTwits-id'.$resultado[$i]["codigoTwit"].'">'.$resultado[$i]["cantidadReTwits"].' Retweets</span>
                      </button>
                      <button class="link-style twit-modalEditar-id'.$resultado[$i]["codigoTwit"].'" type="button" onclick="modalEditarTweet(\''.$resultado[$i]["contenidoTwit"].'\', \''.$resultado[$i]["codigoTwit"].'\');">
                          <i class="fas fa-edit mr-2" aria-hidden="true"></i>
                          <span>Editar Tweet</span>
                      </button>
                      <button class="link-style" type="button" onclick="eliminarTweet(\''.$resultado[$i]["codigoTwit"].'\');">
                          <i class="fas fa-trash mr-2" aria-hidden="true"></i>
                          <span>Borrar Tweet</span>
                      </button>
                  </div>
              </div>';
                } else {
                  echo '<div class="text-white card mb-2 bg-tweet twit-card-id'.$resultado[$i]["codigoTwit"].'">
                  <div class="card-header">
                      <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                      <a class="text-white" href="profile.php?idusuario='.$resultado[$i]["codigoUsuario"].'">'.$resultado[$i]["nombreUsuario"].' '.$resultado[$i]["apellidoUsuario"].'</a>
                  </div>
                  <div class="card-body">
                      <div class="twit-contenido-id'.$resultado[$i]["codigoTwit"].'">'.$resultado[$i]["contenidoTwit"].'</div>
                      <button class="link-style" type="button" onclick="compartirTweet(\''.$resultado[$i]["contenidoTwit"].'\', \''.$resultado[$i]["codigoTwit"].'\');">
                          <i class="fas fa-share mr-2" aria-hidden="true"></i>
                          <span class="twit-cantidadReTwits-id'.$resultado[$i]["codigoTwit"].'">'.$resultado[$i]["cantidadReTwits"].' Retweets</span>
                      </button>
                  </div>
              </div>';
                }
                
              } else { // La publicacion es un retwit ...
                for ($j=0; $j < sizeof($comparar); $j++) { // Iterar la misma lista de twits (que esta almacenada en otra variable) para obtener datos del twit original
                  if ($resultado[$i]["codigoTwitOriginal"] == $comparar[$j]["codigoTwit"]) { // Encontrar el twit original
                    if ($comparar[$j]["codigoUsuario"] == $_SESSION["twitter_codigousuario"]) { // Si el usuario que inicio sesion es el autor original puede ver botones para editar y borrar la publicacion
                      echo '<div class="text-white card mb-2 bg-tweet twit-card-id'.$resultado[$i]["codigoTwitOriginal"].'">
                          <div class="card-header">
                              <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                              <a class="text-white" href="profile.php?idusuario='.$resultado[$i]["codigoUsuario"].'">'.$resultado[$i]["nombreUsuario"].' '.$resultado[$i]["apellidoUsuario"].'</a>
                          </div>
                          <div class="card-body">
                              <i>Retwitteado de <a href="profile.php?idusuario='.$comparar[$j]["codigoUsuario"].'">«'.$comparar[$j]["nombreUsuario"].' '.$comparar[$j]["apellidoUsuario"].'»</a></i>
                              <div class="twit-contenido-id'.$resultado[$i]["codigoTwitOriginal"].'">'.$resultado[$i]["contenidoTwit"].'</div>
                              <div class="d-flex justify-content-around">
                                  <button class="link-style" type="button" onclick="compartirTweet(\''.$resultado[$i]["contenidoTwit"].'\', \''.$resultado[$i]["codigoTwitOriginal"].'\');">
                                      <i class="fas fa-share mr-2" aria-hidden="true"></i>
                                      <span class="twit-cantidadReTwits-id'.$resultado[$i]["codigoTwitOriginal"].'">'.$comparar[$j]["cantidadReTwits"].' Retweets</span>
                                  </button>
                                  <button class="link-style twit-modalEditar-id'.$resultado[$i]["codigoTwitOriginal"].'" type="button" onclick="modalEditarTweet(\''.$resultado[$i]["contenidoTwit"].'\', \''.$resultado[$i]["codigoTwitOriginal"].'\');">
                                      <i class="fas fa-edit mr-2" aria-hidden="true"></i>
                                      <span>Editar Tweet</span>
                                  </button>
                                  <button class="link-style" type="button" onclick="eliminarTweet(\''.$resultado[$i]["codigoTwitOriginal"].'\');">
                                      <i class="fas fa-trash mr-2" aria-hidden="true"></i>
                                      <span>Borrar Tweet</span>
                                  </button>
                              </div>
                          </div>
                      </div>';
                    } else {
                      echo '<div class="text-white card mb-2 bg-tweet twit-card-id'.$resultado[$i]["codigoTwitOriginal"].'">
                          <div class="card-header">
                              <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                              <a class="text-white" href="profile.php?idusuario='.$resultado[$i]["codigoUsuario"].'">'.$resultado[$i]["nombreUsuario"].' '.$resultado[$i]["apellidoUsuario"].'</a>
                          </div>
                          <div class="card-body">
                              <i>Retwitteado de <a href="profile.php?idusuario='.$comparar[$j]["codigoUsuario"].'">«'.$comparar[$j]["nombreUsuario"].' '.$comparar[$j]["apellidoUsuario"].'»</a></i>
                              <div class="twit-contenido-id'.$resultado[$i]["codigoTwitOriginal"].'">'.$resultado[$i]["contenidoTwit"].'</div>
                              <button class="link-style" type="button" onclick="compartirTweet(\''.$resultado[$i]["contenidoTwit"].'\', \''.$resultado[$i]["codigoTwitOriginal"].'\');">
                                  <i class="fas fa-share mr-2" aria-hidden="true"></i>
                                  <span class="twit-cantidadReTwits-id'.$resultado[$i]["codigoTwitOriginal"].'">'.$comparar[$j]["cantidadReTwits"].' Retweets</span>  
                              </button>
                          </div>
                      </div>';
                    }                    
                  }
                }
              }
            }
          ?>
        </div>

      </div>      
      
      <!-- BARRA LATERAL DERECHA-->
    
      <aside class="col-lg-3 d-none d-lg-block py-3" style="position: fixed; right: 0;">
        <div class="tendencias col-12 mx-auto text-white" style="margin-left: 0;margin-right: 0;">
          <p class="mb-3">Tendencias para ti <br>
            Neymar<br>
            800 mil Tweets 
          </p>
          <p class="mb-3">Tendencia en Honduras <br>
                Sinager <br>
              400 mil Tweets
          </p>
          <p class="mb-3">Tendencia en Honduras <br>
            Que Dios Nos Ampare ante el Covid 19 <br>
            200 mil Tweets
          </p>
          <p class="mb-3">Tendencia en Honduras <br>
            Lakers "LeBron" es tendencia por su actuación en el partido de hoy, consiguiendo el triple doble  <br>
            55 mil Tweets
          </p>
          <p class="mb-3">Tendencia · Politica <br>
          Estados Unidos <br>
          47,1 mil Tweets
          </p>
          <p class="mb-3">Fútbol · Tendencia <br>
            Icardi <br>
            117 mil Tweets.
          </p>
        </div>
      </aside>
    </div>

    <!-- VENTANA MODAL PARA PUBLICAR UN NUEVO TWEET -->
    <div class="modal fade"  id="formTweet" tabindex="-1" role="dialog" aria-labelledby="formTweetLabel" aria-hidden="true">
      <div class="modal-dialog">

        <div class="modal-content text-white">
          <div class="modal-header" style="background-color: #15202B;">
            <h5 class="modal-title" style="font-size: x-large;" id="formTweetLabel">Haz una nueva publicación</h5>
            <img id="logoFormRegistro" src="twitter.png" alt="" style="margin-left: 200px;">
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body text-black" style="background-color:#15202B;">
            <div class="form-row">
              <div class="col-12 mb-3">
                <label for="textoTwit">Contenido</label>
                <textarea id="textoTwit" class="control form-control" required="" maxlength="280" placeholder="¿Qué estás pensando?"></textarea>
                <div class="invalid-feedback">El contenido no debe estar vacío ni exceder los 280 caracteres.</div>
              </div>
            </div>
            <center class="my-3">
              <button id="postTwit" type="button" onclick="guardarTwit()" class="btn btn-primary btn-lg col-sm-10 blue-tw-btn">Publicar</button>
            </center>
          </div>
      
        </div>
      </div>
    </div>
    
    <!--MODAL2-->
    <div class="modal fade"  id="FormEditPerfil" tabindex="-1" role="dialog" aria-labelledby="formEditarLabel" aria-hidden="true">
      
      <div class="modal-dialog">
        
        <div class="modal-content text-white">
          <div class="modal-header" style="background-color: #15202B;">
            <h5 class="modal-title" style="font-size: x-large;" id="formEditarLabel">Actualizar Perfil</h5>
            <img id="logoFormRegistro" src="twitter.png" alt="" style="margin-left: 200px;">
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <div class="modal-body text-black" style="background-color:#15202B;">
            <div class="form-row">
              <div class="col-12 col-sm-6 mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" class="control form-control" required="" ></input>
                <div class="invalid-feedback">Campo Vacio.</div>
              </div>
              <div class="col-12 col-sm-6 mb-3">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" class="control form-control" required="" ></input>
                <div class="invalid-feedback">Campo Vacio.</div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-12 col-sm-6 mb-3">
                <label for="contrasena1">Nueva Contraseña</label>
                <input type="password" id="contrasena1" class="control form-control" required="" ></input>
                <div class="invalid-feedback">Requisitos: más de 8 caracteres incluyendo 0-9, a-z, A-Z, caracteres especiales.</div>
              </div>
              <div class="col-12 col-sm-6 mb-3">
                <label for="contrasena2">Confirmar Nueva Contraseña</label>
                <input type="password" id="contrasena2" class="control form-control" required="" ></input>
                <div class="invalid-feedback">La contraseña no coincide</div>
            </div>
          </div>
            <center class="my-3">
              <button id="EditProfile" type="button" onclick="editarPerfil()" class="btn btn-primary btn-lg col-sm-10 blue-tw-btn">Actualizar Información</button>
            </center>
          </div>
        
        </div>
      </div>
    </div>
    
    <!--MODAL3-->
    <div class="modal fade"  id="EditTweet" tabindex="-1" role="dialog" aria-labelledby="editTweetLabel" aria-hidden="true">
      <div class="modal-dialog">

        <div class="modal-content text-white">
          <div class="modal-header" style="background-color: #15202B;">
            <h5 class="modal-title" style="font-size: x-large;" id="editTweetLabel">Edita el contenido del Tweet</h5>
            <img id="logoFormRegistro" src="twitter.png" alt="" style="margin-left: 200px;">
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body text-black" style="background-color:#15202B;">
            <div class="form-row">
              <div class="col-12 mb-3">
                <label for="textoTwitEditar">Nuevo Contenido</label>
                <textarea id="textoTwitEditar" class="control form-control" required="" maxlength="280" placeholder="¿Qué estás pensando?"></textarea>
                <div class="invalid-feedback">El contenido no debe estar vacío ni exceder los 280 caracteres.</div>
              </div>
            </div>
            <center id="edit" class="my-3"></center>
          </div>
        </div>

      </div>
    </div>
    
    
    <div class="col-12 py-3 d-block d-sm-none d-md-none d-lg-none d-xl-none bg-bar fixed-bottom">
      <input id="nuevoTweet" class="btn btn-primary btn-lg col-12 blue-tw-btn" type="button" data-toggle="modal" data-target="#formTweet" value="Twitear">
    </div>

    
    
    
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/controlador-tweets.js"></script>
    <script src="js/funciones-validacion.js"></script>
    <script src="js/controlador-usuarios.js"></script>
  
    
    
  
  </body>

</html>