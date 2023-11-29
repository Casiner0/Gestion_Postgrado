<!--Modal editar profesor-->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="F5_profesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="F5_profesor">Modificar Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_modal_F5_profesor">
          <div id="datos_ajax">
            <input type="hidden" id="modal_IDprofesor" name="modal_IDprofesor">
            <div class="form-row">
              <div class="col-sm-12 col-md-8">
                <label for="modal_nombre">Nombre</label>
                <input type="text" class="form-control" name="modal_nombre" id="modal_nombre">
                <div class="invalid-tooltip" id="modal_alerta_nombre">Nombre Incorrecto</div>
              </div>
              <div class="col-sm-12 col-md-4">
                <label for="modal_edad">Edad</label>
                <input type="text" class="form-control" name="modal_edad" id="modal_edad" placeholder="00">
                <div class="invalid-tooltip" id="modal_alerta_edad">Edad Incorrecta</div>
              </div>
            </div><br>
            <div class="form-group">
              <label for="modal_especialidad">Especialidad</label>
              <input type="text" class="form-control" name="modal_especialidad" id="modal_especialidad">
              <div class="invalid-tooltip" id="modal_alerta_especialidad">Introduzca la Especialidad</div>
            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <label for="modal_select_categ_doc">Categoría Docente</label>
                <select class="custom-select" name="modal_select_categ_doc" id="modal_select_categ_doc">
                  <option value="0"> ... Seleccionar ...
                  </option>
                  <?php foreach($catdocente as $cd){ ?>
                  <option value="<?php echo $cd['idCategoriaDocente'] ?>"><?php echo utf8_encode($cd['descripcion']) ?>
                  </option>
                  <?php } ?>
                </select>
                <div class="invalid-tooltip" id="modal_alerta_doc">Seleccione la Categoría</div>
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="modal_select_categ_cient">Categoría Científica</label>
                <select class="custom-select" name="modal_select_categ_cient" id="modal_select_categ_cient">
                  <option value="0"> ... Seleccionar ...
                  </option>
                  <?php foreach($catcientifica as $cc){ ?>
                  <option value="<?php echo $cc['idCatCientifica'] ?>"><?php echo utf8_encode($cc['descripcion']) ?> 
                  </option>
                  <?php } ?>
                </select>
                <div class="invalid-tooltip" id="modal_alerta_cient">Seleccione la Categoría</div>
              </div>
            </div><br>                              
            <div class="text-right">
              <button type="submit" class="btn btn-outline-success align-bottom" name="modal_btn_prosefor" id="modal_btn_prosefor">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div><br>
        </form>
      </div>  
    </div>
  </div>
</div>