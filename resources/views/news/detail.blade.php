@extends('template')

@section('title', $metaData['title'])
@section('description', $metaData['description'])
@section('keywords', $metaData['keywords'])

@section('styles')
<style>
    .news-detail-header {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/banners/banner_pego.png') }}');
        background-size: cover;
        background-position: center;
        padding: 120px 0 60px;
        color: white;
        margin-bottom: 50px;
        border-bottom: 1px solid #eee;
    }
    .breadcrumb-news {
        display: flex;
        gap: 10px;
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }
    .breadcrumb-news a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }
    .breadcrumb-news a:hover {
        color: white;
    }
    .breadcrumb-news li::after {
        content: '/';
        margin-left: 10px;
        color: rgba(255, 255, 255, 0.4);
    }
    .breadcrumb-news li:last-child::after {
        content: '';
    }
    
    .news-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: white;
        line-height: 1.2;
        margin-bottom: 20px;
    }
    
    .news-meta {
        display: flex;
        gap: 20px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.95rem;
        flex-wrap: wrap;
    }
    .news-meta span {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .news-content-wrapper {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 50px;
        margin-bottom: 80px;
    }
    
    .news-featured-img {
        width: 100%;
        border-radius: 15px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .article-body {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #333;
    }
    .article-body p {
        margin-bottom: 25px;
    }
    .article-body h2, .article-body h3 {
        margin: 40px 0 20px;
        font-weight: 700;
        color: #111;
    }
    .article-body img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 20px 0;
        display: block;
    }
    
    .news-tags-section {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 1px solid #eee;
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    .tag-badge {
        background: #f0f0f0;
        padding: 6px 15px;
        border-radius: 20px;
        color: #555;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s;
    }
    .tag-badge:hover {
        background: var(--blue, #0056b3);
        color: white;
    }
    
    /* Share Buttons */
    .news-share-section {
        margin-top: 40px;
        padding: 25px;
        background: #f8f9fa;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
    }
    .news-share-text {
        font-weight: 600;
        color: #333;
        font-size: 1rem;
    }
    .news-share-buttons {
        display: flex;
        gap: 10px;
    }
    .share-btn {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        font-size: 1.1rem;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        color: white;
    }
    .share-facebook { background: #1877f2; }
    .share-x { background: #000000; }
    .share-whatsapp { background: #25d366; }
    .share-email { background: #ea4335; }
    
    /* Sidebar */
    .news-sidebar-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--blue, #0056b3);
        display: inline-block;
    }
    
    .sidebar-news-item {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        text-decoration: none;
        color: inherit;
    }
    .sidebar-news-img {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        object-fit: cover;
    }
    .sidebar-news-info h4 {
        font-size: 0.95rem;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 5px;
        transition: color 0.3s;
    }
    .sidebar-news-item:hover h4 {
        color: var(--blue, #0056b3);
    }
    .sidebar-news-info span {
        font-size: 0.8rem;
        color: #888;
    }
    
    .sidebar-card {
        background: #f9f9f9;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 40px;
    }
    
    .category-link {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        text-decoration: none;
        color: #444;
        transition: color 0.3s;
    }
    .category-link:hover {
        color: var(--blue, #0056b3);
    }
    
    /* Related News */
    .related-news-section {
        background: #f4f7f6;
        padding: 80px 0;
    }
    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }
    
    /* Related News Cards - Reusing styles from index */
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
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .news-card-img {
        position: relative;
        height: 180px;
        overflow: hidden;
    }
    .news-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .news-card-content {
        padding: 20px;
    }
    .news-card-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .news-card-title a {
        color: inherit;
        text-decoration: none;
    }
    .news-card-excerpt {
        color: #666;
        font-size: 0.85rem;
        line-height: 1.5;
    }
    
    @media (max-width: 992px) {
        .news-content-wrapper {
            grid-template-columns: 1fr;
        }
        .news-sidebar {
            order: 2;
        }
    }
    @media (max-width: 768px) {
        .news-title {
            font-size: 1.8rem;
        }
    }
</style>
@endsection

@section('content')
<main>
    @if (session('message'))
    @include('templates.message')
    @endif

    {{-- Header --}}
    <section class="news-detail-header">
        <div class="container">
            <ul class="breadcrumb-news">
                <li><a href="{{ route('index') }}">Inicio</a></li>
                <li><a href="{{ route('news.index') }}">Noticias</a></li>
                @if($news->category)
                <li><a href="{{ route('news.category', $news->category) }}">{{ $news->category->name }}</a></li>
                @endif
                <li><span>{{ Str::limit($news->title, 30) }}</span></li>
            </ul>
            
            <h1 class="news-title">{{ $news->title }}</h1>
            
            <div class="news-meta">
                <span><i class="fa-regular fa-calendar"></i> {{ $news->created_at ? $news->created_at->format('d M, Y') : 'Reciente' }}</span>
                @if($news->category)
                <span><i class="fa-regular fa-folder"></i> {{ $news->category->name }}</span>
                @endif
                <span><i class="fa-regular fa-user"></i> Editorial Productos Occidente</span>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="news-content-wrapper">
            {{-- Main Content --}}
            <article class="news-main-content">
                @if($news->image)
                <img src="{{ asset("images/news/{$news->image}") }}" alt="{{ $news->title }}" class="news-featured-img">
                @endif
                
                <div class="article-body">
                    <p class="lead" style="font-weight: 500; color: #555; margin-bottom: 30px;">
                        {{ $news->excerpt }}
                    </p>
                    
                    @include("news.content.{$news->content_file}")
                </div>
                
                <div class="news-tags-section">
                    <strong>Etiquetas:</strong>
                    @foreach($news->tags as $tag)
                    <a href="{{ route('news.tag', $tag) }}" class="tag-badge">#{{ $tag->name }}</a>
                    @endforeach
                </div>
                
                {{-- Social Share --}}
                <div class="news-share-section">
                    <span class="news-share-text">¿Te gustó esta noticia? Compártela:</span>
                    <div class="news-share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-btn share-facebook" title="Compartir en Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}" target="_blank" class="share-btn share-x" title="Compartir en X">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . url()->current()) }}" target="_blank" class="share-btn share-whatsapp" title="Compartir en WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="mailto:?subject={{ urlencode($news->title) }}&body={{ urlencode($news->excerpt . '\n\n' . url()->current()) }}" class="share-btn share-email" title="Compartir por Email">
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </article>
            
            {{-- Sidebar --}}
            <aside class="news-sidebar">
                {{-- Recent News --}}
                <div class="sidebar-card">
                    <h3 class="news-sidebar-title">Más Recientes</h3>
                    @foreach($recentNews as $recent)
                    <a href="{{ route('news.show', $recent) }}" class="sidebar-news-item">
                        <img src="{{ asset($recent->image ? "images/news/{$recent->image}" : "images/news-placeholder.jpg") }}" alt="{{ $recent->title }}" class="sidebar-news-img">
                        <div class="sidebar-news-info">
                            <h4>{{ Str::limit($recent->title, 50) }}</h4>
                            <span>{{ $recent->created_at ? $recent->created_at->format('d M, Y') : 'Reciente' }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
                
                {{-- Categories --}}
                <div class="sidebar-card">
                    <h3 class="news-sidebar-title">Categorías</h3>
                    @foreach(\App\Models\NewsCategory::withCount('news')->get() as $cat)
                    <a href="{{ route('news.category', $cat) }}" class="category-link">
                        <span>{{ $cat->name }}</span>
                        <span class="badge bg-white text-dark border">{{ $cat->news_count }}</span>
                    </a>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>

    {{-- Related News --}}
    @if($relatedNews->count() > 0)
    <section class="related-news-section">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Noticias Relacionadas</h2>
            <div class="related-grid">
                @foreach($relatedNews as $related)
                <article class="news-card">
                    <div class="news-card-img" style="height: 200px;">
                        <a href="{{ route('news.show', $related) }}">
                            <img src="{{ asset($related->image ? "images/news/{$related->image}" : "images/news-placeholder.jpg") }}" alt="{{ $related->title }}">
                        </a>
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title" style="font-size: 1.1rem;">
                            <a href="{{ route('news.show', $related) }}">{{ $related->title }}</a>
                        </h3>
                        <p class="news-card-excerpt" style="font-size: 0.85rem;">
                            {{ Str::limit($related->excerpt, 100) }}
                        </p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @include('page.partials.display_whatsapp')
</main>

@include('templates.footer')
<script src="{{ asset('js/display_whatsapp.js') }}"></script>
@endsection
