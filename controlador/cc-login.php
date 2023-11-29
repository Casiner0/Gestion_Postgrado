<?php 
	require ("../modelo/dao-user.php");
	session_start();
	ob_start();
	extract($_REQUEST);
	sleep(2); // Espera 2 seguntos para que se pueda mostrar el botón
	$ob = new daoUser();

	// Crear arreglo con valores por defecto
    $salida = ['error' => true, 'rol' => 1, 'mensaje' => 'Acción no reconocida'];

    //Auntentificar Usuario
    $result = $ob->Autenticar($user, $pass);
    
    if(count($result) == 1){
		$_SESSION['username'] = $result[0]['nombre'];
		$salida['error'] = false;
		
		//Gestion de roles
		$_SESSION['rol'] = $salida['rol'] = $result[0]['idRol'];
		
	} else {
		if (trim($user) == "" || trim($pass) == "") {
		 	$salida['mensaje'] = 'Excisten campos vacios'; 
		}else{
			$salida['mensaje'] = 'Datos Incorrectos'; 
		} 
	}
		    
    // Devolver resultado en formato JSON
    print json_encode($salida, JSON_UNESCAPED_UNICODE);
    
    
    
			
            

	/*//Autenticar usuario
	if(isset($btn_enviar)){
		$result = $ob->Autenticar($user, $pass);
		if(count($result)>0){
			$_SESSION['username'] = $result[0]['nombre'];
			
			//Gestion de roles
			$rol = $result[0]['idRol'];
			$_SESSION['rol'] = $rol;
			
			switch ($_SESSION['rol']) {
				case 1:
					header("location: ../vista/pages/postgrados.php");
					break;
				case 2:
					header("location: ../vista/pages/reportes.php");
					break;
				default:
					echo "Rol no encontrado";      
					break;
			}
		} else {
			if (trim($usuario) == "" || trim($password) == "") {
			 	header("location: ../vista/index.php?error=2"); //campos vacios
			}else{
				header("location: ../vista/index.php?error=3"); //datos incorrectos
			} 
			
	    } 
	}*/

	
?>