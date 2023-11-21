@extends('templates.dashboard')

@section('head_content')
<title>Dashboard - Subcategories</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content_primary')

    <div class="header_container">
        <h1 class="text">Subcategoria</h1>
        <button id="buttonModal" class="btn btn-primary">Crear</button>
    </div>
    <table class="table table-hover table-bordered" id="table_subcategory">
        <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Categoria</th>
              <th scope="col">Acciones</th>
            </tr>
        </thead>
        @forelse ($subcategories as $subcategory)
            <tr class="">
                <td class="">{{ $subcategory->name }}</td>
                <td class="">{{ $subcategory->description }}</td>
                <td class="">{{ $subcategory->category->name }}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn " href="#" data-bs-toggle="dropdown">
                          <img src="{{ asset('icons/elipsis.svg')}}" alt="">
                        </a>

                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{ route('subcategories.edit', $subcategory) }}" class="dropdown-item">Editar</a></li>
                          <li>
                            <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST">
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
                <td colspan="4">Sin datos</td>
            </tr>
        @endforelse
  </table>
    
@endsection

@section('content_secondary')
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