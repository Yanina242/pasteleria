<div class="content-wrapper">
    
  <section class="content-header">

    <h2 class="text-center">USUARIOS</h2>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Usuarios</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">    
            
      <div class="box-body">
           
       <div class="box-header with-border text-left">
         
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

            Agregar usuario

          </button>
      </div>

      </div>
    </div>
  </section>
  </div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">
      
       <form method="post" enctype="multipart/form-data">
         
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">
           
            <!--=====================================
            ENTRADA DEL NOMBRE DEL USUARIO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" placeholder="Ingresar nombre" name="nuevoNombre" required> 

              </div> 

            </div>
            
            <!--=====================================
            ENTRADA DEL EMAIL
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" placeholder="Ingresar email" name="nuevoEmail" id="nuevoEmail" required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA CONTRASEÑA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="nuevoPassword" ="Ingresar contraseña"required> 

              </div> 

            </div>
            

            <!--=====================================
            ENTRADA PARA LA FOTO
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <img src="" class="img-thumbnail previsualizar" width="100px">

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

        
          $crearUsuario = new ControladorAdministradores();
          $crearUsuario -> ctrCrearUsuarios();

          ?>

    </div>
    
  </div>

</div>