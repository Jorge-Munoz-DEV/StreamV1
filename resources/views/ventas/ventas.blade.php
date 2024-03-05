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
                    <th>Cuenta</th>
                    <th>Perfil</th>
                    <th>Nickname</th>                
                    <th>Días restantes</th>
                    <th>Pin</th>
                    

                    <th>Cliente</th>                    
                    <th>Precio</th>                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->idtbl_ventas }}</td>
                    <td>{{ $venta->cue_correo }}</td>
                    <td>{{ $venta->per_num }}</td>
                    <td>{{ $venta->ven_nombre_perfil }}</td>                                                       
                    <td><span class="{{ $venta->colorVencimiento }}">{{ $venta->vencimiento }}</span></td>
                    <td>{{ $venta->ven_pin }}</td>
                    <td>{{ $venta->cli_nombre }}</td>
                    <td>{{ $venta->ven_precio }}</td>
                    
                    
                    
                    <td class="d-flex">
                        aa
                        {{-- <a href="{{ route('cuentas.edit', $cuenta->cue_id) }}" class="btn btn-primary btn-sm mr-2" style="width: 30px; height: 30px; border-radius: 50%">
                            <i class="fas fa-pen"></i>
                        </a>

                        <!-- Boton de ver mas para mostrar la cuenta con sus perfiles. -->
                        <a href="{{ route('cuentas.edit', $cuenta->cue_id) }}" class="btn btn-success btn-sm ml-2" style="width: 30px; height: 30px; border-radius: 50%;">
                            <i class="fas fa-eye" style="margin-left: -2px"></i>
                        </a> --}}

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
