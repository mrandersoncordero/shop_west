@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content_primary')

  <div class="header_container">
    <h1 class="text">Lista de Usuarios</h1>
    <button id="buttonModal" class="btn btn-primary">Crear</button>
  </div>

  <table class="table table-hover table-bordered" id="table_user">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre de usuario</th>
        <th>Correo</th>
        <th>Tipo de usuario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($users as $user)
      <tr class="">
        <td>{{ $user->id }}</td>
        <td>{{ '@'.$user->name }}</td>
        <td>{{ $user->role->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <div class="dropdown">
              <a class="btn " href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('icons/elipsis.svg')}}" alt="">
              </a>

              <ul class="dropdown-menu">
                <li>
                  <a href="{{ route('users.edit', $user->id) }}" class="dropdown-item">Editar</a>
                </li>
                <li>
                  <form action="{{ route('users.destroy', $user) }}" method="POST">
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
      <div class="p-6 text-gray-900">
        {{ __("Sin datos") }}
      </div>
    @endforelse
    </tbody>
  </table>

@endsection

@section('content_secondary')
<div id="modal" class="modal-container @if($errors->has('first_name') || $errors->has('last_name') || $errors->has('dni') || $errors->has('address') || $errors->has('phone_number') || $errors->has('birthday_date') || $errors->has('name') || $errors->has('email') || $errors->has('password') || $errors->has('password_confirmation') || $errors->has('role')) visible @endif">
  <div class="modal_content">
    <div class="modal_header">
      <div>
        <p>Crear Usuario</p>
        <i class='bx bx-x' id="close"></i>
      </div>
    </div>
    <form action="{{ route('users.store') }}" method="post" class="mt-4">
      @include('admin.user._form')
    </form>
  </div>
</div>
@endsection

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <script>
    let table_user = new DataTable("#table_user", {
      responsive: true,
      columnDefs: [
          { targets: [0, 1, 2, 3], searchable: true }
      ]
    });
  </script>
@endsection