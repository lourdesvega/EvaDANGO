@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800 text-center">Perfil de usuario</h1>
<br>

<div class="text-center">
  <img src="{{asset('img/perfil.png')}}" width="30%" height="30%" class="rounded" alt="...">
</div>
<br>

<div class="accordion" id="accordionExample">
  <div class="card border-left-0 border-right-0">
    <div style="background: whitesmoke" class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
          aria-expanded="false" aria-controls="collapseOne">
          <div class="row justify-content-between">
            <div class="col">
              <h6 id="nombre_usuario" class="text-gray-800 ">Nombre: {{$usuario->name.' '.$usuario->apellidos}}</h6>
            </div>
            <div class="col">
              <p class="text-right">
                Editar
              </p>
            </div>
          </div>

        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">


        <div class="form-group row ">
          <label class="col-md-3 col-form-label">Nombre</label>
          <div class="col-md-7">
            <input type="text" value="{{$usuario->name}}" id="nombre" name="nombre"
              class="form-control @error('nombre') is-invalid @enderror" required autocomplete="nombre" autofocus>
            <span id="nombre-span" class="invalid-feedback">
              <strong></strong>
            </span>
          </div>
        </div>

        <div class="form-group row ">
          <label class="col-md-3 col-form-label">Apellidos</label>
          <div class="col-md-7">
            <input type="text" id="apellidos" name="apellidos" value="{{$usuario->apellidos}}"
              class="form-control @error('apellidos') is-invalid @enderror" required autocomplete="apellidos" autofocus>
            <span id="apellidos-span" class="invalid-feedback">
              <strong></strong>
            </span>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-4">
            <button type="button" class="btn btn-danger close-name">Cancelar</button>
          </div>
          <div class="col-4">
            <button type="button" class="btn btn-primary validar-nombre">Aceptar</button>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>


<div class="cardborder-left-0 border-right-0">
  <div style="background: whitesmoke" class="card-header">
    <div class="col">
      <div class="col px-md-0">
        <h2 class="mb-3">
          <h6 class="text-gray-800 ">Correo electrónico: {{$usuario->email}}</h6>
        </h2>
      </div>
    </div>
  </div>
</div>
@if ($usuario->nivel == 2 && $usuario->deposito!=null)
<div class="cardborder-left-0 border-right-0">
  <div style="background: whitesmoke" class="card-header">
    <div class="col">
      <div class="col px-md-0">
        <h2 class="mb-3">
          <h6 class="text-gray-800 ">
            <p>Depósito: {{$usuario->deposito->nombre}}</p>
            <p> {{$usuario->deposito->zona->nombre}} </p>
            <p>Estado: {{$usuario->deposito->estado}}</p>
            <p>Municipio: {{$usuario->deposito->municipio}}</p>
          </h6>
        </h2>
      </div>
    </div>
  </div>
</div>

@endif



<div class="accordion" id="accordionContrasenia">
  <div class="card border-left-0 border-right-0">
    <div style="background: whitesmoke" class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
          data-target="#collapseContrasenia" aria-expanded="false" aria-controls="collapseContrasenia">
          <h6 class="text-gray-800 ">Cambiar contraseña</h6>
        </button>
      </h2>
    </div>

    <div id="collapseContrasenia" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionContrasenia">
      <div class="card-body">
        <form>
          <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label text-md-right">Contraseña</label>

            <div class="col-md-5">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">
              <span id="password-span" class="invalid-feedback">
                <strong></strong>
              </span>
            </div>
          </div>




          <div class="form-group row">
            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">Confirmar contraseña</label>

            <div class="col-md-5">
              <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-4">
              <button class="btn btn-danger close-pass">Cancelar</button>
            </div>
            <div class="col-4">
              <button class="btn btn-primary validar-pass">Aceptar</button>
            </div>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function mensajeCorrecto(mensaje){
        Swal.fire({
            icon: 'success',
            title: mensaje,
            showConfirmButton: false,
            timer: 1500
        });
                
}

  $(function () {
    $('body').on('click', '.close-pass', function (event) {
      $('#collapseContrasenia').collapse("hide");
    });

    $('body').on('click', '.close-name', function (event) {
      $('#collapseOne').collapse("hide");
    });

    var password ;
    var password_confirm;
    var nombre;
    var apellidos;




    $('body').on('click', '.validar-nombre', function (event) {
            event.preventDefault();
            nombre = 	$('#nombre').val();
            apellidos = 	$('#apellidos').val();
            const url = $(this).attr('href');
          $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "PUT",
            url: "{{route('perfil.editar.nombre')}}",
            data:{
              nombre:nombre,
              apellidos:apellidos,
            },
            success: function () {
              mensajeCorrecto("Su nombre ha sido actualizado");
              $("#nombre_usuario").text(nombre+" "+apellidos);
            },
            error: function(request) { 
               $.each(request.responseJSON.errors, function (k, v) { 
                 if(k=='apellidos'){
                  $("#apellidos-span").show();
                  $("#apellidos-span").text(v);
                 }

                 if(k=='nombre'){
                  $("#nombre-span").show();
                  $("#nombre-span").text(v);
                 }
              }) 
            },        
          });     
    });

        $('body').on('click', '.validar-pass', function (event) {
          $("#password-span").text('');
            event.preventDefault();
             password = 	$('#password').val();
            password_confirm = 	$('#password_confirm').val();
        const url = $(this).attr('href');
          $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "PUT",
            url: "{{route('perfil.editar.contrasenia')}}",
            data:{
              password:password,
              password_confirmation:password_confirm,
            },
            success: function () {
              $('#password').val('');
              $('#password_confirm').val('');
              mensajeCorrecto("Su contraseña ha sido actualizada");
            },
            error: function(request) { 
               $.each(request.responseJSON.errors, function (k, v) { 
                $("#password-span").show(v);
                $("#password-span").text(v);
              }) 
            },        
          });     
         });
        });
</script>
@endsection