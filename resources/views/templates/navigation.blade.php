
<nav class="sidebar">
  <div class="logo_content">
    <div class="logo">
      <img src="{{ asset('images/diana.png') }}" alt="">
      <div class="logo_name">
        <img src="{{ asset('images/text_logo.png') }}" alt="">
      </div>
    </div>
    <i class='bx bx-menu' id="btn"></i>
  </div>

  <!-- <div class="src">
    <i class='bx bx-search'></i>
    <input type="text" name="" placeholder="Search...">
  </div>-->

  <ul class="nav">
    <li>
      <a href="{{ route('dashboard') }}">
        <i class='bx bx-bar-chart-square'></i>
        <span class="link_name">Panel de control</span>
      </a>
      <span class="tooltip">Panel de control</span>
    </li>
    <li>
      <a href="{{ route('categories.index') }}">
        <i class='bx bxs-category' ></i>
        <span class="link_name">Categorias</span>
      </a>
      <span class="tooltip">Categorias</span>
    </li>
    <li>
      <a href="{{ route('subcategories.index') }}">
        <i class='bx bxs-category-alt' ></i>
        <span class="link_name">Subcategorias</span>
      </a>
      <span class="tooltip">Subcategorias</span>
    </li>
    <li>
      <a href="{{ route('products.index') }}">
        <i class='bx bxs-box'></i>
        <span class="link_name">Productos</span>
      </a>
      <span class="tooltip">Productos</span>
    </li>
    <li>
      <a href="{{ route('orders.index') }}">
        <i class='bx bx-list-ul' ></i>
        <span class="link_name">Ordenes</span>
      </a>
      <span class="tooltip">Ordenes</span>
    </li>
    <li>
      <a href="{{ route('payments.index') }}">
        <i class='bx bx-dollar' ></i>
        <span class="link_name">Pagos</span>
      </a>
      <span class="tooltip">Pagos</span>
    </li>
    <li>
      <a href="{{ route('users.index') }}">
        <i class='bx bxs-user'></i>
        <span class="link_name">Usuarios</span>
      </a>
      <span class="tooltip">Usuarios</span>
    </li>
    <li>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">
          <i class='bx bx-log-out-circle'></i>
        <span class="link_name">Cerrar sesion</span>
        </button>
      </form>
      </a>
      <span class="tooltip">Cerrar sesion</span>
    </li>
  </ul>
</nav>