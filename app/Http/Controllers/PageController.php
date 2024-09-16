<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductRating;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $categories = Category::all();

        $cart = new CartController();
        return view('page.index', [
            'products' => Product::take(5)->get(),
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function products_view() {
        $categories = Category::all();

        $cart = new CartController();
        return view('page.products', [
            'products' => Product::all(),
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function product_detail($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $cart = new CartController();

        if (!$product) {
            return redirect()->route('error.page');
        }

        $ratings = $product->ratings()->pluck('rating')->toArray(); // Obtener todas las calificaciones del producto

        $averageRating = count($ratings) > 0 ? array_sum($ratings) / count($ratings) : 0; // Calcular el promedio

        return view('page.product_detail', [
            'product' => $product,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'averageRating' => $averageRating,
            'product_rating' => ProductRating::all(),
        ]);
    }

    public function products_by_category($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        $cart = new CartController();

        $metaData = array();
        $metaData['title'] = "Categoria $category->name | Productos Occidente, C.A.";

        if ($id == 1) {
            $metaData['description'] = 'Descubra la Línea de Pegamentos de Productos Occidente, que incluye opciones básicas, profesionales y flexibles para todas sus necesidades de construcción en Venezuela.';
            $metaData['keywords'] = 'pegamento para cerámica, pegamento para porcelanato, pego flexible, impermeabilizantes, revestimientos';
            $metaData['og_description'] = 'Descubra la Línea de Pegamentos de Productos Occidente, que incluye opciones básicas, profesionales y flexibles para todas sus necesidades de construcción en Venezuela.';
        }elseif ($id == 2) {
            $metaData['description'] = 'Explore la Línea de Construcción de Productos Occidente, que incluye revestimientos, pegamentos y soluciones estructurales de alta calidad para sus proyectos en Venezuela.';
            $metaData['keywords'] = 'productos de construcción, soluciones estructurales, revestimientos impermeables';
            $metaData['og_description'] = 'Explore la Línea de Construcción de Productos Occidente, que incluye revestimientos, pegamentos y soluciones estructurales de alta calidad para sus proyectos en Venezuela.';
        }else{
            $metaData['description'] = 'Descubra los productos de sella juntas de Productos Occidente, diseñados para ofrecer sellado y durabilidad en aplicaciones de construcción en Venezuela.';
            $metaData['keywords'] = 'sellador de juntas, impermeabilización de juntas, sellado flexible, selladores para construcción, productos de sellado';
            $metaData['og_description'] = 'Descubra los productos de sella juntas de Productos Occidente, diseñados para ofrecer sellado y durabilidad en aplicaciones de construcción en Venezuela.';
        }
        return view('page.products_by_category', [
            'category' => $category,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
        ]);
    }

    public function products_by_subcategory($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        $cart = new CartController();

        $metaData = array();
        $metaData['title'] = "Categoria $subcategory->name | Productos Occidente, C.A.";

        if ($id == 1) {
            $metaData['description'] = 'Pegamentos básicos de alta calidad de Productos Occidente, ideales para aplicaciones de construcción generales en Venezuela.';
            $metaData['keywords'] = 'pegamento básico para construcción, pegamentos de uso general, pegamento blanco para baldosas, soluciones básicas para revestimientos, productos de construcción esenciales';
            $metaData['og_description'] = 'Pegamentos básicos de alta calidad de Productos Occidente, ideales para aplicaciones de construcción generales en Venezuela.';
        }elseif ($id == 2) {
            $metaData['description'] = 'Pegamentos profesionales de Productos Occidente, diseñados para aplicaciones de construcción exigentes en Venezuela.';
            $metaData['keywords'] = 'pegamento profesional, pegamento blanco para cerámica, productos de construcción';
            $metaData['og_description'] = 'Pegamentos profesionales de Productos Occidente, diseñados para aplicaciones de construcción exigentes en Venezuela.';
        }elseif ($id == 3) {
            $metaData['description'] = 'Pegamentos flexibles de Productos Occidente, perfectos para aplicaciones que requieren adaptabilidad y durabilidad en la construcción en Venezuela.';
            $metaData['keywords'] = 'pego flexible para construcción, pegamento elástico para baldosas, soluciones adaptables para revestimientos';
            $metaData['og_description'] = 'Pegamentos flexibles de Productos Occidente, perfectos para aplicaciones que requieren adaptabilidad y durabilidad en la construcción en Venezuela.';
        }elseif ($id == 4) {
            $metaData['description'] = 'Revestimientos de alta calidad de Productos Occidente, ideales para proteger y embellecer superficies en proyectos de construcción en Venezuela.';
            $metaData['keywords'] = 'revestimientos para exteriores e interiores, pego para superficies decorativas, productos para embellecimiento de paredes, soluciones para revestir baldosas';
            $metaData['og_description'] = 'Revestimientos de alta calidad de Productos Occidente, ideales para proteger y embellecer superficies en proyectos de construcción en Venezuela.';
        }elseif ($id == 5) {
            $metaData['description'] = 'Pegamentos especializados de Productos Occidente, diseñados para aplicaciones de construcción de alta resistencia en Venezuela.';
            $metaData['keywords'] = 'pegamento para baldosas y porcelanato, pego para cerámica, soluciones de pegamento de alta resistencia, morteros para construcción';
            $metaData['og_description'] = 'Pegamentos especializados de Productos Occidente, diseñados para aplicaciones de construcción de alta resistencia en Venezuela.';
        }elseif ($id == 6) {
            $metaData['description'] = 'Soluciones estructurales de Productos Occidente, ofreciendo durabilidad y resistencia para sus proyectos de construcción en Venezuela.';
            $metaData['keywords'] = 'pegamentos estructurales para construcción, soluciones de alta resistencia para estructuras, mortero estructural, pegamento para aplicaciones estructurales';
            $metaData['og_description'] = 'Soluciones estructurales de Productos Occidente, ofreciendo durabilidad y resistencia para sus proyectos de construcción en Venezuela.';
        }elseif ($id == 7) {
            $metaData['description'] = 'Soluciones estructurales de Productos Occidente, ofreciendo durabilidad y resistencia para sus proyectos de construcción en Venezuela.';
            $metaData['keywords'] = 'Soluciones estructurales, Productos Occidente, productos de construcción, pego, contruccion, morteros';
            $metaData['og_description'] = 'sellador de juntas para construcción, pego para impermeabilización de juntas, sellado para baldosas y cerámica, pego';
        }

        return view('page.products_by_subcategory', [
            'subcategory' => $subcategory,
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function about() {
        $categories = Category::all();

        $metaData = [
            'title' => 'Sobre Nosotros | Productos Occidente',
            'description' => 'Productos Occidente se dedica a la fabricación de productos de construcción en Venezuela. Conozca nuestra historia, misión y compromiso con la calidad.',
            'keywords' => 'productos de construcción, revestimiento, impermeabilizante, pegamento para cerámica.',
            'og_description' => 'Productos Occidente se dedica a la fabricación de productos de construcción en Venezuela. Conozca nuestra historia, misión y compromiso con la calidad.',
            'og_title' => 'Sobre Nosotros | Productos Occidente'
        ];

        $cart = new CartController();
        return view('page.about', [
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
        ]);
    }

    public function project() {
        $categories = Category::all();

        $metaData = [
            'title' => 'Proyectos | Productos Occidente, C.A.',
            'description' => 'Descubra los proyectos destacados de Productos Occidente y cómo nuestros productos de construcción han contribuido al éxito de diversas obras en Venezuela.',
            'keywords' => 'pegoccidente, piscina, jacuzzi, exteriores, grafiado, encaminado paredes, impermeabilizante',
            'og_description' => 'Descubra los proyectos destacados de Productos Occidente y cómo nuestros productos de construcción han contribuido al éxito de diversas obras en Venezuela.',
            'og_title' => 'Proyectos | Productos Occidente, C.A.'
        ];

        $cart = new CartController();
        return view('page.project', [
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData
        ]);
    }

    public function contact() {
        $categories = Category::all();

        $metaData = [
            'title' => 'Contact | Productos Occidente, C.A.',
            'description' => 'Póngase en contacto con Productos Occidente para más información sobre nuestros productos de construcción. Ubicados en Venezuela, estamos aquí para ayudarle.',
            'keywords' => 'Productos Occidente, pegamento para cerámica, impermeabilizante, productos construcción.',
            'og_description' => 'Póngase en contacto con Productos Occidente para más información sobre nuestros productos de construcción. Ubicados en Venezuela, estamos aquí para ayudarle.',
            'og_title' => 'Contact | Productos Occidente, C.A.'
        ];

        $cart = new CartController();
        return view('page.contact', [
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $metaData = [
            'title' => 'Buscador | Productos Occidente, C.A.',
            'description' => 'Utilice el buscador de PegOccidente para encontrar rápidamente productos de construcción de alta calidad en Venezuela, incluyendo pegamentos, revestimientos y sella juntas.',
            'keywords' => 'Buscador, buscar productos, productos de construcción, pegamentos, revestimientos, sella juntas, PegOccidente, Venezuela, Barquisimeto',
            'og_description' => 'Utilice el buscador de PegOccidente para encontrar rápidamente productos de construcción de alta calidad en Venezuela, incluyendo pegamentos, revestimientos y sella juntas.',
            'og_title' => 'Buscador | Productos Occidente, C.A.'
        ];

        $categories = Category::all();
        $products = Product::where('name', 'LIKE', "%{$search}%")->paginate();
        $cart = new CartController();

        return view('page.search', [
            'search' => $search,
            'products' => $products,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
        ]);
    }
}
