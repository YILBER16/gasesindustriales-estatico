  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
 
<script src="js/jquery.numeric.js" type="text/javascript"></script>
<link rel="stylesheet" href="{{ asset('dist/css/titulo.css')}}">
 <script type="text/javascript">
function validarNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    patron =/[0-9]/;
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
 }
</script>

  <fieldset>
    <div class="container ">
                        <legend class="text-center ">REGISTRO DE USUARIOS</legend>
                        <div class="form-group d-flex justify-content-center">
                            <div class=" input-group col-md-8">
                              <div class="input-group-append">
                              <button class="btn btn-primary" type="button" disabled="disabled"> <span><i class="fas fa-user"></i></span> </button>
                             </div>
                                <input id="role_name" name="role_name" type="text" 
                                 value="{{isset($role->name)?$role->name:old('name')}}" placeholder="Nombres" class="form-control {{$errors->has('name')?'is-invalid':''}}"maxlength="40">
                                
                                {!! $errors->first('name','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="input-group col-md-8">
                               <div class="input-group-append">
                              <button class="btn btn-primary" type="button" disabled="disabled"> <span><i class="fas fa-home"></i></span> </button>
                             </div>
                                <input id="role_slug" name="role_slug" type="text" 
                                value="{{isset($role->slug)?$role->slug:old('slug')}}{{old('slug')}}" placeholder="slug" class="form-control {{$errors->has('slug')?'is-invalid':''}}">
                               
                                {!! $errors->first('slug','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="input-group col-md-8">
                              <div class="input-group-append">
                             </div>
                                <input data-role="tagsinput"  id="roles_permissions" name="roles_permissions" type="text" value=""

                                 placeholder="Permisos" class="form-control">

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
                       
</fieldset>

