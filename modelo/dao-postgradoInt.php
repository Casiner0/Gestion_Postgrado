<?php 
	
	include_once 'conexion.php';

	class PostgradoInt{

		private $cantAlumnosInt;
		private $pais;
		private $idPostgrado;

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
		
		function __constructArg($idPost, $cantAlumnosInt, $pais){

			$this->cantAlumnosInt = $cantAlumnosInt;
			$this->pais = $pais;
			$this->idPostgrado = $idPost;
		}

		function InsertarPostgradoInt(){
			$sql = "INSERT INTO postgradointernacional (idPostgrado, cantPaisesAlumnos, idImpartido) VALUES ('$this->idPostgrado', '$this->cantAlumnosInt', '$this->pais')";

			$conexion = new Conexion();
			$conexion->ejecutarConsulta($sql);
		}

		function ModificarPostgradoInt($idPost, $cantAlumnosInt, $pais){
			$sql = "UPDATE postgradointernacional SET cantPaisesAlumnos = '$cantAlumnosInt', idImpartido ='$pais' WHERE idPostgrado = '$idPost'";
			$conexion = new Conexion();
			$conexion->ejecutarConsulta($sql);
		}

		function EliminarPostgradoInt($idPost){
			$sql = "DELETE FROM postgradointernacional
				WHERE idPostgrado = '$idPost'";
			$conexion = new Conexion();
			$conexion->ejecutarConsulta($sql);
		}

		function ObtenerPostgradoInt(){
			$sql = "SELECT p.idPostgrado idPostgrado, p.impartidoCentro impartido, p.cantAlumnos alumnos, p.cantHoras horas, p.fechaInicio inicio, p.fechaFin fin, p.codigo codigo, tipop.descripcion tipo, temap.idTema idtema, temap.descripcion tema, prof.idProfesor idprofesor, prof.nombre profesor, pi.cantPaisesAlumnos alumnosInt, pi.idImpartido Idpais, pais.descripcion pais FROM postgrado p 
            	JOIN profesor prof USING (idProfesor)
            	JOIN tipoPostgrado tipop USING (idTipoPostgrado)
            	JOIN temaPostgrado temap USING (idTema)
            	JOIN postgradointernacional pi USING (idPostgrado)
            	JOIN impartidoen pais USING (idImpartido)
            	WHERE p.idTipoPostgrado = 2 
            	ORDER BY codigo";
			$conexion = new Conexion();
            return $conexion->devolverResultados($sql);
		}

		function ObtenerPostgradoByCodigoInt($codigo){
			$sql = "SELECT p.idPostgrado idPostgrado, p.impartidoCentro impartido, p.cantAlumnos alumnos, p.cantHoras horas, p.fechaInicio inicio, p.fechaFin fin, p.codigo codigo, tipop.descripcion tipo, temap.idTema idtema, temap.descripcion tema, prof.idProfesor idprofesor, prof.nombre profesor, pi.cantPaisesAlumnos alumnosInt, pi.idImpartido Idpais, pais.descripcion pais FROM postgrado p 
            	JOIN profesor prof USING (idProfesor)
            	JOIN tipoPostgrado tipop USING (idTipoPostgrado)
            	JOIN temaPostgrado temap USING (idTema)
            	JOIN postgradointernacional pi USING (idPostgrado)
            	JOIN impartidoen pais USING (idImpartido)
            	WHERE p.idTipoPostgrado = 2 AND p.codigo = '$codigo' 
            	ORDER BY codigo";
			$conexion = new Conexion();
            return $conexion->devolverResultados($sql);
		}

		function BuscarCodigoInt($codigo){
       		$sql = "SELECT p.codigo FROM postgrado p
       			WHERE p.codigo = '$codigo' AND p.idTipoPostgrado = 2";
       		$con = new conexion();
            return $con->devolverResultados($sql);	
       	}

		//Función para dar la cantidad de horas en un postgrado internacional
		function HorasInternacional($inicio, $fin){
			$sql = "SELECT p.idPostgrado idPostgrado, p.cantHoras horas, p.codigo codigo, temap.idTema idtema, temap.descripcion tema FROM postgrado p 
				JOIN temaPostgrado temap USING (idTema)
				WHERE p.idTipoPostgrado = 2 AND p.impartidoCentro = 'NO'
				AND p.fechaInicio >= '$inicio' AND p.fechaFin <= '$fin' 
				ORDER BY codigo";
			$conexion = new Conexion();
            return $conexion->devolverResultados($sql);	
		}
	}


?>