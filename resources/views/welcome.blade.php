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
{{-- Modal devoluciones --}}
<div class="modal fade" id="devolucionmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Devolución de envase</h5>
      </div>
      <div class="modal-body">
          Seguro que desea realizar la devolución del envase
          <span class="denvase" id="denvase" name="denvase" style="font-weight: bold"></span>?<span style="display: none;" class="didregistro"></span>
          <div class="row justify-content-center">
           <div class="form-group col-md-6" >
           Nº remisión
          <input type="text" class="form-control input-sm" id="dremision" name="dremision" readonly>
          </div>
          <div class="form-group col-md-6">
           Fecha devolución 
          <input type="text" class="form-control input-sm" id="Fecha_devolucion" name="Fecha_devolucion" value="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }} " >
          </div>
          </div>

          <div class="row justify-content-center">
           <div class="form-group col-md-6">
            Nit cliente
          <input type="text" class="form-control input-sm" id="d_cliente" name="d_cliente"readonly>
          </div>
          <div class="form-group col-md-6">
          Cliente
          <input type="text" class="form-control input-sm" id="n_cliente" name="n_cliente"readonly>
          </div>
          </div>

          <div class="row justify-content-center">
           <div class="form-group col-md-6">
           CC empleado
          <input type="text" class="form-control input-sm" id="d_empleado" name="d_empleado" value="{{Auth::user()->cedula}}" readonly>
          </div>
          <div class="form-group col-md-6">
            Empleado
          <input type="text" class="form-control input-sm" id="n_empleado" name="n_empleado"value="{{Auth::user()->name}}" readonly>
          </div>
          </div>
      
          <div class="row justify-content-center">
           <div class="form-group col-md-6">
            Producto
          <input type="text" class="form-control input-sm" id="d_producto" name="d_producto"readonly>
          </div>
          <div class="form-group col-md-6">
           Cantidad producto
          <input type="text" class="form-control input-sm" id="c_producto" name="c_producto"readonly>
          </div>
          </div>
          <div class="row justify-content-center">
           <div class="form-group col-md-12">
            Motivo de la devolución
            <textarea name="textarea" rows="5" cols="20" class="form-control input-sm" id="descripcion" name="descripcion"></textarea>
          </div>
          
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger btndevolver">Devolver</button>
      </div>
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
<div class="modal fade" id="modalinforme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-align: justify" id="myModalLabel">Informe general</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      @yield('cuerpo-modal-informe')
      </div>
      <div class="modal-footer">
      @yield('pie-modal-informe')
       
      </div>
    </div>
  </div>
</div>