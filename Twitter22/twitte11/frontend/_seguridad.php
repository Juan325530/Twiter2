<?php
    session_start();
    if (!isset( $_SESSION["twitter_codigousuario"] ) &&
        !isset( $_SESSION["twitter_nombre"] ) &&
        !isset( $_SESSION["twitter_apellido"] ) &&
        !isset( $_SESSION["twitter_correo"] ) //&&
        //!isset($_SESSION["twitter_tipousuario"])
        ){ // AGREGAR CAMPO A LOS ARCHIVOS, FORMULARIOS Y OPERACIONES
        header("Location: index.php");
    }
    if (isset( $_SESSION["twitter_codigousuario"] )) {
        echo '<script>var mySesVar='.json_encode($_SESSION).';</script>';
    }
?>