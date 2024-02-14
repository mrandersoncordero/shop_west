@extends('templates.dashboard')

@section('head_content')
<title>Panel de Control - Categorias</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content_primary')

    <div class="header_container">
        <h1 class="text">Categorias y subcategorias</h1>
        <button id="buttonModal" class="btn btn-primary">Crear</button>
    </div>
    <table class="table table-bordered table-hover" id="table_category">
        <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn " href="#" data-bs-toggle="dropdown">
                          <img src="{{ asset('icons/elipsis.svg')}}" alt="">
                        </a>

                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{ route('categories.edit', $category) }}" class="dropdown-item">Editar</a></li>
                          <li>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
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
                <td colspan="3">Sin datos</td>
            </tr>
            @endforelse
        </tbody>
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