<?php  

	include '../modelo/dao-profesores.php';
	include '../modelo/dao-postgrados.php';

	extract($_REQUEST);
	
	if (isset($_GET['accion'])){
		switch ($_GET['accion']) {
			case 1: //Insertar Profesor
				$obj = new Profesor($text_nombre, $text_edad, $text_especialidad, $select_categ_doc, $select_categ_cient);
				$obj->InsertarProfesor();
				break;
			case 2: //Modificar Profesor
				$obj = new Profesor($modal_nombre, $modal_edad, $modal_especialidad, $modal_select_categ_doc, $modal_select_categ_cient);
				$obj->ModificarProfesor($modal_IDprofesor);
				break;
			case 3: //Eliminar Profesor
				$obj = new Profesor();
				$b = $obj->EliminarProfesor($modal_IDprofesor);
				break;
			case 4: //Cargar lista
				$obj = new Profesor();
				$b = $obj->ObtenerProfesores();
				print json_encode($b, JSON_UNESCAPED_UNICODE); //Convetir a JSON
				break;
			case 5: //Autocompletar Especialidad
				$obj = new Profesor();
				$esp = $_POST['q'];
				$b = $obj->AutoComp_Esp($esp);
				echo json_encode($b);; //Convetir a JSON
				break;				
			default:
				echo "Acción no detectada";
				break;
		}

	}
?>