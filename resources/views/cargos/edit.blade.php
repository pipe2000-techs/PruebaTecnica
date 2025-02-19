@extends('template')

@section('title', 'Editar Cargo')
    
@push('css')
    
@endpush

@section('content')


    @php

        $listAreas = [
            "Marketing", "Estrategias"
        ];
        
        $ListCargos = [
            "Director Creativo",
            "Copy",
            "Community Manager",
            "Diseñador Senior",
            "Diseñador Jr.",
            "Diseñador Gráfico",
            "Realizador Audiovisual"
        ];

        $listrRoles = [
            "Jefe", "Colaborador"
        ];


    @endphp


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Cargo</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('cargos') }}">Lista de Cargos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">



        <div class="card-body">
            <form action="{{ route('cargos.update', $cargos->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Identificación</label>
                        <input type="number" class="form-control " disabled value="{{ $cargos->empleados->identificacion }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Nombres</label>
                        <input type="text" class="form-control"  disabled value="{{ $cargos->empleados->nombres." ".$cargos->empleados->apellidos}}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputAddress">Área</label>
                        <select id="inputState" class="form-control @error('area') is-invalid @enderror" name="area">

                            @foreach ($listAreas as $area)
                                <option value="{{ $area }}" {{ old('area', $cargos->area) == $area ? 'selected' : '' }}>
                                    {{ $area }}
                                </option>
                            @endforeach

                        </select>
                        @error('area')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    

                </div>

                
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Cargo</label>
                        <select id="inputState" class="form-control @error('cargo') is-invalid @enderror" name="cargo">

                            @foreach ($ListCargos as $cargo)
                                <option value="{{ $cargo }}" {{ old('cargo', $cargos->cargo) == $cargo ? 'selected' : '' }}>
                                    {{ $cargo }}
                                </option>
                            @endforeach
                            
                        </select>
                        @error('cargo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                  <div class="form-group col-md-4">
                    <label for="inputState">Rol</label>
                    <select id="inputState" class="form-control @error('rol') is-invalid @enderror" name="rol">
                      
                        @foreach ($listrRoles as $rol)
                            <option value="{{ $rol }}" {{ old('rol', $cargos->rol) == $rol ? 'selected' : '' }}>
                                {{ $rol }}
                            </option>
                         @endforeach
                        
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
                        @foreach ($empleadosCargo as $empleadoCargo)
                            <option value="{{ $empleadoCargo->empleados->nombres }}" {{ old('jefe', $cargos->jefe) == $empleadoCargo->empleados->nombres ? 'selected' : '' }}>
                                {{ $empleadoCargo->empleados->nombres." - ".$empleadoCargo->cargo }}
                            </option>
                            
                        @endforeach
                        
                    </select>
                    @error('jefe')
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