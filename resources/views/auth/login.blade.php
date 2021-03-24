@extends('layouts.app')
    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
  
    <link rel="stylesheet" href="{{ asset('dist/css/login.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>




@section('content')
<img class="wave" src="dist/img/wave.jpg">
    <div class="container2">
        <div class="img">
            <img style="height:400px; width:700px;" src="dist/img/cilindro.png">
        </div>
        <div style="position: fixed; left: 70em; top: 2em;" >
        <img class="avatar" src="dist/img/logogases.png" style="height: 100px; width: 200px;">
        </div>
        <div class="login-container2">

            <form method="POST" action="{{route('login')}}">
                {{csrf_field()}}
                <img class="avatar" src="dist/img/avatar.svg">
                <h2>BIENVENIDO</h2>
                <div class="input-div2 one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                <div>
                    <h5>Usuario</h5>
                    <input id="email" type="email" class="input2 @error('email') is-invalid @enderror"name="email" value="{{ old('email') }}" required autocomplete="email" >


                </div>                  
                </div>

                <div class="input-div2 two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                <div>
                    <h5>Password </h5>
                    <input id="password" type="password" class="input2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
              @enderror
                </div>                  
                </div>
                <button type="submit" class="btn2">
                 {{ __('Login') }}
                 </button>
                 @error('email')
                 
                  <span class="invalid-feedback error" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                   @enderror
            </form>
            
        </div>
    </div>
          <script src="{{ asset('dist/js/main.js')}}"></script>

<!-- AdminLTE App -->

@endsection
