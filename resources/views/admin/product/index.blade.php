@extends('templates.dashboard')

@section('head_content')
<title>Dashboard - Products</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endsection

@section('content')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Products</h1>
        <button id="buttonModal" class="btn btn-primary">Crear</button>
    </div>
    <table class="table table-hover table-bordered" id="table-product">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Weight</th>
                <th scope="col">Format</th>
                <th scope="col">Yield</th>
                <th scope="col">Traffic</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Created_at</th>
                <th scope="col">Actions</th>
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
                    <td>{{ $product->price }}</td>
                    <td><a href="{{ asset("product/$product->image") }}">{{ $product->image }}</a></td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="edit">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" onclick="return confirm('Desea Eliminar?')">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">Sin datos</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

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
