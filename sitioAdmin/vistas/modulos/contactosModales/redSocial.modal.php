<!--=====================================
MODAL CAMBIAR RED SOCIAL
======================================-->

<?php echo '<div id="modalEditarRedSocial'.$red['id'].'" class="modal fade" role="dialog">'; ?>
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Cambiar información de Red Social</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">
             
        <?php echo '<h2>'.$red['nombre'].'</h2>';?>
            <!--=====================================
                ENTRADA EDITAR ENLACE RED SOCIAL
                ======================================-->

                <div class="form-group">
                  
                  <h2>Enlace: </h2>

                  <div class="input-group">

                    <input name="id" type="hidden" value="<?php echo $red['id'];?>"> 
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                    <input class="form-control input-lg " name="cuenta" type="text" required value="<?php echo $red['cuenta']; ?>"  >

                  </div> 

                </div>

                <!--=====================================
                ENTRADA EDITAR ESTADO
                ======================================-->

                <div class="form-group">

                  <h2>Estado:</h2>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                    <select class="form-control input-lg " name="estado">
                        <?php if ($red['estado']=='activo') {
                            echo '<option value="activo" selected>Activo</option>
                                  <option value="inactivo">Inactivo</option>';
                                } else {
                            echo '<option value="activo">Activo</option>
                                  <option value="inactivo" selected>Inactivo</option>';
                                }
                        ?>
                      </select> 

                  </div> 

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

                
                  $editarRedSocial = new ControladorRedesSociales();
                  $editarRedSocial -> ctrEditarRedSocial();

              ?>

          </div>
      </div>
</div>