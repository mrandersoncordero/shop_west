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
            <h2 class="h2"><i class="fa-solid fa-quote-left quotes"></i>Productos confiables de construcción y adhesivos<i class="fa-solid fa-quote-right quotes"></i></h2>
        </header>
        <article class="list-products">
            <div class="tab-products">
                <figure>
                    <img src="{{ asset('images/products/DColorMarmolina.png') }}" alt="" class="img-product">
                </figure>
                <div class="tab-content">
                    <h3>D’ COLOR MARMOLINA</h3>
                    <p>Mortero en polvo a base de cemento blanco o gris, marmolina y arena sílice  seleccionada y aditivos químicos aplicado para el relleno de juntas anchas de baldosas, cerámicas y toda la gama de revestimientos rústicos. Para relleno de juntas anchas de baldosas, cerámicas, caico, piedra, lajas, etc. Para juntas desde 5mm hasta 20mm. Uso en interiores y exteriores.</p>
                </div>
            </div>
            <div class="tab-products">
                <figure>
                    <img src="{{ asset('images/products/Imperplus.png') }}" alt="" class="img-product">
                </figure>
                <div class="tab-content">
                    <h3>IMPERPLUS</h3>
                    <p>Mortero en polvo a base de cemento gris, agregados minerales y aditivos químicos especiales para proteger, impermeabilizar y eliminar humedad, alta propiedad hidrófuga, con alta resistencia a la presión de agua, sin afectar la potabilidad. Para uso en interiores y exteriores.</p>
                </div>
            </div>
            <div class="tab-products">
                <figure>
                    <img src="{{ asset('images/products/PPremiumGris.png') }}" alt="" class="img-product">
                </figure>
                <div class="tab-content">
                    <h3>PEGO PREMIUM GRIS GRUESO</h3>
                    <p>Adhesivo (Pego) a base de cemento Portland, arena sílice de  granulometría gruesa controlada y aditivos químicos para nivelar superficies irregulares con espesores desde 4 hasta 20 mm y pegar revestimientos cerámicos, piedras, lajas rústicos de alta y media absorción. Para uso en interiores y exteriores.</p>
                </div>
            </div>
            <div class="tab-products">
                <figure>
                    <img src="{{ asset('images/products/PSupremo.png') }}" alt="" class="img-product">
                </figure>
                <div class="tab-content">
                    <h3>PEGO SUPREMO BLANCO</h3>
                    <p>Adhesivo (Pego) de alto desempeño a base de cemento Blanco o Gris, arena sílice de granulometría controlada y aditivos químicos, con una excelente trabajabilidad y adherencia en aplicaciones de cerámica sobre cerámica, granito y madera. Para uso en interiores y exteriores gracias a que soporta cambios bruscos de temperatura.</p>
                </div>
            </div>
            <div class="tab-products">
                <figure>
                    <img src="{{ asset('images/products/SuperExtraPiscina.png') }}" alt="" class="img-product">
                </figure>
                <div class="tab-content">
                    <h3>SÚPER EXTRA PISCINA</h3>
                    <p>Adhesivo (Pego) de altas prestaciones base de cemento blanco y gris, arena sílice de granulometría controlada y aditivos químicos que mejoran la trabajabilidad y adherencia del producto en la instalación de todo tipo de baldosas cerámicas y gres de baja, media y alta absorción en contacto con humedad, contiene hidrófugo y antihongos. En presentación gris o blanco, para uso en interiores y exteriores.</p>
                </div>
            </div>
            <div class="tab-products">
                <figure>
                    <img src="{{ asset('images/products/Occireparador P.png') }}" alt="" class="img-product">
                </figure>
                <div class="tab-content">
                    <h3>OCCIREPARADOR</h3>
                    <p>Producto premezclado en polvo para reparación estructural, en base a cemento hidráulico, agregados seleccionados y aditivos especiales que le confieren alta resistencia, trabajabilidad y consistencia. Especialmente indicado para reparar y regularizar estructuras de concreto que presenten deterioro y otros múltiples usos en la industria de la construcción.</p>
                </div>
            </div>
            
        </article>
    </section>
    
    <section>
        <header>
            <h2 class="h2"><i class="fa-solid fa-quote-left quotes"></i>Proyectos<i class="fa-solid fa-quote-right quotes"></i></h2>
        </header>
        <section class="categories">
            <article class="category" style="background: url({{ asset('images/categories/pegamentos.png') }})">
                <div><p>HOLA</p></div>
            </article>
            <article class="category" style="background: url({{ asset('images/categories/sella_juntas.png') }})">
                <div><p>HOLA</p></div>
            </article>
            <article class="category" style="background: url({{ asset('images/categories/construccion.png') }})">
                <div><p>HOLA</p></div>
            </article>
        </section>
    </section>

    <section class="proyectos">

    </section>


</main>
@endsection