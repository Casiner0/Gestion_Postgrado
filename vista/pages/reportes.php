<?php 
  include '../pages/cabeceraHTML.php';
  include '../../modelo/dao-nomencladores.php';
  include '../../modelo/dao-profesores.php';

  $ob = new daoNomencladores();
  $prof = new Profesor();
  $listaProf = $prof->ObtenerProfesores();
  $catcientifica = $ob->ObtenerCatCientifica();
  $temapostgrado = $ob->ObtenerTemaPostgrados();
  $listapaises = $ob->ObtenerPaises();
?>

    	  <!-- Cuerpo -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Reportes</h1>
          </div>
          <div class="shadow p-3 mb-5 bg-light rounded" >
            <div class="embed-responsive reset" >
      		    <h2>Postgrado Nacional</h2>
              
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="tabla_nacional" name="tabla_nacional">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Tema</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Final</th>
                      <th>Profesor</th>
                      <th class="text-center">Cantidad de horas</th>
                      <th class="text-center">Cantidad de Alumnos</th>
                      <?php  
                        if ($rol == 1) {
                          echo "<th></th>";
                        }
                      ?>
                      
                    </tr>
                  </thead>
                  <tbody id="PN_body"></tbody>  
                </table>
              </div>

              <hr>

              <div class="form-row">
                <div class="col-md-2 col-sm-12 form-group">
                  <form class="form-row" id="form_buscarCodigo" method="POST">
                    <div class="col-12 form-group">
                      <label for="buscar_codigo">Buscar Postgrado Nacional</label>
                      <input type="text" class="form-control" name="buscar_codigo" id="buscar_codigo" placeholder="PG-000">
                      <div id="alerta_post" class="invalid-tooltip"></div>
                    </div>
                    <div class="col-12 form-group">
                      <button type="button" name="btn_buscar_postgrado" id="btn_buscar_postgrado" class="btn btn-outline-success align-bottom" >Buscar</button>

                    </div>
                    
                  </form>
                </div>
                
                <div class="col-md-10 col-sm-12 form-group">
                  <div class="form-row">
                    <div class="col-12">
                      <label for="select_mes">Curso impartido (desde - hasta):</label>
                    </div>
                  </div>
                  <form method="POST" id="frm_PostNacBy">
                  <div class="form-row">
                    <div class="col-md-3 col-sm-12 form-group">
                      <input type="date" class="form-control" name="curso_inicio" id="curso_inicio">
                      <div class="invalid-tooltip" id="curso_fecha_inicio"></div>
                    </div>
                    <div class="col-md-3 col-sm-12 form-group">
                      <input type="date" class="form-control " name="curso_cierre" id="curso_cierre">
                      <div class="invalid-tooltip" id="curso_fecha_cierre"></div>
                    </div>
                    <div class="col-md-4 col-sm-12 form-group">
                      <select class="custom-select form-control " name="select_cat_cientif" id="select_cat_cientif">
                        <option value="0"> ...Categoría Científica...
                        </option>
                        <?php foreach($catcientifica as $cc){ ?>
                        <option value="<?php echo $cc['idCatCientifica'] ?>"><?php echo utf8_encode($cc['descripcion']) ?> 
                        </option>
                        <?php } ?>
                      </select>
                      <div id="alerta_categoria" class="invalid-tooltip">Seleccione una categoría</div>
                    </div>
                    <div class="col-md-9 col-sm-12 form-group">
                      <button type="button"  name="btn_buscar_post_impartido" id="btn_buscar_post_impartido" class="btn btn-outline-success align-bottom">Buscar</button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              
            </div>  
          </div>
        </main> 
      </div>	
    
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="shadow p-3 mb-5 bg-light rounded" >
          <div class="embed-responsive reset">
    		    <h2>Postgrado Internacional</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm" name="tabla_internacional">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Tema</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Profesor</th>
                    <th class="text-center">Cantidad de horas</th>
                    <th class="text-center">Alumnos Nacionales</th>
                    <th class="text-center">Alumnos Internacionales</th>
                    <th>Paìs</th>
                    <?php  
                      if ($rol == 1) {
                        echo "<th></th>";
                      }
                    ?>
                  </tr>
                </thead>
                <tbody id="PI_body"></tbody>                 
                  
              </table>
              
            </div>

            <hr>
            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <!--Contiene los input y botones-->
        		      <div class="form-row">
                    <div class="col-sm-12 col-md-12 form-group">
                      <label>Postgrados no imparidos en el Centro (desde - hasta):</label>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 col-sm-12 form-group">
                      <input type="date" class="form-control " id="date_fecha_inicio" name="date_fecha_inicio">
                      <div class="invalid-tooltip" id="alerta_fecha_inicio">Escoja la fecha de inicio</div>
                      <div class="invalid-tooltip" id="alerta_fecha_incorrecta">Las fechas son incorrectas</div>
                    </div>
                    <div class="col-md-6 col-sm-12 form-group">
                      <input type="date" class="form-control " id="date_fecha_cierre" name="date_fecha_cierre">
                      <div class="invalid-tooltip" id="alerta_fecha_cierre">Escoja la fecha de cierre</div>
                    </div>
                    <div class="col-sm-12 col-md-6 form-group">
                      <button type="button" class="btn btn-outline-success align-bottom" id="btn_buscar_x_fecha">Buscar</button>
                    </div>
                  </div>
              </div>

              <div class="col-md-4 col-sm-12">
                
                  <div class="form-row">
                    <div class="col-sm-12 col-md-12 form-group">
                      <label>Postgrados impartidos dado:</label>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-sm-12 col-md-6 form-group">
                      <input type="text" class="form-control" id="textEsp" name="textEsp" placeholder="Especialidad">
                      <div class="invalid-tooltip" id="alerta_especialidad">Introduzca la Especialidad</div>
                    </div>
                    <div class="col-sm-12 col-md-6 form-group">
                      <select class="custom-select form-control " name="selectUbicacion" id="selectUbicacion">
                        <option value="0"> ...Ubicación...
                        </option>
                        <option value="SI"> Centro
                        </option>
                        <option value="NO"> Extranjero
                        </option>
                      </select>
                      <div class="invalid-tooltip" id="alerta_ubicacion">Introduzca la Ubicación</div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-12 form-group">
                      <button type="button" class="btn btn-outline-success align-bottom form-group" id="btn_buscar_x_esp">Buscar</button>
                    </div>
                  </div>
                
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-row">
                  <div class="col-12 form-group">
                    <label for="text_segun_especialidad">Profesor de menor crédito:</label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-sm-12 form-group">
                    <input type="text" class="form-control" id="textEspecialidad" placeholder="Especialidad"> 
                    <div class="invalid-tooltip" id="alerta_segun_especialidad">Introduzca la Especialidad</div>
                  </div>
                  <div class="col-sm-12 col-md-8 form-group">
                    <button type="button" class="btn btn-outline-success align-bottom" id="btn_buscar_x_credito">Buscar</button>
                  </div>
                </div>
              </div>  
            </div>
          </div> 
        </div>  
        <h6 class="text-muted">© Dirección de Postgrado | <?php echo date("Y") ?></h6>  	
      </main>

<?php 
  include 'campos_emergentes/tb_buscarPostgrado.php';
  include 'campos_emergentes/tb_horasPostgrados.php';
  include 'campos_emergentes/tb_profesorByEsp.php';
  include 'campos_emergentes/tb_postXespecialidad.php';
  include 'modal/modificar_postgrado.php';
  include 'modal/modificar_postgradoInt.php';
  include 'modal/delete_postgrado.php';
  include 'modal/delete_postgradoInt.php';
  include 'pieHTML.php';
?>      
