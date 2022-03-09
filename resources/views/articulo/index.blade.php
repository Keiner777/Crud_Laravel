@extends('adminlte::page')

@section('title', 'CRUD laravel 8')

@section('content_header')
    <h1>Crud-Login</h1>
@stop

@section('content')
    

<h1 class="mb-3">Lista de Articulos.</h1>
<a href="articulos/create" class="btn btn-primary mb-4">Crear</a>

<table id="articulos__table" class="table table-dark table-striped mt-4 ">

    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Codigo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        

    {{-- $articulos_index tiene que estar acorde al controlador, en este caso el controlador index --}}
        @foreach ($articulos_index as $articulo_)
        
        <tr>
            {{-- luego los mostramos, el $articulo_->los valores a mostrar de la BD,tiene que estar acorde a la base de datos --}}
            <td>{{ $articulo_->id }}</td>
            <td>{{ $articulo_->codigo }}</td>
            <td>{{ $articulo_->descripcion }}</td>
            <td>{{ $articulo_->cantidad }}</td>
            <td>{{ $articulo_->precio }}</td>

            <td>

                <form action="{{ route('articulos.destroy',$articulo_->id)}}" method="post">
                    <a class="btn btn-info" href="/articulos/{{ $articulo_->id }}/edit">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Quieres borrar el registro?')" class="btn btn-danger">Borrar</button>
                    
                </form>
            </td>
        </tr>
            
        @endforeach
    </tbody>

</table>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#articulos__table').DataTable({
        "lengthMenu": [[5,10,50, -1],[5,10,50, "All"]]
    });
} );
</script>



@stop