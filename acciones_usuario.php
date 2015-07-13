<?php
if ( ! empty($_REQUEST['accion'])) {
  $strAccion = $_REQUEST['accion'];
}

if ( ! empty($_POST['txtNombre'])) {
  $txtNombre = $_POST['txtNombre'];
}

if ( ! empty($_POST['txtDireccion'])){
  $txtDireccion = $_POST['txtDireccion'];
}

if ( ! empty($_POST['txtTelefono'])) {
  $txtTelefono = $_POST['txtTelefono'];
}

if ( ! empty($_POST['txtEmail'])){
  $txtEmail = $_POST['txtEmail'];
}



$idRegistro = NULL;

if ( ! empty($_POST['idRegistro'])) {
  $idRegistro = $_POST['idRegistro'];
}

require_once ("clsUsuario.php");

$objUsuario = new clsUsuario();

switch ($strAccion) {
  case "Guardar":

    if (empty($idRegistro)) {
      $objUsuario->create($txtNombre, $txtDireccion, $txtTelefono, $txtEmail);
    }
    else {
      $objUsuario->update($idRegistro, $txtNombre, $txtDireccion, $txtTelefono, $txtEmail);
    }

    break;

  case "eliminar":
    
    $idRegistro = $_GET['id'];
    
    $objUsuario->delete($idRegistro);
    break;
}

header("Location: index.php");
