<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
 

<link rel="stylesheet" href="{{ asset('dist/css/titulo.css')}}">
 <script type="text/javascript">
function validarNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    patron =/[0-9]/;
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
 }

$(document).ready(function() {
$('#Id_proveedor').change(function(){
    var valorCambiado =$(this).val();
    console.log($(this).val());
    if((valorCambiado == '')){
       document.getElementsByClassName('estado1')[0].style.display = "none"
       console.log("si");
       document.getElementById("Fecha_compra").value = "";
       document.getElementById("Garantia").value = "";
       document.getElementById("Fecha_fabricacion").value = "";
     }
     else
     {
   document.getElementById("estado1").style.display = "block";
         console.log("no");
     }
});
var proveedor = $("#Id_proveedor option:selected").val();
if(proveedor == ""){
  document.getElementsByClassName('estado1')[0].style.display = "none"

}
});
</script>

<script>
  $(document).ready(function() {
    var valor_propietario = $("#Id_propietario option:selected").val();
    @foreach($propietarios as $propietario)
    var valor="{{$propietario->Id_propietario}}";     
    if((valor_propietario == valor)){
      console.log("{{$propietario->Nom_propietario}}");
      $('#Id_propietario').append(`<option selected value="{{$propietario->Id_propietario}}" hidden="">{{$propietario->Nom_propietario}}</option>`);
    }
    @endforeach
    });
  
</script>
<script>
  $(document).ready(function() {
    var valor_proveedor = $("#Id_proveedor option:selected").val();
    console.log(valor_proveedor);
    @foreach($proveedores as $proveedor)   
    var valor="{{$proveedor->Id_proveedor}}"; 
        if((valor_proveedor == valor)){
      console.log("{{$proveedor->Id_proveedor}}");
      $('#Id_proveedor').append(`<option selected value="{{$proveedor->Id_proveedor}}">{{$proveedor->Nom_proveedor}}</option>`);
     
    }
    @endforeach
    });
  
</script>


 <fieldset>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
                        <legend class="card-header text-center bg-dark">HOJA DE VIDA DE CILINDROS</legend>
                      <div class="card-body">
                        <div class="well">

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                               <label>Id envase</label>
                                <input id="Id_envase" name="Id_envase" type="text" 
                                value="{{isset($envase->Id_envase)?$envase->Id_envase:old('Id_envase')}}" placeholder="Identificacion" class="form-control {{$errors->has('Id_envase')?'is-invalid':''}}" maxlength="20">
                               

                         {!! $errors->first('Id_envase','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                           
                              <label>Propietario</label>
                                <select id="Id_propietario" name="Id_propietario" class="form-control form-control-chosen">
                                  <option hidden=""  value="{{$envase['Id_propietario']}}" >{{$envase['Id_propietario']}}</option>
                                  @foreach($propietarios as $propietario)
                                  <option value="{{$propietario['Id_propietario']}}" >{{$propietario['Nom_propietario']}}</option>
                                  @endforeach

                                   </select>

                                
                                {!! $errors->first('Id_propietario','<div class="invalid-feedback">:message</div>') !!}
                               </div>
                               </div> 
                            </div>
                          


                           <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Proveedor</label>                                  
                               <select id="Id_proveedor" name="Id_proveedor" class="form-control form-control-chosen">

                                  <option hidden="" value="{{$envase['Id_proveedor']}}">{{$envase['Id_proveedor']}}</option>
                                 <option value="">Sin proveedor</option>
                                  @foreach($proveedores as $proveedor)
                                   <option value="{{$proveedor['Id_proveedor']}}" @if(old('Id_proveedor') == $proveedor->Id_proveedor) selected="selected" @endif>{{$proveedor['Nom_proveedor']}}</option>
                                  
                                  @endforeach
                                </select>
                                
                               
                                {!! $errors->first('Id_proveedor','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                              <label>Nº interno del envase</label> 
                                <input id="N_int_envase" name="N_int_envase" type="text" value="{{isset($envase->N_int_envase)?$envase->N_int_envase:old('N_int_envase')}}" placeholder="Numero interno envase" class="form-control {{$errors->has('N_int_envase')?'is-invalid':''}}" maxlength="20">
                                
                                {!! $errors->first('N_int_envase','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        </div>



                        
                        
                      
                      <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                              <label>Estado</label>  
                                <select id="Estado_envase" name="Estado_envase" class="form-control">
                                  <option value="{{$envase['Estado_envase']}}">{{$envase['Estado_envase']}}</option>
                                  <option value="Nuevo">Nuevo</option>
                                  <option value="Usado">Usado</option>

                                   </select>
                               
                                {!! $errors->first('Estado_envase','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                       <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Material</label>
                                <select id="Material" name="Material" class="form-control">
                                  <option value="{{$envase['Material']}}">{{$envase['Material']}}</option>
                                  <option value="Acero">Acero</option>
                                  <option value="Aluminio">Aluminio</option>
                                   </select>
                                                              
                                {!! $errors->first('Material','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>
                        
                        
                                
                        <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                              <label>Unidad de medida</label>
                                <select id="U_medida" name="U_medida" class="form-control">
                                  <option value="{{$envase['U_medida']}}">{{$envase['U_medida']}}</option>
                                <option value="Kilogramos">Kilogramos</option>
                                 <option value="Metros cubicos">Metros cubicos</option>
                                </select>
                               
                                {!! $errors->first('U_medida','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                            <label>  Capacidad (Litros)</label>
                                <input id="Capacidad" name="Capacidad" type="number" step = "any" 
                                value="{{isset($envase->Capacidad)?$envase->Capacidad:old('Capacidad')}}" placeholder="Capacidad" class="form-control {{$errors->has('Capacidad')?'is-invalid':''}}" maxlength="12">
                               
                                {!! $errors->first('Capacidad','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group"> 
                                <label>Presion</label>
                                <input id="Presion" name="Presion" type="number" step = "any" 
                                value="{{isset($envase->Presion)?$envase->Presion:old('Presion')}}" placeholder="Presion" class="form-control {{$errors->has('Presion')?'is-invalid':''}}" maxlength="12">
                               

                                {!! $errors->first('Presion','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                           
                         </div>




                           
                             <div class="row">
                            
                         <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Clase de producto</label>
                              <select id="Clas_producto" name="Clas_producto" class="form-control">
                                  <option value="{{$envase['Clas_producto']}}">{{$envase['Clas_producto']}}</option>
                                  <option value="Oxigeno medicinal">Oxigeno medicinal</option>
                                  <option value="Oxigeno industrial">Oxigeno industrial</option>
                                  <option value="Nitrogeno">Nitrogeno</option>
                                  <option value="Argon">Argon</option>
                                  <option value="Acetileno">Acetileno</option>
                                  <option value="Co2">Co2</option>
                                  <option value="Mezclas">Mezclas</option>
                                  <option value="Aire">Aire</option>
                                  <option value="Helio">Helio</option>
                                   </select>
                               
                                {!! $errors->first('Clas_producto','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                              <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Color</label>
                               <input id="Color" name="Color" type="text" 
                                value="{{isset($envase->Color)?$envase->Color:old('Color')}}" placeholder="Color" class="form-control {{$errors->has('Color')?'is-invalid':''}}" maxlength="20">
                               

                                {!! $errors->first('Color','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                      </div>

                         
                                

                           <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                              <label>Peso con valvula</label> 
                                <input id="P_c_valvula" name="P_c_valvula" type="text" 
                                value="{{isset($envase->P_c_valvula)?$envase->P_c_valvula:old('P_c_valvula')}}" placeholder="Peso con valvula" class="form-control {{$errors->has('P_c_valvula')?'is-invalid':''}}" maxlength="12">
                               

                                {!! $errors->first('P_c_valvula','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                              <label>Valvula</label> 
                                <input id="Valvula" name="Valvula" type="text" 
                                value="{{isset($envase->Valvula)?$envase->Valvula:old('Valvula')}}" placeholder="Valvula" class="form-control {{$errors->has('Valvula')?'is-invalid':''}}" maxlength="12" >
                               
                                {!! $errors->first('Valvula','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>


                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Altura con valvula</label>
                                <input id="Alt_c_valvula" name="Alt_c_valvula" type="text" 
                                value="{{isset($envase->Alt_c_valvula)?$envase->Alt_c_valvula:old('Alt_c_valvula')}}" placeholder="Altura con valvula" class="form-control {{$errors->has('Alt_c_valvula')?'is-invalid':''}}" maxlength="12">
                               

                                {!! $errors->first('Alt_c_valvula','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                            <label>Tapa</label> 
                               <select id="Tapa" name="Tapa" class="form-control">
                                  <option value="{{$envase['Tapa']}}">{{$envase['Tapa']}}</option>
                                  <option value="Si">Si</option>
                                  <option value="No">No</option>
                                   </select>
                               

                                {!! $errors->first('Tapa','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                              
                        </div>



                         
                            <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                            <label>Norma tecnica de fabricación</label>            
                              <input id="N_int_fabricacion" name="N_int_fabricacion" type="text" 
                                value="{{isset($envase->N_int_fabricacion)?$envase->N_int_fabricacion:old('N_int_fabricacion')}}" placeholder="Norma tecnica de fabricación" class="form-control {{$errors->has('N_int_fabricacion')?'is-invalid':''}}" maxlength="25">
                               
                                {!! $errors->first('N_int_fabricacion','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                              
                            <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group"> 
                              <label>Prueba hidrostatica</label>
                                <input id="Prueba_hidrostatica" name="Prueba_hidrostatica" type="text" placeholder="Prueba hidrostatica" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{isset($envase->Prueba_hidrostatica)?$envase->Prueba_hidrostatica:old('Prueba_hidrostatica')}}" placeholder="Prueba_hidrostatica" class="form-control {{$errors->has('Prueba_hidrostatica')?'is-invalid':''}}">
                               
                                {!! $errors->first('Prueba_hidrostatica','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>

                                                          
                        <div class="estado1" id="estado1">
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group"> 
                              <label>Fecha de compra</label>
                              <input id="Fecha_compra" name="Fecha_compra" type="text" placeholder="Fecha de compra" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{isset($envase->Fecha_compra)?$envase->Fecha_compra:old('Fecha_compra')}}"  class=" form-control {{$errors->has('Fecha_compra')?'is-invalid':''}}">
                               

                                {!! $errors->first('Fecha_compra','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group"> 
                              <label>Garantia</label>

                                <input id="Garantia" name="Garantia" type="text"placeholder="Garantia" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')" 
                                value="{{isset($envase->Garantia)?$envase->Garantia:old('Garantia')}}" placeholder="Garantia" class=" form-control {{$errors->has('Garantia')?'is-invalid':''}}" maxlength="12" >
                               

                                {!! $errors->first('Garantia','<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                </div>
                            </div>
                       
                       
                        
                          <div class="row">
                            <div class="col-xs-6 col-sm-12 col-md-12">
                            <div class="form-group">
                            <label>Fecha de fabricación</label>                                
                              <input id="Fecha_fabricacion" name="Fecha_fabricacion" type="text" placeholder="Fecha de fabricación" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')" 
                                value="{{isset($envase->Fecha_fabricacion)?$envase->Fecha_fabricacion:old('Fecha_fabricacion')}}" placeholder="Fecha_fabricacion" class="form-control {{$errors->has('Fecha_fabricacion')?'is-invalid':''}}">
                               
                                {!! $errors->first('Fecha_fabricacion','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                            
                        </div>
                         </div>
                            <div class="form-group">     
                              <label>Observaciones</label>                                      
                                <textarea id="Observaciones" name="Observaciones" type="text" 
                                value="{{isset($envase->Observaciones)?$envase->Observaciones:old('Observaciones')}}" placeholder="Observaciones" class="form-control {{$errors->has('Observaciones')?'is-invalid':''}}" maxlength="250" rows="5" ></textarea>
                               

                                {!! $errors->first('Observaciones','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">                                                     
                                <input id="Estado_actual" name="Estado_actual" type="text" 
                                value="0" hidden="">
                            </div>
                        




                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary btn-lg" 
                                onclick="return confirm('¿Verifique que estén correctamente diligencia todos los campos?');"  value="{{$Modo=='crear'?'Agregar':'Modificar'}}">

                                <button type="button" class="btn btn-danger btn-lg" onclick="window.location='{{ URL::previous() }}'">Cancelar</button>
                            </div>
                        </div>
                        </div>
                        </div>






                        </div>
                        </div>
                        </div>
                        </div>
</fieldset>

