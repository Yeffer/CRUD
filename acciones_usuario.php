<?php
if ( ! empty($_REQUEST['accion'])) {
  $strAccion = $_REQUEST['accion'];
}

if ( ! empty($_POST['txtNombre'])) {
  $txtNombre = $_POST['txtNombre'];
}

if ( ! empty($_POST['txtReferencia'])) {
  $txtReferencia = $_POST['txtReferencia'];
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
      $objUsuario->create($txtNombre, $txtReferencia);
    }
    else {
      $objUsuario->update($idRegistro, $txtNombre, $txtReferencia);
    }

    break;

  case "eliminar":
    
    $idRegistro = $_GET['id'];
    
    $objUsuario->delete($idRegistro);
    break;
}

header("Location: index.php");
