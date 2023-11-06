@extends('templates.dashboard')

@section('head_content')
<title>Dashboard - Subcategories</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Subcategories</h1>
        <button id="buttonModal" class="btn btn-primary">Crear</button>
    </div>
    <table class="table table-hover table-bordered" id="table_subcategory">
        <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Category</th>
              <th scope="col">Actions</th>
            </tr>
        </thead>
        @forelse ($subcategories as $subcategory)
            <tr class="">
                <td class="">{{ $subcategory->name }}</td>
                <td class="">{{ $subcategory->description }}</td>
                <td class="">{{ $subcategory->category->name }}</td>
                <td>
                    <a href="{{ route('subcategories.edit', $subcategory) }}" class="edit">Editar</a>
                    <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST">
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
                <td colspan="4">Sin datos</td>
            </tr>
        @endforelse
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
        <form action="{{ route('subcategories.store') }}" method="post" class="mt-4">
            @include('admin.subcategory._form')
        </form>
    </div>
</div>    
@endsection

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <script>
    let table_subcategory = new DataTable("#table_subcategory", {
      paging: false,
      responsive: true,
      info: false,
      columnDefs: [
          { targets: [0, 1, 2], searchable: true }
      ]
    });
  </script>
@endsection