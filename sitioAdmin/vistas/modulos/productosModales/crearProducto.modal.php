  <!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        
        <div class="modal-header" style="background:#FF3255; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">
             

           <!--=====================================
            ENTRADA DEL TITULO DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarProducto tituloProducto" placeholder="Ingresar producto" name="tituloProducto" required> 

              </div> 

            </div>

              <!--=====================================
            ENTRADA PARA SELECCIONAR LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg seleccionarCategoria" name="seleccionarCategoria" required>
                  
                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id_categoria"].'">'.$value["nombre_categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

             <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" maxlength="500" rows="3" class="form-control input-lg descripcionProducto" placeholder="Ingresar descripción" name="descripcionProducto" required></textarea>

              </div>

            </div>

            <!--=====================================
            AGREGAR PRECIO
            ======================================-->
            <div class="form-group row">
               
              <!-- PRECIO -->

              <div class="col-md-6 col-xs-12">
  
                <div class="panel">PRECIO</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                  <input type="number" class="form-control input-lg precio" min="0" step="any" name="precio" required>

                </div>

              </div>

            </div> 


            <!--=====================================
            AGREGAR IMAGEN DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN DEL PRODUCTO</div>

              <input type="file" class="foto" name="foto" required>

             <!-- <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>-->

              <img src="" class="img-thumbnail previsualizarFoto" width="100%">

            </div>



          </div>
        </div>

       <!--=====================================
        PIE DEL MODAL
        ======================================-->
      

       
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

      </form>
            <?php

        
          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

           ?>

          </div>
      </div>
</div>
