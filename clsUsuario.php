<?php
require_once("database.php");

connect_db();

class clsUsuario
{

  function create($nombre, $direccion, $telefono, $email)
  {
    $strSQL = "INSERT INTO `crud`.`usuario` (`nombre`, `direccion`, `telefono`, `email` ) VALUES ('$nombre', '$direccion', '$telefono', 'email')";
    consultar_db($strSQL);
  }

  function read()
  {
    $strSQL = "SELECT * FROM usuario";
    $arrDatos = consultar_db($strSQL);
    return $arrDatos;
  }

  function update($id, $nombre, $direccion, $telefono, $email)
  {
    $strSQL = "UPDATE usuario SET nombre='$nombre', direccion='$direccion', telefono='$telefono', email='$email' WHERE  id= $id";
    consultar_db($strSQL);
  }

  function delete($id)
  {
    $strSQL = "DELETE FROM usuario WHERE id = $id ";
    consultar_db($strSQL);
  }
  
  function consulta_uno( $id )
  {
    
    $strSQL = "SELECT * FROM usuario WHERE id = $id";
    $arrDatos = consultar_db($strSQL);
    
    $arrRegisto = array_shift($arrDatos);
    
    return $arrRegisto;    
  }
}
