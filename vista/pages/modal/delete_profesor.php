<form method="POST" id="form_modal_delete_profesor"> 
  <div class="modal fade" data-backdrop="static" data-keyboard="false" id="delete_profesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <input type="hidden" id="modal_IDprofesor" name="modal_IDprofesor">
        <h2 class="text-center text-muted">ALERTA</h2>
  	    <p class="lead text-muted text-center">Esta acción eliminará de forma permanente al profesor. ¿Deseas continuar?</p>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success align-bottom" name="modal_btn_delete_profesor" id="modal_btn_delete_profesor">Aceptar</button>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>