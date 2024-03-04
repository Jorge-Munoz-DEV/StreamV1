@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cuentas</h1>
    <style>
     
     

     .circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin-right: 5px; /* Ajusta el espaciado entre los círculos */
}

.green {
    background-color: green;
    color: white;
}

.red {
    background-color: red;
    color: white;
}




    </style>
@stop

@section('content')

<a class="btn btn-secondary btn-sm m-2" href="{{ route('cuentas.create') }}" role="button" >Registrar Cuenta</a>
<div class="card">
    <!-- DataTables -->
    <div class="card-body table-responsive p-2">
        <table id="datatables_cliente" class="display shadow-sm text-capitalize">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Correo</th>
                    <th>Fecha Compra</th>
                    <th>Fecha de vencimiento</th>
                    <th>Días restantes</th>
                    <th>Proveedor</th>
                    <th>Tipo</th>
                    <th>Periles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuentas as $cuenta)
                <tr>
                    <td>{{ $cuenta->cue_id }}</td>
                    <td>{{ $cuenta->cue_correo }}</td>
                    <td>{{ $cuenta->cue_fecha_compra }}</td>
                    <td>{{ $cuenta->cue_fecha_vence }}</td>
                    <td>
                        @php
                        // Restablecer valores para cada iteración
                        $mensaje = null;
                        $color = null;
                
                        // Calcular la diferencia de días entre la fecha de vencimiento y la fecha actual
                        $fechaVencimiento = new DateTime($cuenta->cue_fecha_vence);
                        $fechaActual = new DateTime();
                        $diferencia = $fechaActual->diff($fechaVencimiento);
                
                        // Calcular la diferencia total de días
                        $diferenciaDias = $diferencia->days+1;
                
                        // Verificar si la cuenta está vencida
                        if ($fechaActual > $fechaVencimiento) {
                            // $mensaje = 'Cuenta vencida, Por favor renovar';
                            if ($diferenciaDias-1 == 1){
                                $mensaje = "Vencida hace ".$diferenciaDias-1 . " día." ;
                            }else{
                                $mensaje = "Vencida hace ".$diferenciaDias-1 . " días." ;
                            }                            
                            $color = 'text-danger'; // Rojo
                        } else {
                            // Aplicar estilos condicionales basados en el rango de días
                            if ($diferenciaDias >= 20) {
                                $color = 'text-success'; // Verde
                            } elseif ($diferenciaDias >= 1) {
                                $color = 'text-warning'; // Amarillo
                            } else {
                                $color = 'text-danger'; // Rojo
                            }
                        }
                        @endphp
                        <span class="{{ $color }}">{{ $mensaje ?? $diferenciaDias }}</span>
                    </td>
                    <td>{{ $cuenta->cue_proveedor }}</td>
                    <td>{{ $cuenta->tipo->tipo_nombre }}</td> <!-- Utiliza la relación para obtener el nombre del tipo -->
                    <td style="width: 250px">
                        @php
                            $per_ocupados = $cuenta->per_ocupados;
                            $per_desocupados = $cuenta->per_desocupados;
                        @endphp
                        @foreach ($cuenta->per_desocupados as $perfil)
                        <div class="circle green">{{ $perfil->per_num }}</div>
                        @endforeach
                        @foreach ($cuenta->per_ocupados as $perfil)
                        <div class="circle red">{{ $perfil->per_num }}</div>
                        @endforeach
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('cuentas.edit', $cuenta->cue_id) }}" class="btn btn-primary btn-sm mr-2" style="width: 30px; height: 30px; border-radius: 50%">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@stop

@section('js')
  {{-- jQuery --}}
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- DataTables JS-->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script>
    const dataTableOpciones = {
        "order": [[ 0, 'asc' ]],
    }

    $(document).ready(function () {
        $('#datatables_cliente').DataTable();
    });
</script>
@stop
