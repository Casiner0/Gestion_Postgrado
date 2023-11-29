<!--Modal editar postgrado-->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="F5_postgrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="F5_postgrado">Modificar Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_modal_F5_postgrado">
          <div id="datos_ajax">
            <input type="hidden" id="modal_IDpostgrado" name="modal_IDpostgrado">
            
            <div class="form-row">
              <div class="col-md-3 col-sm-12 form-group">
                <label for="modal_codigo">Código</label>
                <input type="text" class="form-control" name="modal_codigo" id="modal_codigo" disabled>
                
              </div>
              <div class="col-md-9 col-sm-12 form-group">
                <label for="modal_select_tema">Tema</label>
                <select class="custom-select form-control " name="modal_select_tema" id="modal_select_tema">
                  <option value="0"> ...Seleccionar...
                  </option>
                  <?php 
                   foreach($temapostgrado as $tp){
                  ?>
                  <option value="<?php echo $tp['idTema'] ?>"><?php echo $tp['descripcion'] ?>
                  </option>
                  <?php } ?>
                </select>
                <div class="invalid-tooltip" id="modal_alerta_tema">El tems es incorrecto</div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-5 col-sm-12 form-group">
                <label for="modal_fecha_Inicio">Fecha de Inicio</label>
                <input type="date" class="form-control" id="modal_fecha_Inicio" name="modal_fecha_Inicio"> 
                <div class="invalid-tooltip" id="modal_alerta_inicio">Escoja la fecha de inicio</div>
                <div class="invalid-tooltip" id="modal_alerta_fecha_incorrecta">Las fechas son incorrectas</div>
              </div>
              <div class="col-md-5 col-sm-12 form-group">
                <label for="modal_fecha_Final">Fecha de Cierre</label>
                <input type="date" class="form-control" id="modal_fecha_Final" name="modal_fecha_Final">
                <div class="invalid-tooltip" id="modal_alerta_cierre">Escoja la fecha se cierre</div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 col-sm-12 form-group">
                <label for="modal_horas">Cantidad de horas</label>
                <input type="text" class="form-control" id="modal_horas" name="modal_horas" placeholder="0">
                <div class="invalid-tooltip" id="modal_alerta_horas">introduzca las horas</div> 
              </div>
              <div class="col-md-4 col-sm-12 form-group">
                <label for="modal_cant_alum">Alumnos nacionales</label>
                <input type="text" class="form-control" id="modal_cant_alum" name="modal_cant_alum" placeholder="0"> 
                <div class="invalid-tooltip" id="modal_alerta_alumnos">Introduzca los alumnos</div>
              </div>
              
            </div>

            <div class="form-group">
              <label for="modal_select_profesor">Profresor Principal</label>
              <select class="custom-select form-control " name="modal_select_profesor" id="modal_select_profesor">
                <option value="0"> ...Seleccionar...
                </option>
                <?php foreach($listaProf as $p){ ?>
                <option value="<?php echo $p['idProfesor'] ?>"><?php echo $p['nombre'] ?> 
                </option>
                <?php } ?>
              </select>
              <div class="invalid-tooltip" id="modal_alerta_profesor">Nombre Incorrecto</div>
            </div>
            
          </div>                              
          <div class="text-right">
            <button type="submit" class="btn btn-outline-success align-bottom" name="modal_btn_postgrado" id="modal_btn_postgrado">Guardar</button>
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>  
    </div>
  </div>
</div>