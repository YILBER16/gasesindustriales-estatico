@extends('layouts.layout')
@section('titulo')
<title>Detalles envase</title>
@endsection
@section('script')

<script type="text/javascript">
function mostrarPassword(){
    var cambio = document.getElementById("contrasena");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
  
  $(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });
});
</script>

@endsection
@section('contenido')
             

               <fieldset>
                <div class="container ">
                  <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                  
            <legend class="text-center card-header" >DETALLES ENVASE {{$envases->Id_envase}}</legend>

            &nbsp
          <form role="form">


            <div class="well">

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Id envase</label>
                      <input id="Id_envase" name="Id_envase" type="text" 
                      value="{{isset($envases->Id_envase)?$envases->Id_envase:old('Id_propietario')}}"class="form-control" disabled>
                          </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Propietario</label>
                      <input id="Id_propietario" name="Nom_propietario" type="text" 
                                value="{{isset($envases->Id_propietario)?$envases->Id_propietario:old('Id_propietario')}}" class="form-control" disabled>
 
                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Proveedor</label>
                      <input id="Id_proveedor" name="Id_proveedor" type="text" 
                                value="{{isset($envases->Id_proveedor)?$envases->Id_proveedor:old('Id_proveedor')}}" class="form-control {{$errors->has('Id_proveedor')?'is-invalid':''}}" disabled>
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Nº interno envase</label>
                        <input id="N_int_envase" name="N_int_envase" type="text" 
                                value="{{isset($envases->N_int_envase)?$envases->N_int_envase:old('N_int_envase')}}{{old('N_int_envase')}}" class="form-control {{$errors->has('N_int_envase')?'is-invalid':''}}" disabled>
                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Estado envase</label>
                      <input id="Estado_envase" name="Estado_envase" type="text" 
                                value="{{isset($envases->Estado_envase)?$envases->Estado_envase:old('Estado_envase')}}{{old('Estado_envase')}}"  class="form-control {{$errors->has('Estado_envase')?'is-invalid':''}}" disabled>
                               
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Material</label>
                        <input id="Material" name="Material" type="text" 
                                value="{{isset($envases->Material)?$envases->Material:old(' Material')}}{{old('Material')}}"  class="form-control {{$errors->has('Material')?'is-invalid':''}}" disabled>

                        </div>
                </div>


              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Capacidad</label>
                      <input id="Capacidad" name="Capacidad" type="text" 
                                value="{{isset($envases->Capacidad)?$envases->Capacidad:old(' Capacidad')}}{{old('Capacidad')}}"  class="form-control {{$errors->has('Capacidad')?'is-invalid':''}}" disabled>
                               
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Clase de producto</label>
                        <input id="Clas_producto" name="Clas_producto" type="text" 
                                value="{{isset($envases->Clas_producto)?$envases->Clas_producto:old(' Clas_producto')}}{{old('Clas_producto')}}"  class="form-control {{$errors->has('Clas_producto')?'is-invalid':''}}" disabled>

                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Altura con valvula</label>
                      <input id="Alt_c_valvula" name="Alt_c_valvula" type="text" 
                                value="{{isset($envases->Alt_c_valvula)?$envases->Alt_c_valvula:old('Alt_c_valvula')}}{{old('Alt_c_valvula')}}"  class="form-control {{$errors->has('Alt_c_valvula')?'is-invalid':''}}" disabled>
                               
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Presion PSI</label>
                        <input id="Presion" name="Presion" type="text" 
                                value="{{isset($envases->Presion)?$envases->Presion:old(' Presion')}}{{old('Presion')}}"  class="form-control {{$errors->has('Presion')?'is-invalid':''}}" disabled>

                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Valvula</label>
                      <input id="Valvula" name="Valvula" type="text" 
                                value="{{isset($envases-> Valvula)?$envases-> Valvula:old('Valvula')}}{{old('Valvula')}}"  class="form-control {{$errors->has('Valvula')?'is-invalid':''}}" disabled>
                               
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Peso con valvula</label>
                        <input id="P_c_valvula" name="P_c_valvula" type="text" 
                                value="{{isset($envases->P_c_valvula)?$envases->P_c_valvula:old('P_c_valvula')}}{{old('P_c_valvula')}}"  class="form-control {{$errors->has('P_c_valvula')?'is-invalid':''}}" disabled>

                        </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Tipo de valvula</label>
                      <input id="Tipo_valvula" name="Tipo_valvula" type="text" 
                                value="{{isset($envases->Tipo_valvula)?$envases->Tipo_valvula:old('Tipo_valvula')}}{{old('Tipo_valvula')}}"  class="form-control {{$errors->has('Tipo_valvula')?'is-invalid':''}}"disabled>
                               
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Color</label>
                        <input id="Color" name="Color" type="text" 
                                value="{{isset($envases-> Color)?$envases->Color:old('Color')}}{{old('Color')}}"  class="form-control {{$errors->has('Color')?'is-invalid':''}}" disabled>

                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Norma tecnica de fabricación</label>
                      <input id="N_int_fabricacion" name="N_int_fabricacion" type="text" 
                                value="{{isset($envases->N_int_fabricacion)?$envases->N_int_fabricacion:old('N_int_fabricacion')}}{{old('N_int_fabricacion')}}"  class="form-control {{$errors->has('N_int_fabricacion')?'is-invalid':''}}" disabled>
                               
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Tapa</label>
                        <input id="Tapa" name="Tapa" type="text" 
                                value="{{isset($envases->Tapa)?$envases->Tapa:old('Tapa')}}{{old('Tapa')}}"  class="form-control {{$errors->has('Tapa')?'is-invalid':''}}" disabled>

                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Fecha de compra</label>
                      <input id="Fecha_compra" name="Fecha_compra" type="data-widget" 
                                value="{{isset($envases->Fecha_compra)?$envases->Fecha_compra:old('Fecha_compra')}}{{old('Fecha_compra')}}"  class="form-control {{$errors->has('Fecha_compra')?'is-invalid':''}}"disabled>
                               
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Garantia</label>
                        <input id="Garantia" name="Garantia" type="text" 
                                value="{{isset($envases->Garantia)?$envases->Garantia:old('Garantia')}}{{old('Garantia')}}"  class="form-control {{$errors->has('Garantia')?'is-invalid':''}}"disabled>

                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Fecha de fabricacion</label>
                      <input id="Fecha_fabricacion" name="Fecha_fabricacion" type="text" 
                                value="{{isset($envases->Fecha_fabricacion)?$envases->Fecha_fabricacion:old('Fecha_fabricacion')}}{{old('Fecha_fabricacion')}}"  class="form-control {{$errors->has('Fecha_fabricacion')?'is-invalid':''}}"disabled>
                               
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Prueba hidrostatica</label>
                        <input id="Prueba_hidrostatica" name="Prueba_hidrostatica" type="text" 
                                value="{{isset($envases->Prueba_hidrostatica)?$envases->Prueba_hidrostatica:old('Prueba_hidrostatica')}}{{old('Prueba_hidrostatica')}}"  class="form-control {{$errors->has('Prueba_hidrostatica')?'is-invalid':''}}"disabled>

                        </div>
                </div>
              </div>

                <div class="">
                    <div class="form-group">
                      <label>Observaciones</label>
                      <input id="Observaciones" name="Observaciones" type="text" 
                                value="{{isset($envases->Observaciones)?$envases->Observaciones:old('Observaciones')}}{{old('Observaciones')}}"  class="form-control {{$errors->has('Observaciones')?'is-invalid':''}}"disabled>
                               
                        </div>
                </div>


            </div>



          </div>  

          <div class="form-group">
                            <div class="col-md-12 text-center">


         <a href="{{url('/envases.pdfindi/'.$envases->Id_envase)}} " type="button" class="btn btn-danger btn-lg" ><i class="fas fa-file-pdf"></i> </a>

        <button type="button" class="btn btn-danger btn-lg" onclick="window.location='{{ URL::previous() }}'">Volver</button>
        </div>
                        </div>

                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
</fieldset>
                  
                   
                </form>
@endsection