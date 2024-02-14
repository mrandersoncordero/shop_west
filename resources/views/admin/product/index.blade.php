@extends('templates.dashboard')

@section('head_content')
<title>Panel de Control - Productos</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endsection

@section('content_primary')

    <div class="header_container">
        <h1 class="text">Productos</h1>
        <button id="buttonModal" class="btn btn-primary">Crear</button>
    </div>
    <table class="table table-hover table-bordered" id="table-product">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Peso</th>
                <th scope="col">Formato</th>
                <th scope="col">Rendimiento</th>
                <th scope="col">Trafico</th>
                <th scope="col">Tipo de Venta</th>
                <th scope="col">Cantidad por unidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th scope="col">Creado el</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->format }}</td>
                    <td>{{ $product->yield }}</td>
                    <td>{{ $product->traffic }}</td>
                    <td>{{ $product->type_of_sale }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td><a href="{{ asset("product/$product->image") }}">{{ $product->image }}</a></td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn " href="#" data-bs-toggle="dropdown">
                              <img src="{{ asset('icons/elipsis.svg')}}" alt="">
                            </a>
    
                            <ul class="dropdown-menu">
                              <li>
                                <a href="{{ route('products.edit', $product) }}" class="dropdown-item">Editar</a></li>
                              <li>
                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input 
                                        type="submit" 
                                        value="Eliminar" 
                                        class="dropdown-item"
                                        onclick="return confirm('Desea Eliminar?')"
                                    >
                                </form>
                              </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">Sin datos</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection

@section('content_secondary')
<div id="modal" class="modal-container" @if($errors->any()) style="visibility: visible;" @endif>
    <div class="modal_content">
        <div class="modal_header">
            <div>
                <p>Create product</p>
                <i class='bx bx-x' id="close"></i>
            </div>
        </div>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="mt-4">
            @include('admin.product._form')
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        let table = $('#table-product').DataTable({
            responsive: true,
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], searchable: true }
            ]
        });
    });
</script>
@endsection
