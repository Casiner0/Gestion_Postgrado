<?php

    //incluir fichero conexion según gestor de base de datos a utilizar
    include_once 'conexion.php';
    
    class Profesor{
    
        private $nombre;
        private $edad;
    	private $especialidad;
    	private $idCategoriaDocente;
    	private $idCatCientifica;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if ($i > 0) {
                call_user_func_array(array($this, '__constructArg'), $a);
            } else {
                call_user_func_array(array($this, '__constructEmpty'), $a);
            }
        }
    
        function __constructEmpty(){
    
        }
        
        function __constructArg($nombre, $edad, $especialidad, $idCategoriaDocente,$idCatCientifica){
            $this->nombre = $nombre;
    		$this->edad = $edad;
    		$this->especialidad = $especialidad;
    		$this->catDocente = $idCategoriaDocente;
    		$this->catCientifica = $idCatCientifica;
        }
    	
    	function InsertarProfesor(){
            $conexion = new Conexion();
            $sql = "INSERT INTO profesor (nombre, edad, especialidad, idCategoriaDocente, idCatCientifica) VALUES ('$this->nombre', '$this->edad', '$this->especialidad', '$this->catDocente', '$this->catCientifica')";
            
            $conexion->ejecutarConsulta($sql);
        }

        function EliminarProfesor($idProfesor){
            $conexion = new Conexion();
            $sql = "DELETE FROM profesor WHERE idProfesor = '$idProfesor'";
            $conexion->ejecutarConsulta($sql);
        }

    	function ModificarProfesor($idProfesor){
            $conexion = new Conexion();
            $sql = "UPDATE profesor SET nombre = '$this->nombre', edad = '$this->edad', especialidad = '$this->especialidad', idCategoriaDocente = '$this->catDocente', idCatCientifica = '$this->catCientifica' WHERE idProfesor = '$idProfesor'";
            $conexion->ejecutarConsulta($sql);
        }

        function ObtenerProfesores(){
            $sql = "SELECT p.idProfesor AS idProfesor, p.nombre AS nombre, p.edad AS edad, p.especialidad AS especialidad, cc.idCatCientifica AS IdCatCientifica, cc.descripcion AS Cdescripcion, cd.idCategoriaDocente AS IdCatDocente, cd.descripcion AS Ddescripcion FROM profesor AS p 
                JOIN catdocente AS cd ON (cd.idCategoriaDocente = p.idCategoriaDocente)
                JOIN catcientifica AS cc ON (cc.idCatCientifica = p.idCatCientifica)
                ORDER BY nombre ASC";
            $con = new conexion();
            return $con->devolverResultados($sql);
        }

        function ObtenerProfesoresByEsp($especialidad){
            $sql = "SELECT ROUND((post.cantHoras /12), 0) credito, p.idProfesor idProfesor, p.nombre nombre, p.edad edad, p.especialidad especialidad, cc.idCatCientifica IdCatCientifica, cc.descripcion Cdescripcion, cd.idCategoriaDocente IdCatDocente, cd.descripcion Ddescripcion FROM profesor p 
                JOIN catdocente cd USING (idCategoriaDocente)
                JOIN catcientifica cc USING (idCatCientifica)
                JOIN postgrado post USING (idProfesor)
                WHERE post.impartidoCentro = 'SI' AND post.idTipoPostgrado = 2 AND p.especialidad = '$especialidad' 
                ORDER BY credito DESC";
            $con = new conexion();
            return $con->devolverResultados($sql);
        } 

        function ObtenerCatDocenteBy($idProfesor){
            $sql = "SELECT idCategoriaDocente FROM profesor 
                WHERE idProfesor = '$idProfesor'";
            $conexion = new Conexion();
            return $conexion->devolverResultados($sql);   

        }

        function AutoComp_Esp($esp){
            $sql = "SELECT especialidad FROM profesor
                WHERE especialidad LIKE '%$esp%'
                GROUP BY especialidad";
            $conexion = new Conexion();
            return $conexion->devolverResultados($sql); 
        }    
    }

?>
