<?php  

	include '../modelo/dao-postgrados.php';
	include '../modelo/dao-postgradoInt.php';
	include '../modelo/dao-profesores.php';
	
	extract($_REQUEST);
	$eliminar = (isset($_GET['eliminar'])) ? $_GET['eliminar'] : 0;

	if (isset($_GET['accion'])){
		switch ($_GET['accion']) {
			case 1: //Modificar Postgrado Nacional
				$obj = new Postgrado();
				$act = $obj->ModificarPostgrado($modal_IDpostgrado, $modal_select_tema, $modal_fecha_Inicio, $modal_fecha_Final, $modal_horas, $modal_cant_alum, $modal_select_profesor);
				break;

			case 2: //Modificar Postgrado Internacional
				$post = new Postgrado();
				$postInt = new PostgradoInt();

				$actNac = $post->ModificarPostgrado($modal_IDpostgradoInt, $modal_select_temaInt, $modal_fecha_InicioInt, $modal_fecha_FinalInt, $modal_horasInt, $modal_cant_alumNac, $modal_select_profesorInt);

				$actInt = $postInt->ModificarPostgradoInt($modal_IDpostgradoInt, $modal_cant_alumInt, $modal_select_pais);
				break;

			case 3: //Eliminar Postgrado Nacional
				$obj = new Postgrado();
				$del = $obj->EliminarPostgrado($modal_IDpostgrado);
				break;

			case 4: //Eliminar Postgrado Internacional
				$post = new Postgrado();
				$postInt = new PostgradoInt();
				$delInt = $postInt->EliminarPostgradoInt($eliminar);
				$del = $post->EliminarPostgrado($eliminar);
					
				break;

			case 5: //Cargar Tabla de Postgrado Nacional
				$obj = new Postgrado();
				$b = $obj->ObtenerPostgrados();
				echo json_encode($b);
				break;	
					
			case 6: //Cargar Tabla de Postgrado Internacional
				$obj = new PostgradoInt();
				$ob = $obj->ObtenerPostgradoInt();
				echo json_encode($ob);
				break;

			case 7: //Cargar Tabla de Postgrado Nacional x código
				$obj = new Postgrado();
				$b = $obj->ObtenerPostgradosByCodigo($codigo);
				echo json_encode($b);
				break;

			case 8: //Cargar Tabla de Postgrado Nacional segun fecha y categoría
				$obj = new Postgrado();
				$b = $obj->ObtenerPostgradosBy($curso_inicio, $curso_cierre, $select_cat_cientif);
				echo json_encode($b);
				break;	

			case 9: //Cargar Tabla de Postgrado Internacional x horas
				$inicio = (isset($_GET['inicio'])) ? $_GET['inicio'] : 0;
				$fin = (isset($_GET['fin'])) ? $_GET['fin'] : 0;
				$obj = new PostgradoInt();
				$ob = $obj->HorasInternacional($inicio, $fin);
				echo json_encode($ob);
				break;

			case 10: //Postgrado por especialidad
				$esp = (isset($_GET['especial'])) ? $_GET['especial'] : 0;
				$ubic = (isset($_GET['ubic'])) ? $_GET['ubic'] : 0;
				$obj = new Postgrado();
				$ob = $obj->PostgradoByCentroEspecialidad($ubic, $esp);
				echo json_encode($ob);
				break;

			case 11: //Profesor por especialidad
				$especialidad = (isset($_GET['especialidad'])) ? $_GET['especialidad'] : 0;
				$obj = new Profesor();
				$b = $obj->ObtenerProfesoresByEsp($especialidad);
				echo json_encode($b); 
				break;				
			default:
				echo "Acción no detectada";
				break;
		}

	}
?>

