<?php


class Usuario
{ 
  private $codigoUsuario;
  private $nombre;
  private $apellido;
  private $correo;
  private $fechaNacimiento;
  private $contrasena;

  public function __construct($correo, $contrasena)
  {
    $this->correo = $correo;
    $this->contrasena = $contrasena;
  }


  /**
   * Get the value of correo
   */
  public function getCorreo()
  {
    return $this->correo;
  }

  /**
   * Set the value of correo
   *
   * @return  self
   */
  public function setCorreo($correo)
  {
    $this->correo = $correo;

    return $this;
  }

  /**
   * Get the value of contrasena
   */
  public function getContrasena()
  {
    return $this->contrasena;
  }

  /**
   * Set the value of contrasena
   *
   * @return  self
   */
  public function setContrasena($contrasena)
  {
    $this->contrasena = $contrasena;

    return $this;
  }


  public function __toString()
  {
    return $this->correo . " " . $this->contrasena . "";
  }

  public function guardarUsuario()
  {
    $contenidoArchivo = file_get_contents("../data/usuarios.json");
    $usuarios = json_decode($contenidoArchivo, true);
    $usuarios[] = array( //arreglo asosiativo
      "correo" => $this->correo,
      "contrasena" => $this->contrasena
    );
    $archivo = fopen("../data/usuarios.json", "w");
    fwrite($archivo, json_encode($usuarios));
    fclose($archivo);
  }


  public static function obtenerUsuarios()
  {
    $contenidoArchivo = file_get_contents("../data/usuarios.json");
    echo $contenidoArchivo;
  }

  public static function obtenerUsuario($indice)
  {
    $contenidoArchivo = file_get_contents("../data/usuarios.json");
    $usuarios = json_decode($contenidoArchivo, true);
    echo json_encode($usuarios[$indice]);
  }
}
