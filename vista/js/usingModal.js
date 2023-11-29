$(function() {
	
	//----- Modal (modificar_profesor)-----\\	
	$('#F5_profesor').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget) 				// Botón que activó el modal
	  	var id = button.data('id') 							// Extraer la información de atributos de datos
	  	var nombre = button.data('nombre') 					
	  	var edad = button.data('edad') 						
	  	var especialidad = button.data('especialidad') 
	  	var IdCatDocente = button.data('catdocente')
	  	var IdCatCientifica = button.data('catcientifica')
	  		
	  	
	  	//----- Asignación de valores-----\\
		var modal = $(this)
		modal.find('.modal-title').text('Modificando a '+nombre)
		modal.find('.modal-body #modal_IDprofesor').val(id)
		modal.find('.modal-body #modal_nombre').val(nombre)
		modal.find('.modal-body #modal_edad').val(edad)
		modal.find('.modal-body #modal_especialidad').val(especialidad)
		modal.find('.modal-body #modal_select_categ_doc').val(IdCatDocente)
		modal.find('.modal-body #modal_select_categ_cient').val(IdCatCientifica)
				
	})

	//----- Modal (modificar_postgrado)-----\\	
	$('#F5_postgrado').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget) 				// Botón que activó el modal
	  	var id = button.data('id') 							// Extraer la información de atributos de datos
	  	var codigo = button.data('codigo') 					
	  	var inicio = button.data('inicio') 		
	  	var fin = button.data('fin') 					
	  	var horas = button.data('horas') 		
	  	var alumnos = button.data('alumnos')
	  	var idtema = button.data('idtema')
	  	var idprofesor = button.data('idprofesor')


	  	//----- Asignación de valores-----\\
		var modal = $(this)
		modal.find('.modal-title').text('Modificando Postgrado Nacional')
		modal.find('.modal-body #modal_IDpostgrado').val(id)
		modal.find('.modal-body #modal_codigo').val(codigo)
		modal.find('.modal-body #modal_fecha_Inicio').val(inicio)
		modal.find('.modal-body #modal_fecha_Final').val(fin)
		modal.find('.modal-body #modal_horas').val(horas)
		modal.find('.modal-body #modal_cant_alum').val(alumnos)
		modal.find('.modal-body #modal_select_tema').val(idtema)
		modal.find('.modal-body #modal_select_profesor').val(idprofesor)
		
	})

	//----- Modal (modificar_postgradoInt)-----\\	
	$('#F5_postgradoInt').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget) 				// Botón que activó el modal
	  	var id = button.data('id') 							// Extraer la información de atributos de datos
	  	var codigo = button.data('codigo') 					
	  	var inicio = button.data('inicio') 		
	  	var fin = button.data('fin') 					
	  	var horas = button.data('horas') 		
	  	var alumnos = button.data('alumnos')
	  	var alumnosInt = button.data('alumnosint')
	  	var idtema = button.data('idtema')
	  	var idprofesor = button.data('idprofesor')
	  	var idpais = button.data('idpais')

	  	//----- Asignación de valores-----\\
		var modal = $(this)
		modal.find('.modal-title').text('Modificando Postgrado Internacional')
		modal.find('.modal-body #modal_IDpostgradoInt').val(id)
		modal.find('.modal-body #modal_codigoInt').val(codigo)
		modal.find('.modal-body #modal_fecha_InicioInt').val(inicio)
		modal.find('.modal-body #modal_fecha_FinalInt').val(fin)
		modal.find('.modal-body #modal_horasInt').val(horas)
		modal.find('.modal-body #modal_cant_alumNac').val(alumnos)
		modal.find('.modal-body #modal_cant_alumInt').val(alumnosInt)
		modal.find('.modal-body #modal_select_temaInt').val(idtema)
		modal.find('.modal-body #modal_select_profesorInt').val(idprofesor)
		modal.find('.modal-body #modal_select_pais').val(idpais)
		
	})

	//----- Modal (delete_profesor)-----\\
	$('#delete_profesor').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 				// Botón que activó el modal
		var id = button.data('id') 							// Extraer la información de atributos de datos
		
		//----- Asignación de valores-----\\
		var modal = $(this)
		modal.find('#modal_IDprofesor').val(id)
	})

	//----- Modal (delete_postgrado)-----\\
	$('#delete_postgrado').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 				// Botón que activó el modal
		var id = button.data('id') 							// Extraer la información de atributos de datos
		
		//----- Asignación de valores-----\\
		var modal = $(this)
		modal.find('#modal_IDpostgrado').val(id)
	})

	//----- Modal (delete_postgrado internacional)-----\\
	$('#delete_internacional').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 				// Botón que activó el modal
		var id = button.data('id') 							// Extraer la información de atributos de datos
		
		//----- Asignación de valores-----\\
		var modal = $(this)
		modal.find('#modal_delete_IDpostgradoInt').val(id)
	})

	//-------- Validaciones --------\\	

	//-----(modificar_profesor)-----\\

	$("#modal_btn_prosefor").click(function() {

		if (!validarTexto($("#modal_nombre"))) {
			$("#modal_nombre").addClass("is-invalid");
			$("#modal_alerta_nombre").show();
			$("#modal_nombre").focus();
			return false;
		} else {
			$("#modal_nombre").removeClass("is-invalid");
			$("#modal_alerta_nombre").hide();
		}

		if (!validarNumero($("#modal_edad").val()) || $("#modal_edad").val() < 18 || $("#modal_edad").val() > 99) {
			$("#modal_edad").addClass("is-invalid");
			$("#modal_alerta_edad").show();
			$("#modal_edad").focus();
			return false;
		} else {
			$("#modal_edad").removeClass("is-invalid");
			$("#modal_alerta_edad").hide();
		}

		if (!validarTexto($("#modal_especialidad"))) {
			$("#modal_especialidad").addClass("is-invalid");
			$("#modal_alerta_especialidad").show();
			$("#modal_especialidad").focus();
			return false;
		} else {
			$("#modal_especialidad").removeClass("is-invalid");
			$("#modal_alerta_especialidad").hide();
		}

		if (!validarSelect($("#modal_select_categ_doc"))) {
			$("#modal_select_categ_doc").addClass("is-invalid");
			$("#modal_select_categ_doc").focus();
			$("#modal_alerta_doc").show();
			return false;
		} else {
			$("#modal_select_categ_doc").removeClass("is-invalid");
			$("#modal_alerta_doc").hide();
		}

		if (!validarSelect($("#modal_select_categ_cient"))) {
			$("#modal_select_categ_cient").addClass("is-invalid");
			$("#modal_select_categ_cient").focus();
			$("#modal_alerta_cient").show();
			return false;
		} else {
			$("#modal_select_categ_cient").removeClass("is-invalid");
			$("#modal_alerta_cient").hide();
		}

	});


	//-----(modificar_postgrado nacional)-----\\

	$("#modal_codigo").focusout(function(){

		$("#modal_alerta_codigo").hide();
		$(this).removeClass("is-invalid");

	    if (!validarCodigo($(this).val())) {
	       $("#modal_alerta_codigo").show();
	       $(this).addClass("is-invalid");
	       $(this).focus();
	       return false;
	    } else {
	       $("#modal_alerta_codigo").hide();
	       $(this).removeClass("is-invalid");
	       
	    }
	
	});

	$("#modal_btn_postgrado").click(function(){

		if (!validarSelect($("#modal_select_tema"))) {
			$("#modal_select_tema").addClass("is-invalid");
			$("#modal_select_tema").focus();
			$("#modal_alerta_tema").show();
			return false;
		} else {
			$("#modal_select_tema").removeClass("is-invalid");
			$("#modal_alerta_tema").hide();
		}

		var aux = validarDate( $("#modal_fecha_Inicio"), $("#modal_fecha_Final"));

		$("#modal_alerta_inicio").hide();
		$("#modal_alerta_cierre").hide();
		$("#modal_alerta_fecha_incorrecta").hide();

		switch(aux){
			case 0: 
					break;
			case 1: $("#modal_alerta_inicio").show();
					return false;
					break;
			case 2: $("#modal_alerta_cierre").show();
					return false;
					break;
			case 3: $("#modal_alerta_fecha_incorrecta").show();
					return false;					
					break;
			default: alert("Hay un error"); 
					break;
		}

		if (!validarNumero($("#modal_horas").val())) {
			$("#modal_horas").addClass("is-invalid");
			$("#modal_alerta_horas").show();
			$("#modal_horas").focus();
			return false;
		} else {
			$("#modal_horas").removeClass("is-invalid");
			$("#modal_alerta_horas").hide();
		}

		if (!validarNumero($("#modal_cant_alum").val())) {
			$("#modal_cant_alum").addClass("is-invalid");
			$("#modal_alerta_alumnos").show();
			$("#modal_cant_alum").focus();
			return false;
		} else {
			$("#modal_cant_alum").removeClass("is-invalid");
			$("#modal_alerta_alumnos").hide();
		}

		if (!validarSelect($("#modal_select_profesor"))) {
				$("#modal_select_profesor").addClass("is-invalid");
				$("#modal_select_profesor").focus();
				$("#modal_alerta_profesor").show();
				return false;
			} else {
				$("#modal_select_profesor").removeClass("is-invalid");
				$("#modal_alerta_profesor").hide();
			}

		return true;
	})

	//-----(modificar_postgrado Internacional)-----\\

	$("#modal_codigoInt").focusout(function(){

		$("#modal_alerta_codigoInt").hide();
		$(this).removeClass("is-invalid");

	    if (!validarCodigo($(this).val())) {
	       $("#modal_alerta_codigoInt").show();
	       $(this).addClass("is-invalid");
	       $(this).focus();
	       return false;
	    } else {
	       $("#modal_alerta_codigoInt").hide();
	       $(this).removeClass("is-invalid");
	       
	    }
	
	});

	$("#modal_btn_postgradoInt").click(function(){

		if (!validarSelect($("#modal_select_temaInt"))) {
			$("#modal_select_temaInt").addClass("is-invalid");
			$("#modal_select_temaInt").focus();
			$("#modal_alerta_temaInt").show();
			return false;
		} else {
			$("#modal_select_temaInt").removeClass("is-invalid");
			$("#modal_alerta_temaInt").hide();
		}

		var aux = validarDate( $("#modal_fecha_InicioInt"), $("#modal_fecha_FinalInt"));

		$("#modal_alerta_inicioInt").hide();
		$("#modal_alerta_cierreInt").hide();
		$("#modal_alerta_fecha_incorrectaInt").hide();

		switch(aux){
			case 0: 
					break;
			case 1: $("#modal_alerta_inicioInt").show();
					return false;
					break;
			case 2: $("#modal_alerta_cierreInt").show();
					return false;
					break;
			case 3: $("#modal_alerta_fecha_incorrectaInt").show();
					return false;					
					break;
			default: alert("Hay un error"); 
					break;
		}

		if (!validarNumero($("#modal_horasInt").val())) {
			$("#modal_horasInt").addClass("is-invalid");
			$("#modal_alerta_horasInt").show();
			$("#modal_horasInt").focus();
			return false;
		} else {
			$("#modal_horasInt").removeClass("is-invalid");
			$("#modal_alerta_horasInt").hide();
		}

		if (!validarNumero($("#modal_cant_alumNac").val())) {
			$("#modal_cant_alumNac").addClass("is-invalid");
			$("#modal_alerta_alumnosNac").show();
			$("#modal_cant_alumNac").focus();
			return false;
		} else {
			$("#modal_cant_alumNac").removeClass("is-invalid");
			$("#modal_alerta_alumnosNac").hide();
		}

		if (!validarNumero($("#modal_cant_alumInt").val())) {
			$("#modal_cant_alumInt").addClass("is-invalid");
			$("#modal_alerta_alumnosInt").show();
			$("#modal_cant_alumInt").focus();
			return false;
		} else {
			$("#modal_cant_alumInt").removeClass("is-invalid");
			$("#modal_alerta_alumnosInt").hide();
		}

		if (!validarSelect($("#modal_select_profesorInt"))) {
			$("#modal_select_profesorInt").addClass("is-invalid");
			$("#modal_select_profesorInt").focus();
			$("#modal_alerta_profesorInt").show();
			return false;
		} else {
			$("#modal_select_profesorInt").removeClass("is-invalid");
			$("#modal_alerta_profesorInt").hide();
		}

		if (!validarSelect($("#modal_select_pais"))) {
			$("#modal_select_pais").addClass("is-invalid");
			$("#modal_select_pais").focus();
			$("#modal_select_pais").show();
			return false;
		} else {
			$("#modal_select_pais").removeClass("is-invalid");
			$("#modal_select_pais").hide();
		}


		return true;
	})


});

