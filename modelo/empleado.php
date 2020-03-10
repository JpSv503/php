<?php
    class Empleado{
        private $id_empleado;
        private $nombre;
        private $id_dep;

        function __construct($id_empleado, $nombre, $id_dep){
            $this->id_empleado = $id_empleado;
            $this->nombre = $nombre;
            $this->id_dep = $id_dep;
        }

        function getId_empleado(){
            return $this->id_empleado;
        }
        function getNombre(){
            return $this->nombre;
        }
        function getId_dep(){
            return $this->id_dep;
        }
    }
?>