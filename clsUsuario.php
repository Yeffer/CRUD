<?php
require_once("database.php");

connect_db();

class clsUsuario
{

  function create($nombre, $referencia)
  {
    $strSQL = "INSERT INTO `crud`.`usuario` (`nombre`, `referencia`) VALUES ('$nombre', '$referencia')";
    consultar_db($strSQL);
  }

  function read()
  {
    $strSQL = "SELECT * FROM usuario";
    $arrDatos = consultar_db($strSQL);
    return $arrDatos;
  }

  function update($id, $nombre, $referencia)
  {
    $strSQL = "UPDATE usuario SET nombre='$nombre', referencia='$referencia' WHERE  id= $id";
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
