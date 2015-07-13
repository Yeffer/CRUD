<?php
require_once("clsUsuario.php");

$objUsuario = new clsUsuario();

$arrUsuarios = $objUsuario->read();

$idEditar = NULL;

$txtNombre = NULL;
$txtDireccion = NULL;
$txtTelefono = NULL;
$txtEmail = NULL;   


if (!empty($_GET['id'])) {

    $idEditar = $_GET['id'];

    $arrReistro = $objUsuario->consulta_uno($idEditar);

    $txtNombre = $arrReistro['nombre'];
    $txtDireccion = $arrReistro['direccion'];
    $txtTelefono = $arrReistro['telefono'];
    $txtEmail = $arrReistro['email'];
}
?>
<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css"> 
    </head>
    <body>

   <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="acciones_usuario.php" method="POST" >            
                    <input type="hidden" name="idRegistro" value="<?php echo $idEditar ?>" />
                    <div class="form-group">
                        <h6></h6>
                        <label for="name" class="col-sm-2 control-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text"  name="txtNombre" value="<?php echo $txtNombre ?>" placeholder="Nombre" required data-msg="Nombre Requerido" >
                        </div>
                    </div>                            
                    <div class="form-group">
                        <label for="street" class="col-sm-2 control-label">Dirección:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="txtDireccion" value="<?php echo $txtDireccion ?>" placeholder="Dirección" required data-msg='Dirección Requerido'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="street" class="col-sm-2 control-label">Teléfono:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="txtTelefono" value="<?php echo $txtTelefono ?>" placeholder="Teléfono" required data-msg='Teléfono Requerido'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="street" class="col-sm-2 control-label">E-mail:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="txtEmail" value="<?php echo $txtEmail ?>" placeholder="E-mail" required data-msg='E-mail Requerido'>
                        </div>
                    </div>                  
                    <div class="form-group">                        
                        <div class="col-lg-8">
                            <input class="btn btn-success" type="submit" name="accion" id="crear" value="Guardar" />
                        </div>
                    </div>                                            
                </form>
            </div>
        </div>
    </div><br>

    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>DIRECCION</th>
                        <th>TELÉFONO</th>                        
                        <th>E-MAIL</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>                          
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($arrUsuarios as $arrUsuario) {
                        echo "<tr>";
                            echo "<td>" . $arrUsuario['id'] . "</td>";
                            echo "<td>" . $arrUsuario['nombre'] . "</td>";
                            echo "<td>" . $arrUsuario['direccion'] . "</td>";
                            echo "<td>" . $arrUsuario['telefono']. "</td>";
                            echo "<td>" . $arrUsuario['email']. "</td>";                            
                            echo "<td><a href='index.php?id=" . $arrUsuario['id'] . "' class='btn btn-info glyphicon glyphicon-edit' ></a> </td>";
                            echo "<td><a href='acciones_usuario.php?accion=eliminar&id=" . $arrUsuario['id'] . "'class='btn btn-danger glyphicon glyphicon-trash '></a></td>";                                
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
    </body>
</html>       