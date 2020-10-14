@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800 text-center">Perfil de usuario</h1>
<br>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
          aria-expanded="false" aria-controls="collapseOne">
          <div class="row justify-content-between">
            <div class="col">
              <h6 class="text-gray-800 ">Nombre</h6>
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
        <div class="row justify-content-center">
          <form>
            <div class="form-group row ">
              <label class="col-sm-4 col-form-label">Nombre</label>
              <div class="col-sm-12">
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" required
                  autocomplete="nombre" autofocus>
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row ">
              <label class="col-sm-4 col-form-label">Apellidos</label>
              <div class="col-sm-12">
                <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" required
                  autocomplete="apellidos" autofocus>
                @error('apellidos')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-4">
                <button type="button" class="btn btn-primary">Aceptar</button>
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-danger">Cancelar</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<div class="card">
  <div class="card-header">
    <h2 class="mb-2">
      <h6 class="text-gray-800 ">Nombre</h6>
    </h2>
  </div>
</div>


<br>
<br>
<div class="accordion" id="accordionContrasenia">
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
          data-target="#collapseContrasenia" aria-expanded="false" aria-controls="collapseContrasenia">
          <h6 class="text-gray-800 ">Cambiar contraseña</h6>
        </button>
      </h2>
    </div>

    <div id="collapseContrasenia" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionContrasenia">
      <div class="card-body">
        <div class="row justify-content-center">
          <form>
            <div class="form-group row ">
              <label class="col-sm-4 col-form-label">Actual</label>
              <div class="col-sm-12">
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" required
                  autocomplete="password" autofocus>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row ">
              <label class="col-sm-4 col-form-label">Nueva</label>
              <div class="col-sm-12">
                <input type="text" name="new" class="form-control @error('new') is-invalid @enderror" required
                  autocomplete="new" autofocus>
                @error('new')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row ">
              <label class="col-sm-10 col-form-label">Repetir contraseña nueva</label>
              <div class="col-sm-12">
                <input type="text" name="repeat" class="form-control @error('repeat') is-invalid @enderror" required
                  autocomplete="repeat" autofocus>
                @error('repeat')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-4">
                <button type="button" class="btn btn-primary">Aceptar</button>
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-danger">Cancelar</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection