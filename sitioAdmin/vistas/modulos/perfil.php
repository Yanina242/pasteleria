<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mi perfil
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Mi perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <!-- Profile Image -->
          <div class="box">
            <div class="box-body box-profile">
              <?php
              
              $item="id";
              $valor=$_SESSION["id"];

              $usuario = ControladorAdministradores::ctrMostrarAdministradores($item,$valor);

             echo '<img class="profile-user-img img-responsive img-circle" src="'.$usuario["foto"].'" alt="User profile picture">'
              ?>
              <h3 class="profile-username text-center"><?php echo $usuario["nombre"]; ?></h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $usuario["email"]; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Perfil</b> <a class="pull-right"><?php echo $usuario["perfil"]; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Ultimos cambios</b> <a class="pull-right"><?php echo date('d/m/Y', strtotime($usuario["fecha"]))  ; ?></a>
                </li>
              </ul>

              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalEditarPerfil">

               <b>Actualizar datos</b>

              </button>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->

    
  </div>
  <!-- /.content-wrapper -->

<!--=====================================
MODAL EDITAR PERFIL
======================================-->

<div id="modalEditarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <?php

                echo '<input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="'. $usuario["nombre"].'" required>
                
                <input type="hidden" id="idPerfil" name="idPerfil" value="'.$usuario["id"].'">'
                ?>
              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
               
              <?php
               echo  '<input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="'.$usuario["email"].'" required>'
              ?>
              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <?php
                echo '<input type="hidden" id="passwordActual" name="passwordActual" value="'.$usuario["password"].'">'
                ?>
              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <?php

              echo '<img src="'.$usuario["foto"].'" class="img-thumbnail previsualizar" width="100px">';

              echo '<input type="hidden" name="fotoActual" id="fotoActual"  value="'.$usuario["foto"].'" >'

              ?>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Perfil</button>

        </div>

     <?php

          $editarPerfil = new ControladorAdministradores();
          $editarPerfil -> ctrEditarPerfil();

        ?> 

      </form>

    </div>

  </div>

</div>