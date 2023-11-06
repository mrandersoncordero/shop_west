@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Categories and subcategories</h1>
        <button id="buttonModal" class="btn btn-primary">Crear</button>
    </div>
    <table class="table table-bordered table-hover" id="table_category">
        <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">description</th>
              <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="edit">Editar</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input 
                        type="submit" 
                        value="Eliminar" 
                        class=""
                        onclick="return confirm('Desea Eliminar?')"
                    >
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Sin datos</td>
            </tr>
            @endforelse
        </tbody>
  </table>


</div>
<div id="modal" class="modal-container" @if($errors->has('name') || $errors->has('description')) style="visibility: visible;" @endif>
    <div class="modal_content">
        <div class="modal_header">
            <div>
                <p>Crear categoria</p>
                <i class='bx bx-x' id="close"></i>
            </div>
        </div>
        <form action="{{ route('categories.store') }}" method="post" class="mt-4">
            @include('admin.category._form')
        </form>
    </div>
</div>    
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
  let table_category = new DataTable("#table_category", {
    responsive: true,
    columnDefs: [
        { targets: [0, 1, 2], searchable: true }
    ]
  });
</script>
@endsection