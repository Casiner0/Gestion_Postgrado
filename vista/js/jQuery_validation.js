$(document).ready(function() {
	// El envio de los datos al servidor se hacen x ajax.js 
	//------------Pag Index-----------------\\
	
	$("#user").keyup(function() {
		
		$("#alerta_user_vacio").hide();
		
		var vu = validarUser($("#user")); 

		switch(vu){
			case 0: return true;
					break;
			case 1: $("#alerta_user_vacio").show().text("El campo usuario no puede estar vacío"); 
					return false;
					break;
			case 2: $("#alerta_user_vacio").show().text("Solo se admite texto"); 
					return false;
					break;
			case 3: $("#alerta_user_vacio").show().text("El usuario es muy largo"); 
					return false;					
					break;
			default: alert("Hay un error"); 
					break;
		}
	});

	$("#pass").keyup(function(){
		if (!validarPass($(this))) {
			$("#alerta_pass").show().text("Contraseña muy corta");
			return false;
		} else {
			$("#alerta_pass").hide();
			return true;
		}

	})

	//------------Pag Reportes--------------\\

	$("#btn_buscar_post_impartido").click(function(){
		
		var aux = validarDate( $("#curso_inicio"), $("#curso_cierre"));

		$("#curso_fecha_inicio").hide();
		$("#curso_fecha_cierre").hide();
		
		switch(aux){
			case 0: return true;
					break;
			case 1: $("#curso_fecha_inicio").show().text('Escoja la fecha de inicio');
					break;
			case 2: $("#curso_fecha_cierre").show().text('Escoja la fecha de cierre');
					break;
			case 3: $("#curso_fecha_inicio").show().text('Las fechas son incorrectas');
					break;
			default: alert("Hay un error"); 
					break;
		}

		if (!validarSelect($("#select_cat_cientif"))) {
			$("#select_cat_cientif").addClass("is-invalid");
			$("#select_cat_cientif").focus();
			$("#alerta_categoria").show();
			return false;
		} else {
			$("#select_cat_cientif").removeClass("is-invalid");
			$("#alerta_categoria").hide();
		}

		return true;
	})

	$("#btn_buscar_x_fecha").click(function(){
		var aux = validarDate( $("#date_fecha_inicio"), $("#date_fecha_cierre"));

		$("#alerta_fecha_inicio").hide();
		$("#alerta_fecha_cierre").hide();
		$("#alerta_fecha_incorrecta").hide();

		switch(aux){
			case 0: $("#datos_curso").show(500);
					return true;
					break;
			case 1: $("#alerta_fecha_inicio").show();
					break;
			case 2: $("#alerta_fecha_cierre").show();
					break;
			case 3: $("#alerta_fecha_incorrecta").show();
					break;
			default: alert("Hay un error"); 
					break;
		}
	})

	$("#btn_buscar_x_credito").click(function(){
		
		if (!validarTexto($("#text_segun_especialidad"))) {
			$("#text_segun_especialidad").addClass("is-invalid");
			$("#alerta_segun_especialidad").show();
			$("#text_segun_especialidad").focus();
			return false;
		} else {
			$("#text_segun_especialidad").removeClass("is-invalid");
			$("#alerta_segun_especialidad").hide();
			$("#text_segun_especialidad").val('');
			$("#datos_profesor").show(500);
			return true;
		}
	})

	$("#btn_buscar_x_esp").click(function(){

		if (!validarTexto($("#textEsp"))) {
			$("#textEsp").addClass("is-invalid");
			$("#alerta_especialidad").show();
			$("#textEsp").focus();
			return false;
		} else {
			$("#textEsp").removeClass("is-invalid");
			$("#alerta_especialidad").hide();
		}

		if (!validarSelect($("#selectUbicacion"))) {
			$("#selectUbicacion").addClass("is-invalid");
			$("#selectUbicacion").focus();
			$("#alerta_ubicacion").show();
			return false;
		} else {
			$("#selectUbicacion").removeClass("is-invalid");
			$("#alerta_ubicacion").hide();
		}

		$("#datos_credito").show(500);
		
		return true;
	})

	SobrePoner($("#datos_credito"), $("#datos_profesor"));
	SobrePoner($("#datos_profesor"), $("#datos_credito"));
	Cerrar($("#cerrar_emergente_buscar"), $("#emergente_buscar"));
	Cerrar($("#text_especialidad"), $("#datos_curso"));
	Cerrar($("#cerrar_curso"), $("#datos_curso"));
	Cerrar($("#cerrar_profesor"), $("#datos_profesor"));
	Cerrar($("#cerrar_credito"), $("#datos_credito"));
	

	//------------Pag Profesores--------------\\

	$("#btn_prosefor").click(function(){
		if (!validarTexto($("#text_nombre"))) {
			$("#text_nombre").addClass("is-invalid");
			$("#alerta_nombre").show();
			$("#text_nombre").focus();
			return false;
		} else {
			$("#text_nombre").removeClass("is-invalid");
			$("#alerta_nombre").hide();
		}

		if (!validarNumero($("#text_edad").val()) || $("#text_edad").val() < 18) {
			$("#text_edad").addClass("is-invalid");
			$("#alerta_edad").show();
			$("#text_edad").focus();
			return false;
		} else {
			$("#text_edad").removeClass("is-invalid");
			$("#alerta_edad").hide();
		}

		if (!validarTexto($("#text_especialidad"))) {
			$("#text_especialidad").addClass("is-invalid");
			$("#alerta_especialidad").show();
			$("#text_especialidad").focus();
			return false;
		} else {
			$("#text_especialidad").removeClass("is-invalid");
			$("#alerta_especialidad").hide();
		}

		if (!validarSelect($("#select_categ_doc"))) {
			$("#select_categ_doc").addClass("is-invalid");
			$("#select_categ_doc").focus();
			$("#alerta_doc").show();
			return false;
		} else {
			$("#select_categ_doc").removeClass("is-invalid");
			$("#alerta_doc").hide();
		}

		if (!validarSelect($("#select_categ_cient"))) {
			$("#select_categ_cient").addClass("is-invalid");
			$("#select_categ_cient").focus();
			$("#alerta_cient").show();
			return false;
		} else {
			$("#select_categ_cient").removeClass("is-invalid");
			$("#alerta_cient").hide();
			InsertarProfesor();
			return true;
		}

				
	})

	//------------Pag Postgrados--------------\\
	$("#alerta_insertado").hide();
	$("#btn_postgrado").click(function(event){
		

		if ($("#text_codigo_postgrado").val() == "") {
			$("#text_codigo_postgrado").addClass("is-invalid");
			$("#codigo_exciste").show();
			$("#text_codigo_postgrado").focus();
			return false;
		} else {
			$("#codigo_exciste").hide();
			$("#text_codigo_postgrado").removeClass("is-invalid");
			
		}

		if (!validarSelect($("#select_tema"))) {
			$("#select_tema").addClass("is-invalid");
			$("#select_tema").focus();
			$("#alerta_tema").show();
			return false;
		} else {
			$("#select_tema").removeClass("is-invalid");
			$("#alerta_tema").hide();
		}
		
		var aux = validarDate( $("#text_fecha_Inicio"), $("#text_fecha_Final"));

		$("#alerta_inicio").hide();
		$("#alerta_cierre").hide();
		$("#alerta_fecha_incorrecta").hide();

		switch(aux){
			case 0: 
					break;
			case 1: $("#alerta_inicio").show();
					return false;
					break;
			case 2: $("#alerta_cierre").show();
					return false;
					break;
			case 3: $("#alerta_fecha_incorrecta").show();
					return false;					
					break;
			default: alert("Hay un error"); 
					break;
		}

		if (!validarSelect($("#select_profesor"))) {
				$("#select_profesor").addClass("is-invalid");
				$("#select_profesor").focus();
				$("#alerta_profesor").show();
				return false;
			} else {
				$("#select_profesor").removeClass("is-invalid");
				$("#alerta_profesor").hide();
			}

		if (!$('input[name="rbtnTipo"]').is(':checked')) {
			$("#alerta_opcion_tipo").show();
			return false;
		}else{
			$("#alerta_opcion_tipo").hide();
		}

		if (!$('input[name="rbtnImpartido_Centro"]').is(':checked')) {
			$("#alerta_opcion_imp").show();
			return false;
		}else{
			$("#alerta_opcion_imp").hide();
		}

		if (!validarNumero($("#num_cant_horas").val())) {
			$("#num_cant_horas").addClass("is-invalid");
			$("#alerta_horas").show();
			$("#num_cant_horas").focus();
			return false;
		} else {
			$("#num_cant_horas").removeClass("is-invalid");
			$("#alerta_horas").hide();
		}

		if (!validarNumero($("#num_cant_alum").val())) {
			$("#num_cant_alum").addClass("is-invalid");
			$("#alerta_alumnos").show();
			$("#num_cant_alum").focus();
			return false;
		} else {
			$("#num_cant_alum").removeClass("is-invalid");
			$("#alerta_alumnos").hide();
		}

		if ($("#radio_ext").is(":checked")) {
			if (!validarNumero($("#num_cant_alum_ext").val())) {
				$("#num_cant_alum_ext").addClass("is-invalid");
				$("#alerta_alumnos_ext").show();
				$("#num_cant_alum_ext").focus();
				return false;
			} else {
				$("#num_cant_alum_ext").removeClass("is-invalid");
				$("#alerta_alumnos_ext").hide();
			}

			if (!validarSelect($("#select_paises"))) {
				$("#select_paises").addClass("is-invalid");
				$("#select_paises").focus();
				$("#alerta_pais").show();
				return false;
			} else {
				$("#select_paises").removeClass("is-invalid");
				$("#alerta_pais").hide();
			}
		} else {
			InsertarPostgrado();
			return true;
		}
	});

	$("#radio_ext").click(function(){
		$("#div_pais").show(500);
		$("#alum_ext").show(500);
	})

	$("#radio_centro").click(function(){
		$("#div_pais").hide(500);
		$("#alum_ext").hide(500);
	})

})



//-----------Funciones Generales-----------\\

function validarNumero(numero){
	var exprecion = /^[0-9]+$/;
	if (numero == "" || !exprecion.test(numero)) {
		return false;
	}else{
		return true;
	}
}	

function validarCodigo(codigo){
    var codigoSeparado = codigo.split('-');
    if (codigoSeparado[0] != "PG" || !validarNumero(codigoSeparado[1])) {
        return false;
    } else {
        return true;
    }
}

function validarTexto(texto){
	var exprecion = /^[a-zA-ZñÑ .áéíóú]+$/;
	if (texto.val() == "" || !exprecion.test(texto.val())) {
		return false;
	}else{
		return true;
	}
}

function validarUser(user){
	var exprecion = /^[a-zñ]+$/;
	
	if (user.val() == "") {
		user.addClass("is-invalid");
		return 1;
	}else{
		user.removeClass("is-invalid");
	}

	if (!exprecion.test(user.val())) {
		user.addClass("is-invalid");
		return 2;
	}else{
		user.removeClass("is-invalid");
	}

	if (user.val().length > 15) {
		user.addClass("is-invalid");
		return 3;
	}else{
		user.removeClass("is-invalid");
		return 0;
	}
}

function validarPass(pass) {
	if (pass.val().length < 8) {
		pass.addClass('is-invalid');
		pass.focus();
		return false;
	} else {
		pass.removeClass("is-invalid");
		return true;
	}
}

function validarSelect(select){
	if (select.val() == 0) {
		return false;
	} else {
		return true;
	}
}

function validarDate(date1, date2) {
	
	if (date1.val() === "") {
		date1.addClass("is-invalid");
		date1.focus();
		return 1;
	} else {
		date1.removeClass("is-invalid");
	}

	if (date2.val() === "") {
		date2.addClass("is-invalid");
		date2.focus();
		return 2;
	} else { 
		date2.removeClass("is-invalid");
	}

	if (date2.val() < date1.val()) {
		date1.addClass("is-invalid");
		date2.addClass("is-invalid");
		date1.focus();
		return 3;
	}else{
		date1.removeClass("is-invalid");
		date2.removeClass("is-invalid");
		return 0;
	}
}
/*
function Cerrar(boton, div) {
	boton.click(function () {
		div.hide(500);
	})
}

function SobrePoner(div1, div2) {
	div1.click(function(){
		div1.removeClass("nivel_2");
		div1.addClass("nivel_3");
		div2.removeClass("nivel_3");
		div2.addClass("nivel_2");	
	})
}
*/
function MostrarMensaje(div) {
	div.slideDown(1000);
	setTimeout(function(){
		div.slideUp(500);
	}, 3000);
}

