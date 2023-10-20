@extends('template')

@section('head_content')
<title>Pegoccidente - Cart</title>
<link rel="stylesheet" href="{{ asset('css/view_cart.css') }}">
@endsection

@section('content')
<main style="margin-top: 100px">
  {{-- BANNER --}}
  <section class="container_cart_view">
    <header class="header_line">
      <h1>Detalles del carrito de compras</h1>
    </header>
    <article class="container_card">
      <section>
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
          </section>
  
          <section class="cart_actions">
            {{-- ACTIONS --}}
            <form action="{{ route('cart.edit') }}" method="POST" class="cart_update">
              @csrf
              <div>
                <label for="quantity">Cantidad</label>
                <input type="number" id="quantity" name="quantity" value="{{ $item['quantity'] }}">
                <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
              </div>
              <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
            </form>
            <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST" class="cart_delete">
              @csrf
              @method('DELETE')
              <button type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
            <form action="{{ route('cart.clear') }}" method="POST" class="cart_clear">
              @csrf
              @method('DELETE')
              <button type="submit"><i class="fa-brands fa-bitbucket"></i></button>
            </form>
          </section>

        </section>
    @endforeach
      </section>
      <section class="content_confirt_purchase">
        

        <form action="{{ route('cart.checkout') }}" method="POST">
          @csrf
          <button type="submit">Comfirmar compra</button>
        </form>
      </section>
    </article>

  </section>


  @else
    <p>no hay nada</p>
  @endif
</main>

@include('templates.footer')
@endsection