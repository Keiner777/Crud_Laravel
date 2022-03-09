@extends('adminlte::page')

@section('title', 'CRUD laravel 8')

@section('content_header')
    <h1>Editar usuarios</h1>
@stop

@section('content')
    


<h1>Editar Registros</h1>

<form action="/articulos/{{ $articulo_Edit->id }}" method="post">
    @csrf
    @method('put')
    {{-- Codigo  --}}
    <div class="mb-3">
        <label for="Codigo"> Codigo</label>
        <input type="text" name="Codigo" id="Codigo" class="form-control" tabindex="1" value="{{ $articulo_Edit->codigo }}" required>
        {{-- el value="{{ $articulo->codigo }}" tiene que estar acorde al controlador edit  --}}
        
    </div>
    {{-- Descripcion  --}}
    <div class="mb-3">
        <label for="Descripcion"> Descripcion</label>
        <input type="text" name="Descripcion" id="Descripcion" class="form-control" tabindex="2"  value="{{ $articulo_Edit->descripcion }}" required>
        
    </div>
    {{-- Cantidad  --}}
    <div class="mb-3">
        <label for="Cantidad"> Cantidad</label>
        <input type="number" name="Cantidad" id="Cantidad" class="form-control" tabindex="3"  value="{{ $articulo_Edit->cantidad }}" required>
        
    </div>
    {{-- Precio  --}}
    <div class="mb-3">
        <label for="Precio"> Precio</label>
        <input type="number" name="Precio" id="Precio" step="any" value="0.00" class="form-control"  value="{{ $articulo_Edit->precio }}" required>
        
    </div>
    {{-- BOTONES  --}}

    <a href="/articulos"  class="btn btn-primary" tabindex="4" >Cancelar</a>
    <button type="submit"class="btn btn-primary" tabindex="4">Guardar</button>
    
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop