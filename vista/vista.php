<!DOCTYPE html>
<html lang="es">
<!-- https://bootswatch.com/  free themes for bootstrap-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <?php
        include 'src/files/scripts.php';
    ?>        
    <title>Empleados</title>
</head>
<body>
    <?php
        include 'src/files/header.php';
    ?>
    <div class="container p-4">    
    <div class="col-md-6">
        <div class="btn btn-success" id="agregarEmpleado">Agregar</div>
    </div><br>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover" width="100%" cellspacing="0" id="dataEmpleados">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Departamento</td>
                            <td>Accion</td>
                        </tr> 
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Departamento</td>
                            <td>Accion</td>
                        </tr> 
                    </tfoot>
                    <tbody id="task">
                    <!-- Datos traidos del Controlador -->                    
                        <?php                                                    
                            foreach($data as $value){
                                $id_empleado=$value->getId_empleado();
                                $nom=str_replace(" ","&nbsp;",$value->getNombre());
                                $id_dep=$value->getId_dep();
                                    echo "<tr>".
                                    "<td>$id_empleado</td>".
                                    "<td>$nom</td>".
                                    "<td>$id_dep</td>".
                                    "<td>".
                                    "<button class='btn btn-primary editarEmpleado' id='$id_empleado'>".
                                    "editar".
                                    "</button>".
                                    "<button class='btn btn-danger eliminarEmpleado' id='$id_empleado'>".
                                    "Eliminar".
                                    "</button>".
                                    "</td>";
                                }
                            /**
                             * Alerta de confirmación, traida del controlador
                             */
                                $res=$message;
                                if($res!=""){
                                    echo "<script>Swal.fire('$res','','success')</script>";
                                }
                        ?>
                    </tbody>
                </table>
                <?=$error?>
            </div>
        </div>
    </div>
    
<!-- Insert Empleado Modal -->
<?php
    include 'src/files/modals/empleadoModal.php';
?>
<!-- Edit Empleado Modal -->
<?php
    include 'src/files/modals/editempleadoModal.php';
?>
</body>
</html>