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
</script>


  <fieldset>
    <div class="container ">
                        <legend class="text-center ">REGISTRO DE USUARIOS</legend>
                         <div class="form-group aling d-flex justify-content-center">
                            <div class="input-group col-md-8">
                               <div class="input-group-append">
                              <button class="btn btn-primary" type="button" disabled="disabled"> <span><i class="fas fa-id-card"></i></span> </button>
                             </div>
                               <input id="cedula" name="cedula" type="text" 
                                value="{{isset($user->id)?$user->id:old('cedula')}}" placeholder="Cedula" class="form-control {{$errors->has('cedula')?'is-invalid':''}}  onkeypress="return validarNumero(event)">
                               

                         {!! $errors->first('id','<div class="invalid-feedback">:message</div>') !!}


                            </div>
                          </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class=" input-group col-md-8">
                              <div class="input-group-append">
                              <button class="btn btn-primary" type="button" disabled="disabled"> <span><i class="fas fa-user"></i></span> </button>
                             </div>
                                <input id="name" name="name" type="text" 
                                 value="{{isset($user->name)?$user->name:old('name')}}" placeholder="Nombres" class="form-control {{$errors->has('name')?'is-invalid':''}}"maxlength="40">
                                
                                {!! $errors->first('name','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="input-group col-md-8">
                               <div class="input-group-append">
                              <button class="btn btn-primary" type="button" disabled="disabled"> <span><i class="fas fa-home"></i></span> </button>
                             </div>
                                <input id="email" name="email" type="email" 
                                value="{{isset($user->email)?$user->email:old('email')}}{{old('email')}}" placeholder="email" class="form-control {{$errors->has('email')?'is-invalid':''}}">
                               
                                {!! $errors->first('email','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                         <div class="form-group d-flex justify-content-center">
                            <div class="input-group col-md-8">
                              <div class="input-group-append">
                              <button class="btn btn-primary" type="button" disabled="disabled"> <span><i class="fas fa-phone"></i></span> </button>
                             </div>
                                <input id="password" name="password" type="password" value="{{isset($user->password)?$user->password:old('password')}}{{old('password')}}" placeholder="password" class="form-control {{$errors->has('password')?'is-invalid':''}}">
                                
                                {!! $errors->first('password','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="input-group col-md-8">
                              <div class="input-group-append">
                              <button class="btn btn-primary" type="button" disabled="disabled"> <span><i class="fas fa-phone"></i></span> </button>
                             </div>
                                <label for="role"></label>
                                <select class="role form-control" name="role" id="role">
                                  <option value="">Seleccione un rol</option>
                                @foreach($roles as $role)
                                <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                </select>

                            </div>
                        </div>
                         <div class="form-group d-flex justify-content-center permissions_box">
                            <div class=" col-md-8">
                                 <label for="roles">Select Permissions</label>
                                <div id="permissions_checkbox_list">
                                 
                                  
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
                       
</fieldset>

