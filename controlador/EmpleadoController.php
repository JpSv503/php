<?php
require_once '../modelo/daoEmpleado.php';
$error="";
$object = new DaoEmpleado();
$message="";
    if(isset($_REQUEST["guardar"])){
        $e=new Empleado($_REQUEST["id_empleado"],$_REQUEST["nombre"],
        $_REQUEST["id_dep"]);
        $error=$object->insertarEmpleado($e);        
        $message="Registro agregado con éxito";
    }

    if(isset($_REQUEST["modificar"])){
        $e=new Empleado($_REQUEST["id_empleado"],$_REQUEST["nombre"],
        $_REQUEST["id_dep"]);
        $error=$object->modificarEmpleado($e);
        $message="Registro modificado con éxito";       
    }

    if(isset($_REQUEST["eliminar"])){
        $e=new Empleado($_REQUEST["id_empleado"],$_REQUEST["nombre"],
        $_REQUEST["id_dep"]);
        $error=$object->eliminarEmpleado($e);
        $message="Registro eliminado con éxito";
    }    

    $data=$object->mostrarEmpleado();
    $dep=$object->mostrarDepartamento();

    require_once '../vista/vista.php';
?>