  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
 
<script src="js/jquery.numeric.js" type="text/javascript"></script>
<link rel="stylesheet" href="{{ asset('dist/css/titulo.css')}}">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  
<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->

<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you 
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/fileinput.min.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/themes/fa/theme.js"></script>
<script src = "/js/fileinput.js" > </script> 
<script src = "/js/locales/es.js" > </script> 
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->



  <fieldset>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">

                        <legend class="card-header text-center bg-dark">REGISTRO DE PROVEEDORES</legend>
                        <div class="card-body">
                         <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group">
                                  <label>Nº identificación</label>
                               <input id="Id_proveedor" name="Id_proveedor" type="text" 
                                value="{{isset($proveedor->Id_proveedor)?$proveedor->Id_proveedor:old('Id_proveedor')}}" placeholder="Cedula o nit" class="form-control {{$errors->has('Id_proveedor')?'is-invalid':''}} "maxlength="12" minlength="7">
                               

                         {!! $errors->first('Id_proveedor','<div class="invalid-feedback">:message</div>') !!}


                            </div>
                          </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group">
                                  <label>Nombres</label>
                                <input id="Nom_proveedor" name="Nom_proveedor" type="text" 
                                 value="{{isset($proveedor->Nom_proveedor)?$proveedor->Nom_proveedor:old('Nom_proveedor')}}" placeholder="Nombres" class="form-control {{$errors->has('Nom_proveedor')?'is-invalid':''}}"maxlength="60">
                                
                                {!! $errors->first('Nom_proveedor','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group">
                                  <label>Dirección</label>
                                <input id="Dir_proveedor" name="Dir_proveedor" type="text" 
                                value="{{isset($proveedor->Dir_proveedor)?$proveedor->Dir_proveedor:old('Dir_proveedor')}}{{old('Dir_proveedor')}}" placeholder="Direccion" class="form-control {{$errors->has('Dir_proveedor')?'is-invalid':''}}"maxlength="60">
                               
                                {!! $errors->first('Dir_proveedor','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                       <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group">
                                  <label>Ciudad</label>
                                <input id="Ciudad" name="Ciudad" type="text" value="{{isset($proveedor->Ciudad)?$proveedor->Ciudad:old('Ciudad')}}" placeholder="Ciudad" class="form-control {{$errors->has('Ciudad')?'is-invalid':''}}"maxlength="20">
                                
                                {!! $errors->first('Ciudad','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group">
                                  <label>Telefono</label>
                                <input id="Tel_proveedor" name="Tel_proveedor" type="number" value="{{isset($proveedor->Tel_proveedor)?$proveedor->Tel_proveedor:old('Tel_proveedor')}}" placeholder="Telefono" class="form-control {{$errors->has('Tel_proveedor')?'is-invalid':''}}"maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                
                                {!! $errors->first('Tel_proveedor','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group">
                                  <label>Correo</label>
                                <input id="Cor_proveedor" name="Cor_proveedor" type="text" 
                                value="{{isset($proveedor->Cor_proveedor)?$proveedor->Cor_proveedor:old('Cor_proveedor')}}" placeholder="Correo" class="form-control {{$errors->has('Cor_proveedor')?'is-invalid':''}}"maxlength="40">
                               
                                {!! $errors->first('Cor_proveedor','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
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
                       
</fieldset>

