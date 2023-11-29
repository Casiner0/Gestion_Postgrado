<!--Buscar Postgrado Nacional-->
<div class="modal fade" id="emergente_buscar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="table-responsive" id="tb_postgrado">
        <input type="hidden" class="form-control" name="codigo" id="codigo">
        <table class="table table-striped table-sm" name="tabla_nacional">
          <thead>
            <tr>
              <th>Código</th>
              <th>Tema</th>
              <th>Fecha Inicio</th>
              <th>Fecha Final</th>
              <th>Profesor</th>
              <th>Cantidad de horas</th>
              <th>Cantidad de Alumnos</th>
              <?php  
                if ($rol == 1) {
                  echo "<th></th>";
                }
              ?>
            </tr>
          </thead>
          <tbody id="BPN_body"></tbody>  
        </table>
      </div>  
    </div>
  </div>
</div>