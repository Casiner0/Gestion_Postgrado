<?php 
  include '../pages/cabeceraHTML.php';
  include '../../modelo/dao-nomencladores.php';
    
  $ob = new daoNomencladores();
  $catdocente = $ob->ObtenerCatDocentes();
  $catcientifica = $ob->ObtenerCatCientifica();
  
  if (isset($rol) && $rol != 1) {
    header('location: reportes.php');
  }
?>

    	  <!-- Cuerpo -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profesor</h1>
          </div>
          <div class="row">
          	<div class="col-sm-12 col-md-8">
              <div class="col-md-2 col-sm-12 form-group">
                <div class="text-center text-white animate__animated animate__fadeIn alerta" id="alerta_insertado">Profesor Insertado</div>
              </div>   
              <div class="shadow p-3 mb-5 bg-light rounded" >
                <div class="embed-responsive">

                  <!-- Formulario Insertar Profespr -->
             	    <form class="form-signin reset" method="POST" id="form_profesor" name="form_profesor">
                    <div class="form-row">
                      <div class="col-sm-12 col-md-10">
                        <label for="text_nombre">Nombre</label>
                        <input type="text" class="form-control" name="text_nombre" id="text_nombre">
                        <div class="invalid-tooltip" id="alerta_nombre">Nombre Incorrecto</div>
                      </div>
                      <div class="col-sm-12 col-md-2">
                        <label for="text_edad">Edad</label>
                        <input type="text" class="form-control" name="text_edad" id="text_edad" placeholder="00" >
                        <div class="invalid-tooltip" id="alerta_edad">Edad Incorrecta</div>
                      </div>
         			      </div>
             	      <div class="form-group" id="short_label">
          			      
        			      </div>
        			      <div class="form-group">
         			        <label for="text_especialidad">Especialidad</label>
         			        <input type="text" class="form-control" name="text_especialidad" id="text_especialidad">
                      <div class="invalid-tooltip" id="alerta_especialidad">Introduzca la Especialidad</div>
        			      </div>

                    <div class="form-row">
                      <div class="col-md-6 col-sm-12">
                        <label for="select_categ_doc">Categoría Docente</label>
                        <select class="custom-select" name="select_categ_doc" id="select_categ_doc">
                          <option value="0"> ... Seleccionar ...
                          </option>
                          <?php foreach($catdocente as $cd){ ?>
                          <option value="<?php echo utf8_encode($cd['idCategoriaDocente'])  ?>"><?php echo utf8_encode($cd['descripcion']) ?>
                          </option>
                          <?php } ?>
                        </select>
                        <div class="invalid-tooltip" id="alerta_doc">Seleccione la Categoría</div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <label for="select_categ_cient">Categoría Científica</label>
                        <select class="custom-select" name="select_categ_cient" id="select_categ_cient">
                          <option value="0"> ... Seleccionar ...
                          </option>
                          <?php foreach($catcientifica as $cc){ ?>
                          <option value="<?php echo $cc['idCatCientifica'] ?>"><?php echo utf8_encode($cc['descripcion']) ?> 
                          </option>
                          <?php } ?>
                        </select>
                        <div class="invalid-tooltip" id="alerta_cient">Seleccione la Categoría</div>
                      </div>
        			      </div>
                    <br>
                    <div class="form-row">
                      <div class="col-12">
                        <button type="submit" class="btn btn-outline-success align-bottom" name="btn_prosefor" id="btn_prosefor">Aceptar</button>
                      </div>
                    </div>
                  </form>
                </div>               
      		    </div>

              <!--Tabla de Profesores-->
              <div class="shadow p-3 mb-5 bg-light rounded">
                <table class="table table-striped" id="tabla_profesor">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Edad</th>
                      <th>Especialidad</th>
                      <th>Categoría Docente</th>
                      <th>Categoría Científica</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="tabla_profesor_body"></tbody> 

                </table>
              </div> 

              <h6 class="text-muted">© Dirección de Postgrado | <?php echo date("Y") ?></h6> 
            </div> 
          </div> 
        </main>
      </div>
    </div>
    

<?php 
  include '../pages/pieHTML.php';
  include '../pages/modal/modificar_profesor.php';
  include '../pages/modal/delete_profesor.php';
?>