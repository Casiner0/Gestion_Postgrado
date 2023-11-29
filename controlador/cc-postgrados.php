<?php  

	include '../modelo/dao-postgrados.php';
	include '../modelo/dao-postgradoInt.php';
	extract($_REQUEST);
	
	// Crear arreglo con valores por defecto
    $salida = ['error' => true, 'mensaje' => 'Acción no reconocida'];

    // Definir acción con asignación ternaria
    $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 0;

    // Validar acción
    switch ($accion) {
        case 1: //Verificar código (pag postgrados.php)
            $objcodigo = new Postgrado();
            $buscarCod = $objcodigo->BuscarCodigoFull($text_codigo_postgrado);
            if (count($buscarCod) > 0){
                $salida['mensaje'] = "Código en uso";
            }else{
                $salida['error'] = false;
                $salida['mensaje'] = 'Código disponible';
            }
            break;
            
        case 2: //Insertar Postgrado Nacional o Internacional
            $post = new Postgrado($rbtnImpartido_Centro, $num_cant_alum, $num_cant_horas, $text_fecha_Inicio, $text_fecha_Final, $text_codigo_postgrado, $rbtnTipo, $select_tema, $select_profesor);
            $Nac = $post->InsertarPostgrado();

            $ID = $post->LastID();
            $ultimoID = $ID[0]['ultimoId'];

            //Insetar Postgrado Internacional
            if ($rbtnTipo == 2) {
                $postI = new PostgradoInt($ultimoID, $num_cant_alum_ext, $select_paises);
                $Int = $postI->InsertarPostgradoInt();
            }
            $salida['error'] = false;
            $salida['mensaje'] = 'Postgrado insertado correctamente';
            break;

        case 3: //Verificar código nacional (pag reportes.php)
            $objcodigo = new Postgrado();
            $buscarCod = $objcodigo->BuscarCodigo($buscar_codigo);
            if (count($buscarCod) == 0){
                $salida['mensaje'] = "El código no exciste";
            }else{
                $salida['error'] = false;
                $salida['mensaje'] = 'Código disponible';
            }
            break;
            
        case 4: //Verificar código internacional (pag reportes.php)
            $objcodigo = new PostgradoInt();
            $buscarCod = $objcodigo->BuscarCodigoInt($buscar_codigo);
            if (count($buscarCod) == 0){
                $salida['mensaje'] = "El código no exciste";
            }else{
                $salida['error'] = false;
                $salida['mensaje'] = 'Código disponible';
            }
            break;
                
        default:
            // El mensaje por defecto ya está definido
            break;
    }
    // Devolver resultado en formato JSON
    echo json_encode($salida);
?>