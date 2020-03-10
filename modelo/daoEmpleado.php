<?php
require 'conexion.php';
require 'empleado.php';

    class DaoEmpleado extends Conexion{
        
        function __construct(){
            parent::__construct();
        }

        function buscarEmpleado(){            
                $res=$this->con->query("SELECT * FROM empleado WHERE nombre LIKE ?%");
                $r=array();
                while($row=$res->fetch_assoc()){
                    $e=new Empleado($row["id_empleado"], $row["nombre"], $row["id_dep"]);
                    $r[]=$e;
                }
                return $r;
            
        }

        function mostrarEmpleado(){
                $res=$this->con->query("SELECT * FROM empleado");
                $r=array();
                while($row=$res->fetch_assoc()){
                    $e=new Empleado($row["id_empleado"], $row["nombre"], $row["id_dep"]);
                    $r[]=$e;
                }
                return $r;
        }

        function mostrarDepartamento(){
                $res=$this->con->query("SELECT * FROM departamento");
                $r=array();
                while($row=$res->fetch_assoc()){
                    $r[]=$row;
            }
            return $r;
            
        }

        function insertarEmpleado($e){
            try{
                $param=$this->con->prepare("INSERT INTO empleado(id_empleado,nombre,id_dep) VALUES(?,?,?)");
                $param->bind_param('isi',$a,$b,$c);
                $a='';
                $b= $e->getNombre();
                $c= $e->getId_dep();
                $param->execute();
            }catch(Exeption $e){
                return $e;
            }finally{
                $param->close();
            }
        }

        function modificarEmpleado($e){
            try{
                $param=$this->con->prepare("UPDATE empleado SET nombre=?, id_dep=? WHERE id_empleado=?");
                $param->bind_param('sii',$a,$b,$c);
                $a=$e->getNombre();
                $b=$e->getId_dep() ;
                $c=$e->getId_empleado();
                $param->execute();
            }catch(Exeption $e){
                return $e;
            }finally{
                $param->close();
            }
        }

        function eliminarEmpleado($e){
            try{
                $param=$this->con->prepare("DELETE FROM empleado WHERE id_empleado=?");
                $param->bind_param('i',$a);
                $a=$e->getId_empleado();
                $param->execute();
            }catch(Exepion $e){
                return $e;
            }finally{
                $param->close();
            }
        }
    }
?>