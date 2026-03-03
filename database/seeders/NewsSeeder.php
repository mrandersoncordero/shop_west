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
        // Categorías
        $categoriaDeportes = NewsCategory::firstOrCreate(
            ['slug' => 'deportes'],
            ['name' => 'Deportes', 'description' => 'Noticias sobre patrocinios y apoyo al deporte nacional']
        );

        $categoriaEmpresa = NewsCategory::firstOrCreate(
            ['slug' => 'empresa'],
            ['name' => 'Empresa', 'description' => 'Noticias sobre la empresa y su crecimiento']
        );

        $categoriaEventos = NewsCategory::firstOrCreate(
            ['slug' => 'eventos'],
            ['name' => 'Eventos', 'description' => 'Eventos y ferias donde participamos']
        );

        // Etiquetas
        $tagFutbol = NewsTag::firstOrCreate(['slug' => 'futbol'], ['name' => 'Fútbol']);
        $tagBeisbol = NewsTag::firstOrCreate(['slug' => 'beisbol'], ['name' => 'Béisbol']);
        $tagSponsor = NewsTag::firstOrCreate(['slug' => 'sponsor'], ['name' => 'Sponsor']);
        $tagPadel = NewsTag::firstOrCreate(['slug' => 'padel'], ['name' => 'Pádel']);
        $tagTrujillo = NewsTag::firstOrCreate(['slug' => 'trujillo'], ['name' => 'Trujillo']);

        // Noticias - Selecciones Lara (futbol)
        $noticia1 = News::firstOrCreate(
            ['slug' => 'productos-occidente-patinador-seleccion-lara'],
            [
                'category_id' => $categoriaDeportes->id,
                'title' => 'Productos Occidente patrocinador oficial del Selecciones Lara',
                'excerpt' => 'Nos complace anunciar que seremos patrocinadores oficiales del equipo de fútbol selecciones Lara, apoyando el talento local.',
                'content_file' => 'noticia-seleccion-lara',
                'image' => 'valla_lara.webp',
                'seo_title' => 'Productos Occidente patrocinador oficial del Selecciones Lara | Productos Occidente',
                'seo_description' => 'Conoce cómo Productos Occidente apoya al deporte nacional siendo patrocinadores oficiales del Selecciones Lara.',
                'is_published' => true,
            ]
        );
        $noticia1->tags()->sync([$tagFutbol->id, $tagSponsor->id]);

        // Noticias - Béisbol
        $noticia2 = News::firstOrCreate(
            ['slug' => 'alianza-estrategica-leyendas-beisbol-venezolano'],
            [
                'category_id' => $categoriaDeportes->id,
                'title' => 'Alianza estratégica con las leyendas del béisbol venezolano',
                'excerpt' => 'Firmamos un acuerdo histórico con las leyendas del béisbol venezolano para promover el deporte en las nuevas generaciones.',
                'content_file' => 'noticia-beisbol',
                'image' => 'noticia-beisbol.webp',
                'seo_title' => 'Alianza estratégica con las leyendas del béisbol | Productos Occidente',
                'seo_description' => 'Productos Occidente se une a las leyendas del béisbol venezolano para impulsar el deporte nacional.',
                'is_published' => true,
            ]
        );
        $noticia2->tags()->sync([$tagBeisbol->id, $tagSponsor->id]);

        // Noticias - Padel
        $noticia3 = News::firstOrCreate(
            ['slug' => 'productos-occidente-patrocinador-circuito-padel'],
            [
                'category_id' => $categoriaDeportes->id,
                'title' => 'Productos Occidente nuevo patrocinador del Circuito de Pádel',
                'excerpt' => 'Nos convertimos en patrocinadores oficiales del Circuito de Pádel, apoyando este deporte en crecimiento en Venezuela.',
                'content_file' => 'noticia-padel',
                'image' => 'padel_occidente.webp',
                'seo_title' => 'Productos Occidente patrocinador del Circuito de Pádel | Productos Occidente',
                'seo_description' => 'Conoce cómo Productos Occidente apoya al pádel venezolano siendo patrocinadores del circuito nacional.',
                'is_published' => true,
            ]
        );
        $noticia3->tags()->sync([$tagPadel->id, $tagSponsor->id]);

        // Noticias - Trujillanos de Trujillo
        $noticia4 = News::firstOrCreate(
            ['slug' => 'productos-occidente-apoya-trujillanos'],
            [
                'category_id' => $categoriaDeportes->id,
                'title' => 'Productos Occidente firme apoyo al equipo Trujillanos de Trujillo',
                'excerpt' => 'Continuamos nuestro compromiso con el deporte regional patrocinando al equipo Trujillanos de Trujillo.',
                'content_file' => 'noticia-trujillanos',
                'image' => 'trujillanos.webp',
                'seo_title' => 'Productos Occidente apoya a Trujillanos de Trujillo | Productos Occidente',
                'seo_description' => 'Productos Occidente renueva su patrocinio al equipo Trujillanos de Trujillo.',
                'is_published' => true,
            ]
        );
        $noticia4->tags()->sync([$tagFutbol->id, $tagTrujillo->id, $tagSponsor->id]);
    }
}
