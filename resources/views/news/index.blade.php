@extends('template')

@section('title', $metaData['title'])
@section('description', $metaData['description'])
@section('keywords', $metaData['keywords'])

@section('styles')
<style>
    .news-header {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/banners/banner_pego.png') }}');
        background-size: cover;
        background-position: center;
        padding: 100px 0 60px;
        text-align: center;
        color: white;
        margin-bottom: 40px;
    }
    .news-header h1 {
        font-size: 3rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }
    .news-header p {
        font-size: 1.2rem;
        opacity: 0.9;
    }
    
    .news-categories-nav {
        background: white;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
        margin-bottom: 40px;
    }
    .news-categories-list {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 20px;
        flex-wrap: wrap;
    }
    .news-categories-list a {
        color: #555;
        text-decoration: none;
        font-weight: 500;
        padding: 8px 16px;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    .news-categories-list a:hover, .news-categories-list a.active {
        background: var(--blue, #0056b3);
        color: white;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }
    
    .news-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        border: 1px solid #f0f0f0;
    }
    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }
    
    .news-card-img {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    .news-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
        display: block;
    }
    .news-card:hover .news-card-img img {
        transform: scale(1.1);
    }
    
    .news-card-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--blue, #0056b3);
        color: white;
        padding: 4px 12px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .news-card-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .news-card-date {
        font-size: 0.8rem;
        color: #888;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .news-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 15px;
        color: #222;
    }
    .news-card-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s;
    }
    .news-card-title a:hover {
        color: var(--blue, #0056b3);
    }
    
    .news-card-excerpt {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .news-card-footer {
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .btn-read-more {
        color: var(--blue, #0056b3);
        font-weight: 600;
        text-decoration: none;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: gap 0.3s;
    }
    .btn-read-more:hover {
        gap: 10px;
    }
    
    .news-tags {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    .news-tag {
        font-size: 0.7rem;
        color: #999;
        background: #f5f5f5;
        padding: 2px 8px;
        border-radius: 4px;
        text-decoration: none;
    }
    .news-tag:hover {
        background: #eee;
        color: #666;
    }

    /* Paginación personalizada */
    .pagination {
        margin-top: 50px;
        justify-content: center;
    }
    .page-link {
        border-radius: 50% !important;
        margin: 0 5px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #555;
        border: 1px solid #ddd;
    }
    .page-item.active .page-link {
        background-color: var(--blue, #0056b3);
        border-color: var(--blue, #0056b3);
    }

    @media (max-width: 576px) {
        .news-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .news-card {
            border-radius: 8px;
        }
        .news-card-img {
            height: 100px;
        }
        .news-card-content {
            padding: 10px;
        }
        .news-card-title {
            font-size: 0.85rem;
            margin-bottom: 5px;
            line-height: 1.3;
        }
        .news-card-excerpt {
            display: none; /* Ocultamos el extracto en móvil para ganar espacio */
        }
        .news-card-date {
            font-size: 0.65rem;
            margin-bottom: 5px;
        }
        .news-card-footer {
            padding-top: 5px;
            margin-top: 5px;
        }
        .btn-read-more {
            font-size: 0.75rem;
        }
        .news-tags {
            display: none; /* Ocultamos etiquetas en móvil en la lista principal */
        }
        .news-card-category {
            font-size: 0.55rem;
            padding: 2px 6px;
            top: 8px;
            left: 8px;
        }
    }

    @media (max-width: 768px) {
        .news-header h1 {
            font-size: 2rem;
        }
        .news-categories-list {
            gap: 10px;
        }
        .news-categories-list a {
            padding: 6px 12px;
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('content')
<main>
    @if (session('message'))
    @include('templates.message')
    @endif

    {{-- Hero Section --}}
    <section class="news-header">
        <div class="container">
            <h1>
                @if(isset($currentCategory))
                    {{ $currentCategory->name }}
                @elseif(isset($currentTag))
                    Etiqueta: {{ $currentTag->name }}
                @else
                    Noticias y Actualidad
                @endif
            </h1>
            <p>Descubre las últimas novedades de Productos Occidente, eventos y más.</p>
        </div>
    </section>

    {{-- Navegación de Categorías --}}
    <nav class="news-categories-nav">
        <div class="container">
            <ul class="news-categories-list">
                <li>
                    <a href="{{ route('news.index') }}" class="{{ !isset($currentCategory) && !isset($currentTag) ? 'active' : '' }}">Todas</a>
                </li>
                @foreach ($newsCategories as $cat)
                <li>
                    <a href="{{ route('news.category', $cat) }}" class="{{ isset($currentCategory) && $currentCategory->id == $cat->id ? 'active' : '' }}">
                        {{ $cat->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>

    <section class="container mb-5">
        @if($news->count() > 0)
            <div class="news-grid">
                @foreach ($news as $item)
                <article class="news-card">
                    <div class="news-card-img">
                        @if($item->category)
                        <span class="news-card-category">{{ $item->category->name }}</span>
                        @endif
                        
                        <a href="{{ route('news.show', $item) }}">
                            @if($item->image)
                            <img src="{{ asset("images/news/{$item->image}") }}" alt="{{ $item->title }}">
                            @else
                            <img src="{{ asset('images/news-placeholder.jpg') }}" alt="{{ $item->title }}">
                            @endif
                        </a>
                    </div>
                    
                    <div class="news-card-content">
                        <div class="news-card-date">
                            <i class="fa-regular fa-calendar"></i>
                            {{ $item->created_at ? $item->created_at->format('d M, Y') : 'Reciente' }}
                        </div>
                        
                        <h2 class="news-card-title">
                            <a href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
                        </h2>
                        
                        <p class="news-card-excerpt">
                            {{ $item->excerpt }}
                        </p>
                        
                        <div class="news-card-footer">
                            <a href="{{ route('news.show', $item) }}" class="btn-read-more">
                                Leer más <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            
                            <div class="news-tags">
                                @foreach($item->tags->take(2) as $tag)
                                <a href="{{ route('news.tag', $tag) }}" class="news-tag">#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- Paginación --}}
            <div class="d-flex justify-content-center">
                {{ $news->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fa-regular fa-newspaper fa-4x mb-4 text-muted"></i>
                <h3>No se encontraron noticias</h3>
                <p>Pronto publicaremos nuevo contenido para ti.</p>
                <a href="{{ route('news.index') }}" class="btn btn-primary mt-3">Ver todas las noticias</a>
            </div>
        @endif
    </section>

    @include('page.partials.display_whatsapp')
</main>

@include('templates.footer')
<script src="{{ asset('js/display_whatsapp.js') }}"></script>
@endsection
