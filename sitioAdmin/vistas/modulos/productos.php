<div class="content-wrapper">
    
  <section class="content-header">

    <h2 class="text-center">PRODUCTOS</h2>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Productos</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">    
            
      <div class="box-body">
           
       <div class="box-header with-border text-left">
         
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">

            Agregar producto

          </button>
      </div>

      <div class="box-body">
         
        <table class="table table-striped table-bordered dt-responsive tablaProductos" width="100%">

          <thead>
            
            <tr>
              <th style="width:10px">#</th>
              <th>Producto</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>Stock</th>
              <th>Imagen</th>
              <th>Estado</th>
              <th>Creado</th>
              <th>Acciones</th>
            </tr>

          </thead>

        </table>

      </div>

      </div>
    </div>
  </section>
  </div>

<?php
require "productosModales/crearProducto.modal.php";
require "productosModales/editarProducto.modal.php";
?> 