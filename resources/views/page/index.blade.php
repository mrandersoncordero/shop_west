@extends('template')

@section('head_content')
<title>Pegoccidente - Shop</title>
@endsection

@section('content')
<div class="gif">
    <img src="{{ asset('images/bann.gif') }}" alt="pego gif">
</div>
  
<main>
    {{-- <aside class="primary-banner">
        <img src="{{ asset('images/planta-barquisimeto.png') }}" alt="">
        <h1 class="h1">Tu proveedor confiable de materiales de construcción y adhesivos de calidad</h1>
    </aside> --}}
    
    <section class="product-section">
        <header>
            <h1 class="h2"><i class="fa-solid fa-quote-left quotes"></i>Productos confiables de construcción y adhesivos<i class="fa-solid fa-quote-right quotes"></i></h1>
        </header>
        <article class="productos-destacados">
            <div class="content">
                @foreach ($products as $item)
                <header>
                    <h2 class="titulo-producto-destacado">{{ $item->name }}</h2>
                </header>
                <p id="descripcion-producto">
                    {{ $item->description }} 
                </p>
                @break
                @endforeach
                <a href="">IR A PRODUCTOS</a>
            </div>
            <div class="diana-de-productos">
                <div class="diana-container">
                    <div class="diana-principal">
                        @foreach ($products as $key => $product)
                            @if ($key === 0)
                                <div class="diana-secundaria">
                                    <img src="{{ asset("product/$product->image" )}}" class="diana-imagen-principal" id="{{$key}}" alt="{{ $product['name'] }}">
                                </div>
                            @else
                                <div class="imagen-destacada-{{$key}}">
                                    <img src="{{ asset("product/$product->image" )}}" class="diana-imagen-secundaria" id="{{$key}}" alt="{{ $product['name'] }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
    </section>
</main>

<script>
    let products = @json($products);
</script>
<script src="{{ asset('js/productos_destacados.js') }}"></script>
@endsection