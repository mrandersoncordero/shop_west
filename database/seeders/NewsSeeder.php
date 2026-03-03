<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Categorías (verificar si ya existen)
        $categoriaDeportes = NewsCategory::firstOrCreate(
            ['slug' => 'deportes'],
            ['name' => 'Deportes', 'description' => 'Noticias sobre patrocinios y apoyo al deporte nacional']
        );

        $categoriaEmpresa = NewsCategory::firstOrCreate(
            ['slug' => 'empresa'],
            ['name' => 'Empresa', 'description' => 'Noticias sobre la empresa y su crecimiento']
        );

        $categoriaProductos = NewsCategory::firstOrCreate(
            ['slug' => 'productos'],
            ['name' => 'Productos', 'description' => 'Nuevos productos y lanzamientos']
        );

        $categoriaEventos = NewsCategory::firstOrCreate(
            ['slug' => 'eventos'],
            ['name' => 'Eventos', 'description' => 'Eventos y ferias donde participamos']
        );

        // Etiquetas
        $tagFutbol = NewsTag::firstOrCreate(['slug' => 'futbol'], ['name' => 'Fútbol']);
        $tagBeisbol = NewsTag::firstOrCreate(['slug' => 'beisbol'], ['name' => 'Béisbol']);
        $tagBaloncesto = NewsTag::firstOrCreate(['slug' => 'baloncesto'], ['name' => 'Baloncesto']);
        $tagSponsor = NewsTag::firstOrCreate(['slug' => 'sponsor'], ['name' => 'Sponsor']);
        $tagNuevo = NewsTag::firstOrCreate(['slug' => 'nuevo'], ['name' => 'Nuevo']);
        $tagLanzamiento = NewsTag::firstOrCreate(['slug' => 'lanzamiento'], ['name' => 'Lanzamiento']);

        // Noticias
        $noticia1 = News::create([
            'category_id' => $categoriaDeportes->id,
            'title' => 'Productos Occidente patrocinador oficial del seleksi Lara',
            'slug' => 'productos-occidente-patinador-seleccion-lara',
            'excerpt' => 'Nos complace anunciar que seremos patrocinadores oficiales del equipo de fútbol selecciones Lara, apoyando el talento local.',
            'content_file' => 'noticia-1',
            'image' => 'noticia-seleccion-lara.jpg',
            'seo_title' => 'Productos Occidente patrocinador oficial del Selecciones Lara | Productos Occidente',
            'seo_description' => 'Conoce cómo Productos Occidente apoya al deporte nacional siendo patrocinadores oficiales del Selecciones Lara.',
            'is_published' => true,
        ]);
        $noticia1->tags()->attach([$tagFutbol->id, $tagSponsor->id]);

        $noticia2 = News::create([
            'category_id' => $categoriaDeportes->id,
            'title' => 'Alianza estratégica con las leyendas del béisbol venezolano',
            'slug' => 'alianza-estrategica-leyendas-beisbol-venezolano',
            'excerpt' => 'Firmamos un acuerdo histórico con las leyendas del béisbol venezolano para promover el deporte en las nuevas generaciones.',
            'content_file' => 'noticia-2',
            'image' => 'noticia-beisbol.jpg',
            'seo_title' => 'Alianza estratégica con las leyendas del béisbol | Productos Occidente',
            'seo_description' => 'Productos Occidente se une a las leyendas del béisbol venezolano para impulsar el deporte nacional.',
            'is_published' => true,
        ]);
        $noticia2->tags()->attach([$tagBeisbol->id, $tagSponsor->id]);

        $noticia3 = News::create([
            'category_id' => $categoriaEventos->id,
            'title' => 'Productos Occidente presente en Expo Construcción 2026',
            'slug' => 'productos-occidente-expo-construccion-2026',
            'excerpt' => 'Te esperamos en nuestro stand durante Expo Construcción 2026, donde presentaremos nuestras últimas innovaciones.',
            'content_file' => 'noticia-3',
            'image' => 'noticia-expo.jpg',
            'seo_title' => 'Productos Occidente en Expo Construcción 2026',
            'seo_description' => 'Visítanos en Expo Construcción 2026 y conoce todas nuestras soluciones para tus proyectos de construcción.',
            'is_published' => true,
        ]);
        $noticia3->tags()->attach([$tagNuevo->id]);

        $noticia4 = News::create([
            'category_id' => $categoriaProductos->id,
            'title' => 'Nuevo producto: Pego Flex Pro',
            'slug' => 'nuevo-producto-pego-flex-pro',
            'excerpt' => 'Presentamos nuestro más reciente lanzamiento: Pego Flex Pro, el adhesivo más resistente del mercado.',
            'content_file' => 'noticia-4',
            'image' => 'noticia-pego-flex-pro.jpg',
            'seo_title' => 'Nuevo Pego Flex Pro | Productos Occidente',
            'seo_description' => 'Descubre Pego Flex Pro, el nuevo adhesivo de alta tecnología de Productos Occidente.',
            'is_published' => true,
        ]);
        $noticia4->tags()->attach([$tagNuevo->id, $tagLanzamiento->id]);
    }
}
