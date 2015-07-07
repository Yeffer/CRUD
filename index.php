<?php
require_once("clsUsuario.php");

$objUsuario = new clsUsuario();

$arrUsuarios = $objUsuario->read();

$idEditar = NULL;

$txtNombre = NULL;
$txtReferencia = NULL;

if (!empty($_GET['id'])) {

    $idEditar = $_GET['id'];

    $arrReistro = $objUsuario->consulta_uno($idEditar);

    $txtNombre = $arrReistro['nombre'];
    $txtReferencia = $arrReistro['referencia'];
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
                            <h2>Datos</h2> 
                        </div>
                        <div class="form-group">
                            <!--<label>Nombre:</label> -->
                            <input class="form-control" type="text"  name="txtNombre" value="<?php echo $txtNombre ?>" placeholder="Nombre" required data-msg="Nombre Requerido" >
                        </div>
                        <div class="form-group">
                            <!--<label>Referencia:</label> -->
                            <input class="form-control" type="text" name="txtReferencia" value="<?php echo $txtReferencia ?>" placeholder="Referencia" required data-msg='Referencia Requerido'><br><br>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="accion" id="crear" value="Guardar" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>REFERENCIA</th>
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
                                echo "<td>" . $arrUsuario['referencia'] . "</td>";
                                echo "<td><a href='index.php?id=" . $arrUsuario['id'] . "' class='btn btn-info glyphicon glyphicon-edit' ></a> </td>";
                                echo "<td><a href='acciones_usuario.php?accion=eliminar&id=" . $arrUsuario['id'] . "'class='btn btn-danger glyphicon glyphicon-trash '></a></td>";                                
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body><span class="glyphicons glyphicons-remove-2"></span>
</html>