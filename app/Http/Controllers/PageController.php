<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $metaData = [
            'title' => 'Productos Occidente, C.A. | Materiales de construcción en Venezuela',
            'description' => 'Fabricamos pegamentos, morteros y revestimientos de alta calidad para tus proyectos de construcción en Venezuela.',
            'keywords' => 'pegoccidente, pegamento para cerámica, impermeabilizante, porcelanato, exteriores, pego extra fuerte, Venezuela',
        ];

        $cart = new CartController();

        return view('page.index', [
            'products' => Product::take(5)->get(),
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
        ]);
    }

    public function products_view()
    {
        $categories = Category::all();
        $cart = new CartController();

        $metaData = [
            'title' => 'Productos | Productos Occidente, C.A.',
            'description' => 'Descubra la línea completa de productos Occidente: pegamentos, morteros y revestimientos para todas sus necesidades de construcción en Venezuela.',
            'keywords' => 'Pego Standard Gris, Pego Extra Blanco, Premium Gris, Pego Premium Gris Grueso, Súper Extra Piscina, Pego Supremo Blanco, Occifriso, Occiteja, Occiconcreto, Occiconcreto Reforzado, pegamentos, morteros',
        ];

        return view('page.products', [
            'products' => Product::all(),
            'metaData' => $metaData,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
        ]);
    }

    public function product_detail(Product $product)
    {
        $categories = Category::all();
        $cart = new CartController();

        $metaData = [
            'title' => $product->name.' | Productos Occidente, C.A.',
            'description' => $product->description,
            'keywords' => $product->name.', '.$product->subcategory->name.', '.$product->subcategory->category->name.', productos de construcción, Venezuela',
        ];

        $ratings = $product->ratings()->pluck('rating')->toArray();
        $averageRating = count($ratings) > 0 ? array_sum($ratings) / count($ratings) : 0;

        return view('page.product_detail', [
            'product' => $product,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'averageRating' => $averageRating,
            'product_rating' => ProductRating::all(),
            'metaData' => $metaData,
        ]);
    }

    public function products_by_category(Category $category)
    {
        $categories = Category::all();
        $cart = new CartController();

        $metaData = [
            'title' => 'Línea de '.$category->name.' | Productos Occidente, C.A.',
            'description' => $category->description,
            'keywords' => $category->name.', productos de construcción, Venezuela, pegamentos, morteros, revestimientos',
        ];

        return view('page.products_by_category', [
            'category' => $category,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
        ]);
    }

    public function products_by_subcategory(Subcategory $subcategory)
    {
        $categories = Category::all();
        $cart = new CartController();

        $metaData = [
            'title' => $subcategory->name.' | Productos Occidente, C.A.',
            'description' => $subcategory->description,
            'keywords' => $subcategory->name.', '.$subcategory->category->name.', productos de construcción, Venezuela',
        ];

        return view('page.products_by_subcategory', [
            'subcategory' => $subcategory,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
        ]);
    }

    public function about()
    {
        $categories = Category::all();
        $cart = new CartController();

        $metaData = [
            'title' => 'Nosotros | Productos Occidente, C.A.',
            'description' => 'Productos Occidente se dedica a la fabricación de productos de construcción en Venezuela. Conozca nuestra historia, misión y compromiso con la calidad.',
            'keywords' => 'productos de construcción, revestimiento, impermeabilizante, pegamento para cerámica.',
        ];

        return view('page.about', [
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
        ]);
    }

    public function project()
    {
        $categories = Category::all();
        $cart = new CartController();

        $metaData = [
            'title' => 'Proyectos | Productos Occidente, C.A.',
            'description' => 'Descubra los proyectos destacados de Productos Occidente y cómo nuestros productos de construcción han contribuido al éxito de diversas obras en Venezuela.',
            'keywords' => 'pegoccidente, piscina, jacuzzi, exteriores, grafiado, encaminado paredes, impermeabilizante',
        ];

        // Cargamos los productos usados en proyectos para evitar IDs hardcodeados en la vista
        $projectProducts = Product::whereIn('slug', [
            'super-extra-porcelanato',
            'imperplus',
            'stuco',
            'occiconcreto',
            'occiconcreto-reforzado',
            'pego-supremo',
        ])->get()->keyBy('slug');

        return view('page.project', [
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
            'projectProducts' => $projectProducts,
        ]);
    }

    public function contact()
    {
        $categories = Category::all();
        $cart = new CartController();

        $metaData = [
            'title' => 'Contacto | Productos Occidente, C.A.',
            'description' => 'Póngase en contacto con Productos Occidente para más información sobre nuestros productos de construcción. Ubicados en Venezuela, estamos aquí para ayudarle.',
            'keywords' => 'Productos Occidente, pegamento para cerámica, impermeabilizante, productos construcción.',
        ];

        return view('page.contact', [
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $categories = Category::all();
        $products = Product::where('name', 'LIKE', "%{$search}%")->paginate();
        $cart = new CartController();

        $metaData = [
            'title' => 'Búsqueda: '.$search.' | Productos Occidente, C.A.',
            'description' => 'Resultados de búsqueda para "'.$search.'" en el catálogo de Productos Occidente.',
            'keywords' => $search.', productos de construcción, pegamentos, revestimientos, Venezuela',
        ];

        return view('page.search', [
            'search' => $search,
            'products' => $products,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'metaData' => $metaData,
        ]);
    }
}
