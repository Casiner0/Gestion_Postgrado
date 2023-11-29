<?php

    include_once 'conexion.php';
    
    //Esta clase es para llenar la información de los select
    class daoNomencladores{
    
        function __construct(){
            
        }

        //function obtener datos de las categorias docentes
        function ObtenerCatDocentes(){
        	$sql = "SELECT * FROM catdocente";
        	$con = new conexion();
        	return $con->devolverResultados($sql);
        }

        //function obtener datos de las categorias cientificas
        function ObtenerCatCientifica(){
            $sql = "SELECT * FROM catcientifica";
            $con = new conexion();
            return $con->devolverResultados($sql);
        }
    
        //function obtener el tema del Postgrado
        function ObtenerTemaPostgrados(){
            $sql = "SELECT * FROM temapostgrado";
            $con = new conexion();
            return $con->devolverResultados($sql);
        }

        //function obtener Paises
        function ObtenerPaises(){
            $sql = "SELECT * FROM impartidoen";
            $con = new conexion();
            return $con->devolverResultados($sql);
        }  
                
    }

?>
