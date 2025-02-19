@extends('template')

@section('title', 'Crear cargo')
    
@push('css')
    
@endpush

@section('content')

@if (session('errorCedula'))
    
    <script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "El empleado no existe",
        timer: 4000,
        });
    </script>

@endif



<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Crear cargo</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('cargos') }}">Lista Cargos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear Cargo</li>
    </ol>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">



        <div class="card-body">
            <form action="{{ route('cargos') }}" method="POST">

                @csrf

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Identificación</label>
                        <input type="number" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" placeholder="Identificacion" value="{{ old('identificacion') }}">
                        @error('identificacion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                    <div class="form-group col-md-4">
                        <label for="inputAddress">Área</label>
                        <select id="inputState" class="form-control @error('area') is-invalid @enderror" name="area">
                            <option value="" selected>area...</option>
                            <option value="marketing">Marketing</option>
                            <option value="estrategias">Estrategias</option>
                        </select>
                        @error('area')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputAddress2">Cargo</label>
                        <select id="inputState" class="form-control @error('cargo') is-invalid @enderror" name="cargo">
                            <option value="" selected>cargo...</option>
                            <option value="director creativo">Director Creativo</option>
                            <option value="copy">Copy</option>
                            <option value="community manager">Community Manager</option>
                            <option value="diseñador senior">Diseñador Senior</option>
                            <option value="diseñador jr">Diseñador Jr.</option>
                            <option value="diseñador grafico">Diseñador Gráfico</option>
                            <option value="realizador audiovisual">Realizador Audiovisual</option>
                        </select>
                        @error('cargo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                </div>

                
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputState">Rol</label>
                    <select id="inputState" class="form-control @error('rol') is-invalid @enderror" name="rol">
                      <option value="" selected>Rol...</option>
                      <option>Jefe</option>
                      <option>Colaborador</option>
                    </select>
                    @error('rol')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">Jefe</label>
                    <select class="select_ciudad form-control @error('jefe') is-invalid @enderror" name="jefe">
                        <option value="sin jefe" selected>Sin jefe</option>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->empleados->nombres }}">{{ $cargo->empleados->nombres." - ".$cargo->cargo }}</option>
                        @endforeach
                        
                    </select>
                    @error('jefe')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Crear</button>

              </form>

    
        </div>

    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('js')

<script>
    $(document).ready(function() {
        $('.select_ciudad').select2();
    });
</script>

@endpush