
  <!--=====================================
MODAL AGREGAR CATEGORIA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        
        <div class="modal-header" style="background:#FF3255; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">
             

           <!--=====================================
            ENTRADA DEL TITULO DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="hidden" class="idCategoria" name="idCategoria">

                <input type="text" class="form-control input-lg validarCategoria tituloCategoria" placeholder="Ingresar Categoria" name="tituloCategoriaEditado" disabled> 

              </div> 

            </div>

            <!--=====================================
            EDITAR ESTADO DE CATEGORIA
            ======================================-->


            <div class="form-group">

              <h3>Estado:</h3>
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    <select class="form-control estadoCategoria" name="estadoCategoria">
                    <?php if (estadoCategoria=='activo') { ?>
                          <option value="activo" selected>Activo</option>
                          <option value="inactivo" >Inactivo</option>
                    <?php    } else {     ?>
                          <option value="activo" >Activo</option>
                          <option value="inactivo" selected>Inactivo</option>
                     <?php   }            ?>
                    </select>

                </div> 

            </div>

            <!--=====================================
            EDITAR IMAGEN DE CATEGORIA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN DE CATEGORIA</div>

              <input type="hidden" class="antiguaFoto" name="antiguaFoto">

              <input type="file" class="foto" name="foto" accept="image/*" >

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

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>
            <?php

        
          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

           ?>

          </div>
      </div>
</div>
