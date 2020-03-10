<?php
    if(!isset($_REQUEST["emp"])){
        header("Location:../controlador/EmpleadoController.php?m=1");
    }
?>

<!DOCTYPE html>
<html lang="en">
<!-- https://bootswatch.com/  free themes for bootstrap-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">        
        <link rel="stylesheet" href="src/css/bootstrap.min.css"></link>
        <script src="src/js/jquery-3.4.1.min.js"></script>
        <script src="src/js/bootstrap.min.js"></script>        
        <script src="src/js/sweetAlert.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#del").click(function(){
                    Swal.fire({
                        type:"warning",
                        title:"¿Está seguro de eliminar el registro?",
                        text:"Se eliminará permanentement",
                        showCancelButton: true,                        
                        confirmButtomColor:"green",
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'                        
                    }).then((result)=>{
                        if(result.value){
                            $("#f").append("<input type='hidden' name='eliminar'>");
                            $("#myform").submit();
                        }
                    });
                });
            });
        </script>
    <title>Empleados</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="#" class="navbar-brand"> Homework App </a>
        <ul class="navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
                <input type="search" id="search" class="form-control mr-sm-2" 
                placeholder="Search here">
                <button class="btn btn-success my-2 my-sm-0" type="submit">
                    search
                </button>

            </form>
        </ul>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-5">                
                <div class="card border-info mb-3">
                <div class="card-header">Employee</div>
                    <div class="card-body">
                        <form action="../controlador/EmpleadoController.php" id="myform" method="POST">
                        <div id="f"></div>
                            <div class="form-group">
                                <label for="id_empleado">Id</label>

                                <input type="text" id="id_empleado" name="id_empleado"
                                class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>

                                <input type="text" id="nombre" name="nombre"
                                class="form-control" placeholder="Nombre">                                
                            </div>
                            <div>
                                <label for="id_dep">Departamanto</label>
                                <select name="id_dep" id="id_dep" class="form-control">
                                    <option value="none">Seleccione...</option>
                                    <?php
                                        if(isset($_REQUEST["dep"])){
                                            $decodeDeptos =json_decode($_REQUEST["dep"]);
                                            foreach($decodeDeptos as $value){
                                                echo "<option value='$value->id_dep'>$value->nombre</option>";
                                            }
                                        }
                                    ?>
                                </select> <input type="hidden" name="m">
                            </div>
                                <br>                            
                            
                            <input type="submit" name="guardar" id="g" value="Save"
                            class="btn btn-primary btn-block text center" disabled="true">
                            <br>
                            <div>
                                <input type="button" value="New" onclick="$('#g').attr('disabled',false)"
                                class="btn btn-info btn-block text center">
                                <input type="submit" value="Edit" name="modificar" id="edit"
                                class="btn btn-primary btn-block text center">
                                <input type="button" value="Delete" name="eliminar" id="del"
                                class="btn btn-danger btn-block text center">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <table class="table table-bordered table-sm table-hover">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Departamento</td>
                            <td>Accion</td>
                        </tr> 
                    </thead>
                    <tbody id="task">
                        <?php
                            if(isset($_REQUEST["emp"])){
                                $decodeEmp =json_decode($_REQUEST["emp"]);
                                foreach($decodeEmp as $value){
                                    $nom=str_replace(" ","&nbsp;",$value->nombre);
                                    echo "<tr>".
                                    "<td>$value->id_empleado</td>".
                                    "<td>$value->nombre</td>".
                                    "<td>$value->id_dep</td>".
                                    "<td><buttom class='btn btn-info' onclick=$('#id_empleado').val('$value->id_empleado');".
                                    "$('#nombre').val('$nom');".
                                    "$('#id_dep').val('$value->id_dep');>Ver</buttom></td>".
                                    "</td>";
                                }
                            }

                            if(isset($_REQUEST["res"])){
                                $res=$_REQUEST["res"];
                                if($res!=""){
                                    echo "<script>Swal.fire('$res','','success')</script>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>