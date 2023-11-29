<?php

	//incluir fichero conexion según gestor de base de datos a utilizar
	include_once 'conexion.php';
	
	class Postgrado{
	
	    private $impartidoCentro;
	    private $cantAlumnos;
		private $cantHoras;
		private $fechaInicio;
		private $fechaFin;
		private $codigo;
		private $idTipoPostgrado;
		private $idTema;
		private $idProfesor;

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
	
	    function __constructArg($impartidoCentro, $cantAlumnos, $cantHoras, $fechaInicio,$fechaFin, $codigo, $idTipoPostgrado, $idTema, $idProfesor){
	        $this->impartidoCentro = $impartidoCentro;
			$this->cantAlumnos = $cantAlumnos;
			$this->cantHoras = $cantHoras;
			$this->fechaInicio = $fechaInicio;
			$this->fechaFin = $fechaFin;
			$this->codigo = $codigo;
			$this->TipoPostgrado = $idTipoPostgrado;
			$this->Tema = $idTema;
			$this->Profesor = $idProfesor;
	
	    }
		
		function InsertarPostgrado(){
            $conexion = new Conexion();
            $sql = "INSERT INTO postgrado (impartidoCentro, cantAlumnos, cantHoras, fechaInicio, fechaFin, codigo, idTipoPostgrado, idTema, idProfesor) VALUES ('$this->impartidoCentro', '$this->cantAlumnos', '$this->cantHoras', '$this->fechaInicio', '$this->fechaFin', '$this->codigo', '$this->TipoPostgrado', '$this->Tema', '$this->Profesor')";
            
            return $conexion->ejecutarConsulta($sql);
        }

        function EliminarPostgrado($idPostgrado){
            $conexion = new Conexion();
            $sql = "DELETE FROM postgrado WHERE idPostgrado = '$idPostgrado'";
            $conexion->ejecutarConsulta($sql);
        }

        function ModificarPostgrado($idPostgrado, $tema, $fechaInicio, $fechaFin, $cantHoras, $cantAlumnos, $profesor){
    		$conexion = new Conexion();
            $sql = "UPDATE postgrado SET cantAlumnos = '$cantAlumnos', cantHoras = '$cantHoras', fechaInicio = '$fechaInicio', fechaFin = '$fechaFin', idTema = '$tema', idProfesor = '$profesor' WHERE idPostgrado = '$idPostgrado'";
           $conexion->ejecutarConsulta($sql); 
        }

        function ObtenerPostgrados(){
            $sql = "SELECT p.idPostgrado idPostgrado, p.impartidoCentro impartido, p.cantAlumnos alumnos, p.cantHoras horas, p.fechaInicio inicio, p.fechaFin fin, p.codigo codigo, tipop.descripcion tipo, temap.idTema idtema, temap.descripcion tema, prof.idProfesor idprofesor, prof.nombre profesor FROM postgrado p 
            	JOIN profesor prof USING (idProfesor)
            	JOIN tipoPostgrado tipop USING (idTipoPostgrado)
            	JOIN temaPostgrado temap USING (idTema)
            	WHERE p.idTipoPostgrado = 1
            	ORDER BY codigo";
            $con = new conexion();
            return $con->devolverResultados($sql); 
        }

        function ObtenerPostgradosByCodigo($codigo){
            $sql = "SELECT p.idPostgrado idPostgrado, p.impartidoCentro impartido, p.cantAlumnos alumnos, p.cantHoras horas, p.fechaInicio inicio, p.fechaFin fin, p.codigo codigo, tipop.descripcion tipo, temap.descripcion tema, prof.nombre profesor FROM postgrado p 
            	JOIN profesor prof USING (idProfesor)
            	JOIN tipoPostgrado tipop USING (idTipoPostgrado)
            	JOIN temaPostgrado temap USING (idTema)
            	WHERE p.codigo = '$codigo' AND  p.idTipoPostgrado = 1";
            $con = new conexion();
            return $con->devolverResultados($sql);
        }

        function ObtenerPostgradosBy($desde, $hasta, $ccientif){
        	$sql = "SELECT p.idPostgrado idPostgrado, p.impartidoCentro impartido, p.cantAlumnos alumnos, p.cantHoras horas, p.fechaInicio inicio, p.fechaFin fin, p.codigo codigo, tipop.descripcion tipo, temap.descripcion tema, prof.nombre profesor FROM postgrado p 
            	JOIN profesor prof USING (idProfesor)
            	JOIN tipoPostgrado tipop USING (idTipoPostgrado)
            	JOIN temaPostgrado temap USING (idTema)
            	JOIN catcientifica cc USING (idCatCientifica)
            	WHERE p.fechaInicio >= '$desde' AND p.fechaFin <='$hasta' AND cc.idCatCientifica = '$ccientif' AND tipop.idTipoPostgrado = 1
                ORDER BY codigo";
            $con = new conexion();
            return $con->devolverResultados($sql);	
        }

        function PostgradoByCentroEspecialidad($impartido, $especialidad){
        	$sql = "SELECT p.idPostgrado, ROUND((p.cantHoras /12), 0) credito, p.codigo, temap.descripcion tema, tipop.descripcion tipo
                FROM postgrado p 
        		JOIN profesor prof USING (idProfesor) 
        		JOIN tipoPostgrado tipop USING (idTipoPostgrado)
        		JOIN temaPostgrado temap USING (idTema)
        		WHERE p.impartidoCentro = '$impartido' AND prof.especialidad = '$especialidad' 
        		ORDER BY credito DESC";

        	$con = new conexion();
            return $con->devolverResultados($sql);	
       	}

       	function LastID(){
       		$sql = "SELECT max(p.idPostgrado) ultimoId FROM postgrado p
       			";

       		$con = new conexion();
            return $con->devolverResultados($sql);
       	}

       	function BuscarCodigo($codigo){
       		$sql = "SELECT p.codigo FROM postgrado p
       			WHERE p.codigo = '$codigo' AND p.idTipoPostgrado = 1";
       		$con = new conexion();
            return $con->devolverResultados($sql);	
       	}

        function BuscarCodigoFull($codigo){
            $sql = "SELECT p.codigo FROM postgrado p
                WHERE p.codigo = '$codigo'";
            $con = new conexion();
            return $con->devolverResultados($sql);  
        }

        function PostgradosNoTerminados(){
            $inicio = date('Y-m-d', strtotime($inicio. '-1 year'));
            $fin = date("Y-m-d");
            $sql = "SELECT count(p.idPostgrado) cantPostgrados FROM postgrado p
                    WHERE p.fechaInicio >= '$inicio' AND p.fechaFin <= '$fin'";
            $con = new conexion();
            return $con->devolverResultados($sql);              
        }	
	}
	
?>

