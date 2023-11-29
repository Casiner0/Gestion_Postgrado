$(function() {
	/*la variable roles se encuenta en cbezaraHTML.php y es la encargada de capturar
	el valor del $rol que está en lenguaje PHP*/

	//------Pág Index------\\
	$("#alerta_login").hide();
	$("#btn_enviar").on('click', function(event) {
		event.preventDefault();
		login_AJAX();
	});

	//------Pág Profesores------\\
	Autocompletar($("#text_especialidad"));
	Autocompletar($("#modal_especialidad"));
	ListaProfesores();
	$("#btn_prosefor").on('click', function(event) {
		event.preventDefault();	//Evita que se recargue la página
		InsertarProfesor();
	});
		

	$("#modal_btn_prosefor").on('click', function(event) {
		event.preventDefault();
		ActualizarProfesor();
		$("#F5_profesor").modal('hide');
	});

	$("#modal_btn_delete_profesor").on('click', function(event) {
		event.preventDefault();
		EliminarProfesor();
		$("#delete_profesor").modal('hide');
	});
	
	
	//------Pág Postgrados------\\
	Autocompletar($("#textEsp"));
	Autocompletar($("#textEspecialidad"));
	$("#text_codigo_postgrado").focusout(function(event){
		event.preventDefault();
		$("#codigo_exciste").hide();
		$(this).removeClass("is-invalid");
		VerificarCodigo($('#text_codigo_postgrado'), $("#codigo_exciste"), $("#form_postgrado"), 1);
	});

	$("#btn_postgrado").on('click', function(event){
		event.preventDefault();
		InsertarPostgrado();
	})

	//------Pág Reportes------\\
	
	ListaPostgradoNac();
	ListaPostgradoInt();
	
	$("#modal_btn_postgrado").on('click', function(event){
		event.preventDefault();
		ActualizarPostgradoNac();
		$("#F5_postgrado").modal('hide');
		$("#emergente_buscar").modal('hide');
	});

	$("#modal_btn_delete_postgrado").on('click', function(event) {
		event.preventDefault();
		EliminarPostgradoNac();
		$("#delete_postgrado").modal('hide');
		$("#emergente_buscar").modal('hide');
	});

	$("#modal_btn_postgradoInt").on('click', function(event){
		event.preventDefault();
		ActualizarPostgradoInt();
		$("#F5_postgradoInt").modal('hide');
	});

	$("#modal_btn_delete_postgradoInt").on('click', function(event) {
		event.preventDefault();
		Eliminar_PostgradoInt();
		$("#delete_internacional").modal('hide');
	});

	$("#btn_buscar_postgrado").on('click', function(event) {
		event.preventDefault();
		VerificarCodigo($('#buscar_codigo'), $("#alerta_post"), $("#form_buscarCodigo"), 3);
		if ($('#buscar_codigo').hasClass('is-invalid') ) {
			return false;
		} else {
			$("#emergente_buscar").modal('show');
			var codigo = $("#buscar_codigo").val();
			$("#codigo").val(codigo);
			$("#buscar_codigo").val('');
			
			if (roles == 1) {
				BuscarPostgradoNac();
			} else {
				BuscarPostgradoNacInv();
			}
		}
			
		return true;
	});

	$("#btn_buscar_post_impartido").on('click', function(event){
		event.preventDefault();
		if ($('#curso_inicio').hasClass('is-invalid') || $('#curso_cierre').hasClass('is-invalid') || $('#select_cat_cientif').hasClass('is-invalid')) {
			return false;
		} else {
			if (roles == 1) {
				BuscarPostgradoNacBy();
			} else {
				BuscarPostgradoNacByInv();
			}

			$("#emergente_buscar").modal('show');
			$("#curso_inicio").val('');
			$("#curso_cierre").val('');
			$("#select_cat_cientif").val(0);
		}
			
		return true;
	})

	$("#btn_buscar_x_fecha").click(function(event) {
		event.preventDefault();
		if ($('#date_fecha_inicio').hasClass('is-invalid') || $('#date_fecha_cierre').hasClass('is-invalid')) {
			return false;
		} else {
			PostgradoByHoras();
			
			$("#emergente_buscarHoras").modal('show');
			$("#date_fecha_inicio").val('');
			$("#date_fecha_cierre").val('');
			
		}
	});

	$("#btn_buscar_x_esp").click(function(event){
		event.preventDefault();
		if ($('#textEsp').hasClass('is-invalid') || $('#selectUbicacion').hasClass('is-invalid')) {
			return false;
		} else {
			PostgradoByEspecialidad();
						
			$("#postXesp").modal('show');
			$("#textEsp").val('');
			$("#selectUbicacion").val(0);
			
		}
	})

	$("#btn_buscar_x_credito").click(function(event){
		event.preventDefault();
		if ($('#textEspecialidad').hasClass('is-invalid')) {
			return false;
		} else {
			ProfesorXespecialidad();

			$("#emergente_profesor").modal('show');
			$("#textEspecialidad").val('');
			
			
		}
	})	
});

//Función para insertar un profesor
function InsertarProfesor() {
	var datos = $("#form_profesor").serialize();

	$.ajax({
		url: '../../controlador/cc-profesores.php?accion=1',
		type: 'POST',
		data: datos,
		success: function (e) {
			if (e) {
				ListaProfesores();
				$("#form_profesor").trigger('reset');
				MostrarMensaje($("#alerta_insertado"));
			} else {
				alert ("NO se pudo Insertar");
			}
		}
	})
	
	return false;
}

//Función para insertar un postgrado
function InsertarPostgrado() {	
	
	var datos = $("#form_postgrado").serialize();

	$.ajax({
		url: '../../controlador/cc-postgrados.php?accion=2',
		type: 'POST',
		data: datos,
		dataType: 'json',
		success: function (e) {
			if (e.error) {
				alert ("No se pudo Insertar");
			} else {
				$("#form_postgrado").trigger('reset'); 
				MostrarMensaje($("#alerta_insertado"));
			}
		}
	})

}

//Función para actualizar un profesor
function ActualizarProfesor() {
	
	var datos = $("#form_modal_F5_profesor").serialize();

	$.ajax({
		url: '../../controlador/cc-profesores.php?accion=2',
		type: 'POST',
		data: datos,
		success: function (e) {
			if (e != 1) {
				ListaProfesores();
			} else {
				alert ("NO se pudo Actualizar");
			}
		}
	})
	
	return false;
}


//Función para actualizar un PostgradoNac
function ActualizarPostgradoNac() {
	
	var datos = $("#form_modal_F5_postgrado").serialize();

	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=1',
		type: 'POST',
		data: datos,
		success: function (e) {
			if (e != 1) {
				ListaPostgradoNac();
			} else {
				alert ("NO se pudo Actualizar");
			}
		}
	})
	
	return false;
}

//Función para actualizar un PostgradoInt
function ActualizarPostgradoInt() {
	
	var datos = $("#form_modal_F5_postgradoInt").serialize();

	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=2',
		type: 'POST',
		data: datos,
		success: function (e) {
			if (e != 1) {
				ListaPostgradoInt();
			} else {
				alert ("NO se pudo Actualizar");
			}
		}
	})
	
	return false;
}

//Función para eliminar un profesor
function EliminarProfesor() {
	
	var datos = $("#form_modal_delete_profesor").serialize();

	$.ajax({
		url: '../../controlador/cc-profesores.php?accion=3',
		type: 'POST',
		data: datos,
		success: function (e) {
			if (e != 1) {
				ListaProfesores();
			} else {
				alert ("NO se pudo Eliminar");
			}
		}
	})
	
	return false;
}


//Función para eliminar un postgrado Nacional
function EliminarPostgradoNac() {
	
	var datos = $("#form_modal_delete_postgrado").serialize();

	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=3',
		type: 'POST',
		data: datos,
		success: function (e) {
			if (e != 1) {
				ListaPostgradoNac();
			} else {
				alert ("NO se pudo Eliminar");
			}
		}
	})
	
	return false;
}

//Función para eliminar un postgrado Internacional
function Eliminar_PostgradoInt() {
	
	var datos = $("#modal_delete_IDpostgradoInt").val();

	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=4&eliminar='+datos,
		type: 'POST',
		//data: {eliminar: datos},
		success: function (ex) {
			if (ex != 1) {
				ListaPostgradoInt();
			} else {
				alert ("NO se pudo Eliminar");
			}
		}
	})
	
	return false;
}

//Función para obtener lista de profesores
function ListaProfesores() {
	$.ajax({
		url: '../../controlador/cc-profesores.php?accion=4',
		type: 'GET',
		success: function (e) {
			if (e != 1) {
				let listasP = JSON.parse(e);
				let temp = '';
				listasP.forEach(listaP => {
					temp += `
						<tr>
							<td>${listaP.nombre}</td>
							<td class="text-center">${listaP.edad}</td>
							<td>${listaP.especialidad}</td>
							<td>${listaP.Ddescripcion}</td>
							<td>${listaP.Cdescripcion}</td>
							<td><button type="button" class="btn_oculto" name="editar" id="editar" data-toggle="modal" 
							data-target="#F5_profesor" data-id="${listaP.idProfesor}" data-nombre="${listaP.nombre}" 
							data-edad="${listaP.edad}" data-especialidad="${listaP.especialidad}" 
							data-catdocente="${listaP.IdCatDocente}" data-catcientifica="${listaP.IdCatCientifica}">
							<img src="../img/pencil-3x.png" width="16px"></button>

                        	<button type="button" class="btn_oculto" name="eliminar" id="eliminar" data-toggle="modal" 
                        	data-target="#delete_profesor" data-id="${listaP.idProfesor}"><img src="../img/trash-3x.png" width="16px"></button>
						</tr>
					`
				});
				$("#tabla_profesor_body").html(temp);
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}


//Función para obtener lista de postgrados nacionales
function ListaPostgradoNac() {
	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=5',
		type: 'GET',
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(listaPostNac => {
					temp += `
						<tr>
							<td>${listaPostNac.codigo}</td>
							<td>${listaPostNac.tema}</td>
							<td>${listaPostNac.inicio}</td>
							<td>${listaPostNac.fin}</td>
							<td>${listaPostNac.profesor}</td>
							<td class="text-center">${listaPostNac.horas}</td>
							<td class="text-center">${listaPostNac.alumnos}</td>
							
							<td class="acciones"><button type="button" class="btn_oculto" name="editar_postgrado" 
							id="IDpostgrado" data-toggle="modal" data-target="#F5_postgrado" 
							data-id="${listaPostNac.idPostgrado}" data-codigo="${listaPostNac.codigo}" 
							data-inicio="${listaPostNac.inicio}" data-fin="${listaPostNac.fin}" 
							data-horas="${listaPostNac.horas}" data-alumnos="${listaPostNac.alumnos}" 
							data-idtema="${listaPostNac.idtema}" data-idprofesor="${listaPostNac.idprofesor}">
							<img src="../img/pencil-3x.png" width="16px"></button>

                        	<button type="button" class="btn_oculto" name="eliminar_postgrado" 
                        	id="IDpostgrado" data-toggle="modal" data-target="#delete_postgrado" 
                        	data-id="${listaPostNac.idPostgrado}">
                        	<img src="../img/trash-3x.png" width="16px"></button></td>
						</tr>
        			`
				});
					
				$("#PN_body").html(temp);
				$("#BPN_body").html(temp);
				
				//let fila = $("#tabla_nacional >tbody >tr").length; Cuenta la cantidad de filas
				if (roles == 2) {
					$(".acciones").hide();
				}
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}

//Función para obtener lista de postgrados Internacionales
function ListaPostgradoInt() {
	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=6',
		type: 'GET',
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(listaPostInt => {
					temp += `
						<tr>
							<td>${listaPostInt.codigo}</td>
							<td>${listaPostInt.tema}</td>
							<td>${listaPostInt.inicio}</td>
							<td>${listaPostInt.fin}</td>
							<td>${listaPostInt.profesor}</td>
							<td class="text-center">${listaPostInt.horas}</td>
							<td class="text-center">${listaPostInt.alumnos}</td>
							<td class="text-center">${listaPostInt.alumnosInt}</td>
							<td>${listaPostInt.pais}</td>
							<td class="acciones"><button type="button" class="btn_oculto" name="editar_postgradoInt" 
							id="IDpostgrado" data-toggle="modal" data-target="#F5_postgradoInt" 
							data-id="${listaPostInt.idPostgrado}" data-codigo="${listaPostInt.codigo}" 
							data-inicio="${listaPostInt.inicio}" data-fin="${listaPostInt.fin}" 
							data-horas="${listaPostInt.horas}" data-alumnos="${listaPostInt.alumnos}" data-alumnosInt="${listaPostInt.alumnosInt}" 
							data-idtema="${listaPostInt.idtema}" data-idprofesor="${listaPostInt.idprofesor}" data-idpais="${listaPostInt.Idpais}">
							<img src="../img/pencil-3x.png" width="16px"></button>

                        	<button type="button" class="btn_oculto" name="eliminar_postgradoInt" 
                        	id="IDpostgrado" data-toggle="modal" data-target="#delete_internacional" 
                        	data-id="${listaPostInt.idPostgrado}">
                        	<img src="../img/trash-3x.png" width="16px"></button></td>
						</tr>
						
        			`
				});
				$("#PI_body").html(temp);

				if (roles == 2) {
					$(".acciones").hide();
				}
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}

//Función para buscar postgrados nacionales
function BuscarPostgradoNac() {
	var datos = $("#codigo").val();
	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=7',
		type: 'POST',
		data: {codigo: datos},
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(listaPostNac => {
					temp += `
						<tr>
							<td>${listaPostNac.codigo}</td>
							<td>${listaPostNac.tema}</td>
							<td>${listaPostNac.inicio}</td>
							<td>${listaPostNac.fin}</td>
							<td>${listaPostNac.profesor}</td>
							<td class="text-center">${listaPostNac.horas}</td>
							<td class="text-center">${listaPostNac.alumnos}</td>
							
							<td><button type="button" class="btn_oculto" name="editar_postgrado" 
							id="IDpostgrado" data-toggle="modal" data-target="#F5_postgrado" 
							data-id="${listaPostNac.idPostgrado}" data-codigo="${listaPostNac.codigo}" 
							data-inicio="${listaPostNac.inicio}" data-fin="${listaPostNac.fin}" 
							data-horas="${listaPostNac.horas}" data-alumnos="${listaPostNac.alumnos}" 
							data-idtema="${listaPostNac.idtema}" data-idprofesor="${listaPostNac.idprofesor}">
							<img src="../img/pencil-3x.png" width="16px"></button>

                        	<button type="button" class="btn_oculto" name="eliminar_postgrado" 
                        	id="IDpostgrado" data-toggle="modal" data-target="#delete_postgrado" 
                        	data-id="${listaPostNac.idPostgrado}">
                        	<img src="../img/trash-3x.png" width="16px"></button></td>
						</tr>
						
        			`
				});
				$("#BPN_body").html(temp);
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}

//Función para buscar postgrados nacionales Inv
function BuscarPostgradoNacInv() {
	var datos = $("#codigo").val();
	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=7',
		type: 'POST',
		data: {codigo: datos},
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(listaPostNac => {
					temp += `
						<tr>
							<td>${listaPostNac.codigo}</td>
							<td>${listaPostNac.tema}</td>
							<td>${listaPostNac.inicio}</td>
							<td>${listaPostNac.fin}</td>
							<td>${listaPostNac.profesor}</td>
							<td class="text-center">${listaPostNac.horas}</td>
							<td class="text-center">${listaPostNac.alumnos}</td>
							
							
						</tr>
						
        			`
				});
				$("#BPN_body").html(temp);
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}

function BuscarPostgradoNacBy() {
	var datos = $("#frm_PostNacBy").serialize();
	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=8',
		type: 'POST',
		data: datos,
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(listaPostNac => {
					temp += `
						<tr>
							<td>${listaPostNac.codigo}</td>
							<td>${listaPostNac.tema}</td>
							<td>${listaPostNac.inicio}</td>
							<td>${listaPostNac.fin}</td>
							<td>${listaPostNac.profesor}</td>
							<td class="text-center">${listaPostNac.horas}</td>
							<td class="text-center">${listaPostNac.alumnos}</td>
							
							<td><button type="button" class="btn_oculto" name="editar_postgrado" 
							id="IDpostgrado" data-toggle="modal" data-target="#F5_postgrado" 
							data-id="${listaPostNac.idPostgrado}" data-codigo="${listaPostNac.codigo}" 
							data-inicio="${listaPostNac.inicio}" data-fin="${listaPostNac.fin}" 
							data-horas="${listaPostNac.horas}" data-alumnos="${listaPostNac.alumnos}" 
							data-idtema="${listaPostNac.idtema}" data-idprofesor="${listaPostNac.idprofesor}">
							<img src="../img/pencil-3x.png" width="16px"></button>

                        	<button type="button" class="btn_oculto" name="eliminar_postgrado" 
                        	id="IDpostgrado" data-toggle="modal" data-target="#delete_postgrado" 
                        	data-id="${listaPostNac.idPostgrado}">
                        	<img src="../img/trash-3x.png" width="16px"></button></td>
						</tr>
						
        			`
				});
				$("#BPN_body").html(temp);
				
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}


function BuscarPostgradoNacByInv() {
	var datos = $("#frm_PostNacBy").serialize();
	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=8',
		type: 'POST',
		data: datos,
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(listaPostNac => {
					temp += `
						<tr>
							<td>${listaPostNac.codigo}</td>
							<td>${listaPostNac.tema}</td>
							<td>${listaPostNac.inicio}</td>
							<td>${listaPostNac.fin}</td>
							<td>${listaPostNac.profesor}</td>
							<td class="text-center">${listaPostNac.horas}</td>
							<td class="text-center">${listaPostNac.alumnos}</td>
							
							
						</tr>
						
        			`
				});
				$("#BPN_body").html(temp);
				
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}

function PostgradoByHoras() {
	var fecha1 = $("#date_fecha_inicio").val();
	var fecha2 = $("#date_fecha_cierre").val();

	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=9&inicio='+fecha1+'&fin='+fecha2,
		type: 'POST',
		
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(ByHoras => {
					temp += `
						<tr>
							<td class="text-center">${ByHoras.horas}</td>
							<td>${ByHoras.codigo}</td>
							<td>${ByHoras.tema}</td>
						</tr>
						
        			`
				});
				$("#BPI_body").html(temp);
				
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}

function ProfesorXespecialidad() {
	var especialidad = $("#textEspecialidad").val();
	

	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=11&especialidad='+especialidad,
		type: 'POST',
		
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(profByEsp => {
					temp += `
						<tr>
							<td class="text-center">${profByEsp.credito}</td>
							<td>${profByEsp.nombre}</td>
							<td class="text-center">${profByEsp.edad}</td>
							<td>${profByEsp.especialidad}</td>
							<td>${profByEsp.Cdescripcion}</td>
							<td>${profByEsp.Ddescripcion}</td>
						</tr>
						
        			`
				});
				$("#PBE_body").html(temp);
				
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}

function PostgradoByEspecialidad() {
	var esp = $("#textEsp").val();
	var ubi = $("#selectUbicacion").val();

	$.ajax({
		url: '../../controlador/cc-reportes.php?accion=10&especial='+esp+'&ubic='+ubi,
		type: 'POST',
		
		success: function (e) {
			if (e != 1) {
				let postgrados = JSON.parse(e);
				let temp = '';
				postgrados.forEach(postEsp => {
					temp += `
						<tr>
							<td class="text-center">${postEsp.credito}</td>
							<td>${postEsp.codigo}</td>
							<td>${postEsp.tema}</td>
							<td>${postEsp.tipo}</td>
						</tr>
						
        			`
				});
				$("#PXE_body").html(temp);
				
			} else {
				alert ("NO se pudo mostrar la lista");
			}
		}
	})
}

function VerificarCodigo(codigo, exciste, formulario, accion) {
    if (!validarCodigo(codigo.val()) ) {
        exciste.show().text("Código Incorrecto");
        codigo.addClass("is-invalid");
        return false;
    } else {
        var datos = formulario.serialize();
        $.ajax({
            url: '../../controlador/cc-postgrados.php?accion='+accion,
            type: 'POST',
            data: datos,
            dataType: 'json',
            success: function (data) {
                if(data.error) {
                    codigo.addClass("is-invalid").focus();
             		exciste.show().text(data.mensaje);
                } else {
                    codigo.removeClass("is-invalid");
                    exciste.hide();
                }
            }
        })

    }
}


//Función para login
function login_AJAX() {	
	
	var datos = $("#form_login").serialize();

	$.ajax({
		url: '../controlador/cc-login.php',
		type: 'POST',
		data: datos,
		dataType: 'json',
		beforeSend: function () {
			$("#btn_enviar").text('Validando ...');
		},
		success: function (e) {
			if (e.error) {
				$("#alerta_login").text(e.mensaje);		
				MostrarMensaje($("#alerta_login"));
				$("#form_login").trigger('reset'); 
				$("#btn_enviar").text('Entrar');
				$("#user").removeClass("is-invalid");
				$("#pass").removeClass("is-invalid");
			}else {
				
				if (e.rol == 1) {
					location.href = "../vista/pages/postgrados.php";
				}
				if (e.rol == 2) {
					location.href = "../vista/pages/reportes.php";

				}
			}
		}
	})
	
} 

//Autocompletar Especialidad
function Autocompletar(especialidad) {
	especialidad.autocomplete({
		source: function (request, response) {
			$.ajax({
				url: '../../controlador/cc-profesores.php?accion=5',
				type: 'POST',
				dataType: 'JSON',
				data: {q: request.term},
				success: function (data) {
					response($.map(data, function(item) {
						return {
							label: item.especialidad,
							value: item.especialidad,
						};
					}));
				}
			});
		},
		minLength: 1
	});
}
