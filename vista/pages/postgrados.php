<?php 
  include '../pages/cabeceraHTML.php';
  include '../../modelo/dao-nomencladores.php';
  include '../../modelo/dao-profesores.php';
  
  $ob = new daoNomencladores();
  $prof = new Profesor();
  $listaProf = $prof->ObtenerProfesores();
  $temapostgrado = $ob->ObtenerTemaPostgrados();
  $paises = $ob->ObtenerPaises();

  if (isset($rol) && $rol != 1) {
    header('location: reportes.php');
  }
?>

    	  <!-- Cuerpo -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class=h2>Postgrados</h1>
          </div>
          <div class="row">
        	  <div class="col-sm-12 col-md-8">    
              <div class="col-md-2 col-sm-12 form-group">
                <div class="text-center text-white animate__animated animate__fadeIn alerta" id="alerta_insertado">Postgrado Insertado</div>
                
              </div>
              <div class="shadow p-3 mb-5 bg-light rounded" >
                <div class="embed-responsive">

                  <!-- Formulario de Postgrado -->
           	      <form class="form-signin reset" id="form_postgrado" name="form_postgrado" method="POST">
                      <div class="form-row">
                      </div> 
                      <div class="form-row">
                        <div class="col-md-2 col-sm-12 form-group">
                          <label for="text_codigo_postgrado">Código del Postgrado</label>
        			            <input type="text" class="form-control" name="text_codigo_postgrado" id="text_codigo_postgrado" placeholder="PG-000" maxlength="6">
                          <div class="invalid-tooltip" id="codigo_exciste">Código Incorrecto</div>
                          
                        </div>
                        <div class="col-md-10 col-sm-12 form-group">
                          <label for="select_tema">Tema</label>
                          <select class="custom-select form-control " name="select_tema" id="select_tema">
                            <option value="0"> ...Seleccionar...
                            </option>
                            <?php 
							               foreach($temapostgrado as $tp){
							              ?>
                            <option value="<?php echo $tp['idTema'] ?>"><?php echo $tp['descripcion'] ?>
                            </option>
                            <?php } ?>
                          </select>
                          <div class="invalid-tooltip" id="alerta_tema">Seleccione un tema</div>
                        </div>
                      </div>
       			          
    		  	          <div class="form-row">
                        <div class="col-md-3 col-sm-12 form-group">
                          <label for="text_fecha_Inicio">Fecha de Inicio</label>
                          <input type="date" class="form-control" id="text_fecha_Inicio" name="text_fecha_Inicio"> 
                          <div class="invalid-tooltip" id="alerta_inicio">Escoja la fecha de inicio</div>
                          <div class="invalid-tooltip" id="alerta_fecha_incorrecta">Las fechas son incorrectas</div>
                        </div>
                        <div class="col-md-3 col-sm-12 form-group">
                          <label for="text_fecha_Final">Fecha de Cierre</label>
                          <input type="date" class="form-control" id="text_fecha_Final" name="text_fecha_Final">
                          <div class="invalid-tooltip" id="alerta_cierre">Escoja la fecha se cierre</div>
                        </div>
                      </div>

        			        <div class="form-group">
        				        <label for="select_profesor">Profresor Principal</label>
        				        <select class="custom-select form-control " name="select_profesor" id="select_profesor">
                          <option value="0"> ...Seleccionar...
                          </option>
                          <?php foreach($listaProf as $p){ ?>
                          <option value="<?php echo $p['idProfesor'] ?>"><?php echo $p['nombre'] ?> 
                          </option>
                          <?php } ?>
                        </select>
                        <div class="invalid-tooltip" id="alerta_profesor">Nombre Incorrecto</div>
      				        </div><br>
                      
                      <div class="row">
                        <div class="col-md-3">
                          <label>Tipo de Postgrado</label>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" name="rbtnTipo" type="radio" id="radio_centro" value= 1>
                            <label class="custom-control-label" for="radio_centro">Nacional</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" name="rbtnTipo" type="radio" id="radio_ext" value= 2>
                            <label class="custom-control-label" for="radio_ext">Internacional</label>
                            <div class="invalid-tooltip" id="alerta_opcion_tipo">Seleccione una opción</div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label>¿Fue impartido en el centro?</label>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" name="rbtnImpartido_Centro" type="radio" id="btn_SI" value="SI">
                            <label class="custom-control-label" for="btn_SI">SI</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" name="rbtnImpartido_Centro" type="radio" id="btn_NO" value="NO">
                            <label class="custom-control-label" for="btn_NO">NO</label>
                            <div class="invalid-tooltip" id="alerta_opcion_imp">Seleccione una opción</div>
                          </div>
                        </div>
                      </div>
                      
                      
         					      <br>

      				          <div class="form-row">
                          <div class="col-md-2 col-sm-12 form-group">
                            <label for="num_cant_horas">Cantidad de horas</label>
                            <input type="text" class="form-control" id="num_cant_horas" name="num_cant_horas" placeholder="0">
                            <div class="invalid-tooltip" id="alerta_horas">introduzca las horas</div> 
                          </div>
                          <div class="col-md-2 col-sm-12 form-group">
                            <label for="num_cant_alum">Alumnos nacionales</label>
                            <input type="text" class="form-control" id="num_cant_alum" name="num_cant_alum" placeholder="0"> 
                            <div class="invalid-tooltip" id="alerta_alumnos">Introduzca los alumnos</div>
                          </div>

                          <!-- Postgrado Internacional -->
                          <div class="col-md-2 col-sm-12 form-group oculto" id="alum_ext">
                            <label for="num_cant_alum_ext">Alumnos internacionales</label>
                            <input type="text" class="form-control" id="num_cant_alum_ext" name="num_cant_alum_ext" placeholder="0"> 
                            <div class="invalid-tooltip" id="alerta_alumnos_ext">Introduzca los alumnos</div>
                          </div>
                          <div class="col-md-2 col-sm-12 form-group oculto" id="div_pais">
                            <label for="select_paises">País</label>
                            <select class="custom-select form-control " name="select_paises" id="select_paises">
                              <option value="0"> ...Seleccionar...
                              </option>
                              <?php 
                                foreach($paises as $p){
                              ?>
                              <option value="<?php echo $p['idImpartido'] ?>">
                                <?php echo $p['descripcion'] ?>
                              </option>
                              <?php } ?>
                            </select>
                            <div class="invalid-tooltip" id="alerta_pais">Introduzca el país</div> 
                          </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success align-bottom" id="btn_postgrado" name="btn_postgrado">Aceptar</button>  
                  </form>        
                </div> 
              </div>
              <h6 class="text-muted">© Dirección de Postgrado | <?php echo date("Y") ?></h6> 
            </div>
          </div>
        </main>
      </div>
    </div>      
            
<?php 
  include '../pages/pieHTML.php';
?>
