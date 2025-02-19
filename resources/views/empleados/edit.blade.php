@extends('template')

@section('title', 'Crear empleado')
    
@push('css')
    
@endpush

@section('content')


    @php
        $ciudades = [
            "Arauca", "Armenia", "Barranquilla", "Bogota", "Bucaramanga",
            "Cali", "Cartagena", "Cucuta", "Florencia", "Ibague",
            "Leticia", "Manizales", "Medellin", "Mitu", "Mocoa",
            "Monteria", "Neiva", "Pasto", "Pereira", "Popayan",
            "Puerto Carreno", "Puerto Inirida", "Quibdo", "Riohacha",
            "San Andres", "San Jose del Guaviare", "Santa Marta",
            "Sincelejo", "Tunja", "Valledupar", "Villavicencio", "Yopal"
        ];
    @endphp


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Empleado</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('empleados') }}">Lista Empleados</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">



        <div class="card-body">
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputEmail4">Nombres</label>
                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" placeholder="Nombres" value="{{ old('nombres', $empleado->nombres) }}">

                    @error('nombres')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputPassword4">Apellidos</label>
                    <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos', $empleado->apellidos) }}">
                    @error('apellidos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label for="inputPassword4">Identificación</label>
                    <input type="number" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" placeholder="Identificacion" value="{{ old('identificacion', $empleado->identificacion) }}">
                    @error('identificacion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputAddress">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" placeholder="Dirección" value="{{ old('direccion', $empleado->direccion) }}">
                        @error('direccion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputAddress2">Teléfono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" placeholder="Teléfono" value="{{ old('telefono', $empleado->telefono) }}">
                        @error('telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                </div>

                
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputState">País de nacimiento</label>
                    <select id="inputState" class="form-control @error('pais_nacimiento') is-invalid @enderror" name="pais_nacimiento">
                      <option selected>Colombia</option>
                    </select>
                    @error('pais_nacimiento')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">Ciudad de nacimiento</label>
                    <select class="select_ciudad form-control @error('ciudad_nacimiento') is-invalid @enderror" name="ciudad_nacimiento">
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad }}" {{ old('ciudad_nacimiento', $empleado->ciudad_nacimiento) == $ciudad ? 'selected' : '' }}>
                                {{ $ciudad }}
                            </option>
                        @endforeach
                    </select>
                    @error('ciudad_nacimiento')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Editar</button>

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