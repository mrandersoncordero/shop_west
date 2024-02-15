@extends('template')

@section('head_content')
<title>Pegoccidente - Cart</title>
<link rel="stylesheet" href="{{ asset('css/view_cart.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection

@section('content')
<main style="display: flex; flex-direction: column; justify-content: space-between; min-height: 100vh;">
  {{-- incluir message --}}
  @if (session('message'))
  @include('templates.message')
  @endif
  {{-- BANNER --}}
  <section class="container_cart_view">
    <header class="header_line">
      <h1>Detalles del carrito de compras</h1>
    </header>

    <div style="margin: 12px 0px;">
      <img src="{{ asset('images/metodos_de_pago.jpg') }}" alt="" style="width: 100%;">
    </div>
    <article class="container_card">
      <section class="cart_content_products">
    @php
    $price_total = 0;
    @endphp
    @if ($products)
    @foreach ($products as $key => $item)
      {{-- productos --}}
        <section class="content_card">

          <section class="cart_content_image">
            {{-- IMAGE --}}
            <img src="{{ asset("product/{$item['product']->image}") }}" alt="" sty>
          </section>
  
          <section class="cart_information">
            {{-- INFORMATION --}}
            <p><span>Nombre: </span>{{ $item['product']->name }}</p>
            <p><span>Codigo: </span>{{ $item['product']->code }}</p>
            <p><span>Peso: </span>{{ $item['product']->weight }} Kg</p>
            <p><span>Tipo de Venta: </span>{{ $item['product']->type_of_sale }}</p>
            <p><span>Cantidad por unidad de Tipo de Venta: </span>{{ $item['product']->quantity }}</p>
          </section>
  
          <section class="cart_actions">
            {{-- ACTIONS --}}
            <form action="{{ route('cart.edit') }}" method="POST" class="cart_update">
              @csrf
              <div>
                <label for="quantity">Cantidad</label>
                <input type="number" id="quantity" name="quantity" value="{{ $item['quantity'] }}">
                @php
                if ($item['quantity'] > 1) {
                  $price_item = $item['quantity'] * $item['product']->price;
                  $price_total += $price_item;
                }else{
                  $price_total += $item['product']->price;
                }
                @endphp
                <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
              </div>
              <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
            </form>
            <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST" class="cart_delete">
              @csrf
              @method('DELETE')
              <button type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
          </section>

        </section>
    @endforeach
      </section>
      <section class="content_confirt_purchase">
        
        <div class="container mt-4">

          <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="price_total" value="{{ $price_total }}">
            <div class="mt-4" style="display: flex; justify-content: flex-start; gap: 12px;">

            <button type="submit" class="btn btn-secondary">Comfirmar compra</button>
            <form action="{{ route('cart.clear') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-secondary"><i class="fa-brands fa-bitbucket"></i></button>
            </form>
            </div>
          </form>

        </div>
      </section>
    </article>

  </section>

  @endif
</main>

@include('templates.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/message.js') }}"></script>
@endsection