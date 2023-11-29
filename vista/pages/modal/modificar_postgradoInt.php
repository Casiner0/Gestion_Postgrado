<!--Modal editar postgrado Internacional-->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="F5_postgradoInt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="F5_postgradoInt">Modificar Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_modal_F5_postgradoInt">
          <div id="datos_ajax">
            <input type="hidden" id="modal_IDpostgradoInt" name="modal_IDpostgradoInt">
            
            <div class="form-row">
              <div class="col-md-3 col-sm-12 form-group">
                <label for="modal_codigoInt">Código</label>
                <input type="text" class="form-control" name="modal_codigoInt" id="modal_codigoInt" disabled>
              </div>  
              <div class="col-md-9 col-sm-12 form-group">
                <label for="modal_select_temaInt">Tema</label>
                <select class="custom-select form-control " name="modal_select_temaInt" id="modal_select_temaInt">
                  <option value="0"> ...Seleccionar...
                  </option>
                  <?php 
                   foreach($temapostgrado as $tp){
                  ?>
                  <option value="<?php echo $tp['idTema'] ?>"><?php echo $tp['descripcion'] ?>
                  </option>
                  <?php } ?>
                </select>
                <div class="invalid-tooltip" id="modal_alerta_temaInt">El tems es incorrecto</div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-6 form-group">
                <label for="modal_fecha_InicioInt">Fecha de Inicio</label>
                <input type="date" class="form-control" id="modal_fecha_InicioInt" name="modal_fecha_InicioInt"> 
                <div class="invalid-tooltip" id="modal_alerta_inicioInt">Escoja la fecha de inicio</div>
                <div class="invalid-tooltip" id="modal_alerta_fecha_incorrectaInt">Las fechas son incorrectas</div>
              </div>
              <div class="col-6 form-group">
                <label for="modal_fecha_FinalInt">Fecha de Cierre</label>
                <input type="date" class="form-control" id="modal_fecha_FinalInt" name="modal_fecha_FinalInt">
                <div class="invalid-tooltip" id="modal_alerta_cierreInt">Escoja la fecha se cierre</div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 col-sm-12 form-group">
                <label for="modal_horasInt">Cantidad de horas</label>
                <input type="text" class="form-control" id="modal_horasInt" name="modal_horasInt" placeholder="0">
                <div class="invalid-tooltip" id="modal_alerta_horasInt">introduzca las horas</div> 
              </div>
              <div class="col-md-4 col-sm-6 form-group">
                <label for="modal_cant_alumNac">Alumnos Nacionales</label>
                <input type="text" class="form-control" id="modal_cant_alumNac" name="modal_cant_alumNac" placeholder="0"> 
                <div class="invalid-tooltip" id="modal_alerta_alumnosNac">Introduzca los alumnos</div>
              </div>
              <div class="col-md-4 col-sm-6 form-group">
                <label for="modal_cant_alumInt">Internacionales</label>
                <input type="text" class="form-control" id="modal_cant_alumInt" name="modal_cant_alumInt" placeholder="0"> 
                <div class="invalid-tooltip" id="modal_alerta_alumnosInt">Introduzca los alumnos</div>
              </div>
              
            </div>

            <div class="form-row">
              <div class="col-md-6 col-sm-12 form-group">
                <label for="modal_select_profesorInt">Profresor Principal</label>
                <select class="custom-select form-control " name="modal_select_profesorInt" id="modal_select_profesorInt">
                  <option value="0"> ...Seleccionar...
                  </option>
                  <?php foreach($listaProf as $p){ ?>
                  <option value="<?php echo $p['idProfesor'] ?>"><?php echo $p['nombre'] ?> 
                  </option>
                  <?php } ?>
                </select>
                <div class="invalid-tooltip" id="modal_alerta_profesorInt">Nombre Incorrecto</div>
              </div>  
              <div class="col-md-6 col-sm-12 form-group">
                <label for="modal_select_pais">País</label>
                <select class="custom-select form-control " name="modal_select_pais" id="modal_select_pais">
                  <option value="0"> ...Seleccionar...
                  </option>
                  <?php foreach($listapaises as $lp){ ?>
                  <option value="<?php echo $lp['idImpartido'] ?>"><?php echo $lp['descripcion'] ?> 
                  </option>
                  <?php } ?>
                </select>
                <div class="invalid-tooltip" id="modal_alerta_pais">País Incorrecto</div>
              </div> 
            </div>
            
          </div>                              
          <div class="text-right">
            <button type="submit" class="btn btn-outline-success align-bottom" name="modal_btn_postgradoInt" id="modal_btn_postgradoInt">Guardar</button>
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>  
    </div>
  </div>
</div>