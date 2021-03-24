<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Modificar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">

    @yield('cuerpo_modal_actualizar')
      </div>
      <div class="modal-footer">
        @yield('pie_modal_actualizar')
        
        
      </div>
    </div>
  </div>
</div>

{{-- Modal eliminar --}}
<div class="modal fade" id="deletemodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
      </div>
      <div class="modal-body">
          Seguro que desea eliminar a
          <span class="dname"></span>?<span style="display: none;" class="did"></span>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger btneliminar">Eliminar</button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="modalmes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">VER</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">

    @yield('cuerpo_modal_datos')
      </div>
      <div class="modal-footer">
        @yield('pie_modal_datos')
        
        
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Agregar nuevo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

		@yield('cuerpo_modal')
    
    </div>
   <div class="modal-footer">
        
        @yield('pie_modal')
   </div>
  </div>
</div>
</div>
<div class="modal fade" id="modalremision" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"style="max-height: calc(100vh - 210px);overflow-x: hidden;">
      <div class="form-group">
         <legend class="card-header text-center bg-dark">Recepción de cilindros</legend>
       
        
      </div>
      <div class="modal-body">

    @yield('cuerpo_modal_remision')
      </div>
      <div class="modal-footer">
        @yield('pie_modal_remision')
        
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalremisionedicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-align: justify" id="myModalLabel">Recepción de cilindros</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">

    @yield('cuerpo_modal_remision_edicion')
      </div>
      <div class="modal-footer">
        @yield('pie_modal_remision_edicion')
        
        
      </div>
    </div>
  </div>
</div>