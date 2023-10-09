
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
        <i class='bx bx-line-chart' ></i>
        <span class="link_name">Workout Statictic</span>
      </a>
      <span class="tooltip">Workout Statictic</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bx-calendar-event'></i>
        <span class="link_name">Workout Plan</span>
      </a>
      <span class="tooltip">Workout Plan</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bxs-bolt'></i>
        <span class="link_name">Distance Map</span>
      </a>
      <span class="tooltip">Distance Map</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bxs-heart-circle'></i>
        <span class="link_name">Diet Food Menu</span>
      </a>
      <span class="tooltip">Diet Food Menu</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bxs-pie-chart'></i>
        <span class="link_name">Personal Record</span>
      </a>
      <span class="tooltip">Personal Record</span>
    </li>
  </ul>
</nav>