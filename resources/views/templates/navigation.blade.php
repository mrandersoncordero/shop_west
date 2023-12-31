
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

  <div class="src">
    <i class='bx bx-search'></i>
    <input type="text" name="" placeholder="Search...">
  </div>

  <ul class="nav">
    <li>
      <a href="{{ route('dashboard') }}">
        <i class='bx bx-bar-chart-square'></i>
        <span class="link_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    <li>
      <a href="{{ route('categories.index') }}">
        <i class='bx bxs-category' ></i>
        <span class="link_name">Categories</span>
      </a>
      <span class="tooltip">Categories</span>
    </li>
    <li>
      <a href="{{ route('subcategories.index') }}">
        <i class='bx bxs-category-alt' ></i>
        <span class="link_name">Subcategories</span>
      </a>
      <span class="tooltip">Subcategories</span>
    </li>
    <li>
      <a href="{{ route('products.index') }}">
        <i class='bx bxs-box'></i>
        <span class="link_name">Products</span>
      </a>
      <span class="tooltip">Products</span>
    </li>
    <li>
      <a href="{{ route('orders.index') }}">
        <i class='bx bx-list-ul' ></i>
        <span class="link_name">Orders</span>
      </a>
      <span class="tooltip">Orders</span>
    </li>
    <li>
      <a href="{{ route('payments.index') }}">
        <i class='bx bx-dollar' ></i>
        <span class="link_name">Payments</span>
      </a>
      <span class="tooltip">Payments</span>
    </li>
    <li>
      <a href="{{ route('users.index') }}">
        <i class='bx bxs-user'></i>
        <span class="link_name">Users</span>
      </a>
      <span class="tooltip">Users</span>
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