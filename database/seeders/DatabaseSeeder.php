<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        /**
         * Categories
         */
        Category::create([
            'name' => 'Pegamentos',
            'description' => 'Descripcion de pegamentos'
        ]);
        Category::create([
            'name' => 'Construccion',
            'description' => 'Descripcion de construccion'
        ]);
        Category::create([
            'name' => 'Sella Juntas',
            'description' => 'Descripcion de sella juntas'
        ]);

        /**
         * Subcategories
         */
        Subcategory::create([
            'name' => 'Basicos',
            'category_id' => 1,
            'description' => 'Descripcion de subcategoria basicos'
        ]);
        Subcategory::create([
            'name' => 'Profesional',
            'category_id' => 1,
            'description' => 'Descripcion de subcategoria profesional'
        ]);
        Subcategory::create([
            'name' => 'Flexible',
            'category_id' => 1,
            'description' => 'Descripcion de subcategoria Flexible'
        ]);
        Subcategory::create([
            'name' => 'Revestimiento',
            'category_id' => 2,
            'description' => 'Descripcion de subcategoria revestimiento'
        ]);
        Subcategory::create([
            'name' => 'Pegamentos',
            'category_id' => 2,
            'description' => 'Descripcion de subcategoria Pegamentos'
        ]);
        Subcategory::create([
            'name' => 'Estructural',
            'category_id' => 2,
            'description' => 'Descripcion de subcategoria Estructural'
        ]);
        Subcategory::create([
            'name' => 'Sella juntas',
            'category_id' => 3,
            'description' => 'Descripcion de subcategoria Sella juntas'
        ]);
        
        /**
         * Products
         */
        Product::create([
            'subcategory_id' => 1,
            'code' => 'PB123',
            'name' => 'Imperplus',
            'description' => 'Mortero en polvo a base de cemento gris,  minerales y aditivos químicos especiales para proteger, impermeabilizar y eliminar humedad,  alta propiedad hidrófuga, con alta resistencia a la  presión de agua, sin afectar la potabilidad.',
            'weight' => 10,
            'format' => '',
            'yield' => '(m2)4-10',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 150,
            'price' => 10,
            'image' => 'Imperplus.png',
            'url_sheet' => 'https://drive.google.com/file/d/1IqQjX1sfDlFnTsdTcTcShqjkhw8jZdr9/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 7,
            'code' => 'LDCES123',
            'name' => "D’ COLOR MARMOLINA",
            'description' => 'Mortero en polvo a base de cemento blanco o gris,  marmolina y arena sílice seleccionada y aditivos  químicos aplicado para el relleno de juntas  anchas de baldosas, cerámicas y toda la gama de  revestimientos rústicos.',
            'weight' => 20,
            'format' => '',
            'yield' => '',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'DColorMarmolina.png',
            'url_sheet' => 'https://drive.google.com/file/d/1qJTs54ojR50Y4w1W_uxe6pBIFYrOGrvR/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 2,
            'code' => 'LDPPR123',
            'name' => "PEGO PREMIUM GRIS GRUESO",
            'description' => 'Adhesivo a base de cemento Portland, arena sílice de granulometría gruesa controlada y aditivos  químicos para nivelar superficies irregulares con espesores desde 4 hasta 20 mm y pegar  revestimientos cerámicos, piedras.',
            'weight' => 20,
            'format' => '50 X 50',
            'yield' => 'Acorde al espesor',
            'traffic' => 'Medio',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'PPremiumGris.png',
            'url_sheet' => 'https://drive.google.com/file/d/1uXZEEz3xGnJY0NkSCAY2qiFGcEEE4xP5/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 4,
            'code' => 'LDCRE123',
            'name' => "Occireparador",
            'description' => 'Mortero en polvo a base de cemento, arenas seleccionadas y aditivos químicos, para la restitución y/o sustitución de concreto dañado y protección de la armadura.',
            'weight' => 20,
            'format' => '',
            'yield' => '(m2)1',
            'traffic' => 'Medio',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'OccireparadorP.png',
            'url_sheet' => 'https://drive.google.com/file/d/1ZVQB9rZhMllFVw-GX6X8rnmE3swwUcFq/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 3,
            'code' => 'LDPFL123',
            'name' => "PEGO SUPREMO",
            'description' => 'Adhesivo (Pego) de alto desempeño a base de cemento Blanco o Gris, arena sílice de granulometría controlada y aditivos químicos, con una excelente trabajabilidad y adherencia en aplicaciones de cerámica sobre cerámica, granito y madera.',
            'weight' => 10,
            'format' => 'Grandes formatos',
            'yield' => '(m2)2.5',
            'traffic' => 'Alto',
            'type_of_sale' => 'Paleta',
            'quantity' => 150,
            'price' => 10,
            'image' => 'PSupremo.png',
            'url_sheet' => 'https://drive.google.com/file/d/1ZVQB9rZhMllFVw-GX6X8rnmE3swwUcFq/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 2,
            'code' => 'LDPPR213',
            'name' => "SÚPER EXTRA PISCINA",
            'description' => 'Adhesivo de altas prestaciones base de  cemento blanco y gris, arena sílice de granulometría  controlada y aditivos químicos que mejoran la trabajabilidad y adherencia del producto en la instalación',
            'weight' => 20,
            'format' => 'Grandes formatos',
            'yield' => '4 - 4,5 Mt2',
            'traffic' => 'Alto',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'SuperExtraPiscina.png',
            'url_sheet' => 'https://drive.google.com/file/d/16eFaIxMfqJfSKDLTpfUzK3HXJxb1mZgg/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 1,
            'code' => 'LDPBPSG123',
            'name' => "PEGO STANDARD GRIS",
            'description' => 'Adhesivo (Pego) a base de cemento Portland, arena sílice de granulometría controlada y aditivos químicos que mejoran la trabajabilidad y adherencia del producto en la instalación de cerámicas de alta y media absorción. Para uso en interiores y exteriores.',
            'weight' => 14,
            'format' => '40 x 40',
            'yield' => '(m2)2.6-3.5',
            'traffic' => 'Bajo',
            'type_of_sale' => 'Paleta',
            'quantity' => 110,
            'price' => 14,
            'image' => 'Standard gris.png',
            'url_sheet' => 'https://drive.google.com/file/d/1GbRlURQOQAlWvBBJryI9fVwiapUSQAwB/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 1,
            'code' => 'LDPPEB123',
            'name' => "PEGO EXTRA BLANCO",
            'description' => 'Adhesivo (Pego) a base de cemento blanco, arena sílice de granulometría controlada y aditivos químicos que mejoran el manejo y adherencia del producto en la instalación de cerámicas de alta y media absorción. Para uso en interiores y exteriores.',
            'weight' => 14,
            'format' => '40 x 40',
            'yield' => '(m2)2.6-3.5',
            'traffic' => 'Bajo',
            'type_of_sale' => 'Paleta',
            'quantity' => 110,
            'price' => 14,
            'image' => 'Extra blanco.png',
            'url_sheet' => ''
        ]);
        Product::create([
            'subcategory_id' => 1,
            'code' => 'LDPBP123',
            'name' => "PREMIUM",
            'description' => 'En presentación gris o blanco. Pego a base de cemento Portland, ideal para revestimientos cerámicos y rústicos de alta y media absorción de humedad. Para uso en interiores y exteriores.',
            'weight' => 20,
            'format' => '50 X 50',
            'yield' => '(m2)3.5-5',
            'traffic' => 'Medio',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Premium gris.png',
            'url_sheet' => 'https://drive.google.com/file/d/1uXZEEz3xGnJY0NkSCAY2qiFGcEEE4xP5/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 2,
            'code' => 'LDPPSSG123',
            'name' => "SÚPER STANDARD GRIS",
            'description' => 'Adhesivo (Pego) de altas prestaciones a base de cemento Portland, arena sílice de granulometría controlada y aditivos químicos que mejoran el manejo y adherencia del producto en la instalación de todo tipo de baldosas cerámicas.',
            'weight' => 20,
            'format' => 'Grandes formatos y marmol',
            'yield' => '(m2)3.5-5',
            'traffic' => 'Alto',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Super standard gris.png',
            'url_sheet' => 'https://drive.google.com/file/d/1GbRlURQOQAlWvBBJryI9fVwiapUSQAwB/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 2,
            'code' => 'LDPPSEP123',
            'name' => "SÚPER EXTRA PORCELANATO",
            'description' => 'Adhesivo (Pego) a base de cemento Portland, arena sílice de granulometría controlada y aditivos químicos que mejoran la trabajabilidad y adherencia del producto en la instalación de porcelánicos de alta y media absorción.',
            'weight' => 20,
            'format' => 'Grandes formatos',
            'yield' => '2,5 - 4 Mt2',
            'traffic' => 'Alto',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Super extra porcelanato.png',
            'url_sheet' => 'https://drive.google.com/file/d/1wrBZd-Qx9dGgoJYRTmg9egCjBZK00ekE/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 4,
            'code' => 'LDCRO123',
            'name' => "OCCIFRISO",
            'description' => 'Mortero en polvo a base de cemento, arenas selecciondas y aditivos químicos, para la aplicación de frisos manual y proyectados, en paredes de concreto y bloques de cemento, arcilla, ladrillos.',
            'weight' => 20,
            'format' => '',
            'yield' => '1 - 1,5 Mt2',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Occifriso.png',
            'url_sheet' => 'https://drive.google.com/file/d/1ZVQB9rZhMllFVw-GX6X8rnmE3swwUcFq/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 4,
            'code' => 'LDCROAR123',
            'name' => "OCCIFRISO AR",
            'description' => 'Mortero en polvo a base de cemento, arenas seleccionadas y aditivos químicos, para la aplicación de frisos manual y proyectados en paredes de concreto.',
            'weight' => 20,
            'format' => '',
            'yield' => '0,33 - 3 Mt2',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Occifriso AR.png',
            'url_sheet' => 'https://drive.google.com/file/d/1w86wf7DrQTi0pK6ziltGffHDodJiUdm4/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 4,
            'code' => 'DPCOP123',
            'name' => "OCCIFRISO PROYECTADO",
            'description' => 'Mortero en polvo a base de cemento, y arena sílice granulométricamente seleccionada, y aditivos hidrófugos, para la aplicación de granito, piedra y canto rodado proyectado.',
            'weight' => 20,
            'format' => '',
            'yield' => '(m2)1-1.5',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Occifriso proyectado.png',
            'url_sheet' => 'https://drive.google.com/file/d/1PdLRvw6ZmRS818ZWg9gvRplJqlHnPZ4E/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 4,
            'code' => 'LDCROT123',
            'name' => "OCCIFRISO TEXTURIZADO",
            'description' => 'Mortero en polvo a base de cemento y arena sílice granulométricamente seleccionada, y aditivos hidrófugos, para la aplicación de granito, piedra y canto rodado proyectado.',
            'weight' => 20,
            'format' => '',
            'yield' => '(m2)1-1,5',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Occifriso texturizado.png',
            'url_sheet' => 'https://drive.google.com/file/d/1ZVQB9rZhMllFVw-GX6X8rnmE3swwUcFq/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 4,
            'code' => 'LDCROX123',
            'name' => "OCCIMIX",
            'description' => 'Mezclilla pre mezclada en polvo, de granulometría controlada y aditivos especiales diseñado para ser aplicado sobre friso de textura más gruesa o de acabado rugoso.',
            'weight' => 10,
            'format' => '',
            'yield' => '8 - 10 Mt2',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 150,
            'price' => 10,
            'image' => 'Occimix.png',
            'url_sheet' => 'https://drive.google.com/file/d/1ZVQB9rZhMllFVw-GX6X8rnmE3swwUcFq/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 4,
            'code' => 'LDCRS123',
            'name' => "STUCO",
            'description' => 'Mortero en polvo a base de cemento blanco o gris para encamisado de frisos, en presentación gris, blanco y blanco ostra. Para uso en interiores y exteriores.',
            'weight' => 10,
            'format' => '',
            'yield' => '(m2)6-10',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 150,
            'price' => 10,
            'image' => 'Stuco.png',
            'url_sheet' => 'https://drive.google.com/file/d/1hpjSnY-vlAALjkQWAvhuoqfAPWegCZVR/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 5,
            'code' => 'LDCPO123',
            'name' => "OCCIBLOQUE",
            'description' => 'Mortero en polvo a base de cemento, arenas seleccionadas y aditivo químico para la colocación de bloques de cemento, arcilla, trincote y tablilla.
            Para uso en interiores y exteriores.',
            'weight' => 10,
            'format' => '',
            'yield' => '(m2)1',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 150,
            'price' => 10,
            'image' => 'Occibloque.png',
            'url_sheet' => 'https://drive.google.com/file/d/1j6gnCrT6SrqlXwBN5Ng-mj4rdo_fHGgs/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 5,
            'code' => 'LDCPOT123',
            'name' => "OCCITEJA",
            'description' => 'Mortero en polvo a base de cemento, arenas seleccionadas y aditivos químicos, para la colocación de tejas. Para uso en interiores y exteriores.',
            'weight' => 10,
            'format' => '',
            'yield' => '(m2)3',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 10,
            'image' => 'Occiteja.png',
            'url_sheet' => 'https://drive.google.com/file/d/1f3JlbI-SCPGu2DsE_0nAjMZVP_LR938X/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 6,
            'code' => 'LDCEO123',
            'name' => "OCCICONCRETO",
            'description' => 'Mortero seco estructurado a base de cemento y arena seleccionada que lo hace apto para la construcción.',
            'weight' => 20,
            'format' => '',
            'yield' => '(m2)3',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Occiconcreto.png',
            'url_sheet' => 'https://drive.google.com/file/d/1NwSdM9DEgayRJYnHVrvoYXOS0Sefw2RV/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 6,
            'code' => 'LDCEOR123',
            'name' => "OCCICONCRETO REFORZADO",
            'description' => 'Concreto con resistencia mayor o igual a 210 Kg/Cm2. Viga de carga o amarre, columnas, losas, placas, aceras, escalinatas y muros.',
            'weight' => 20,
            'format' => '',
            'yield' => '(m2)3',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 90,
            'price' => 20,
            'image' => 'Occiconcreto reforzado.png',
            'url_sheet' => 'https://drive.google.com/file/d/1Lrk598lzRKRNMrRu3iuPrtkzHSF54Lgb/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 7,
            'code' => 'LDSJDC123',
            'name' => "D’ COLOR",
            'description' => 'Mortero aplicado para el relleno de juntas en cerámicas, contiene hidrófugo y antihongos por lo que lo hace resistente a la formación de moho y hongos. Para uso en exteriores e interiores.',
            'weight' => 2,
            'format' => '',
            'yield' => '9 - 10 Mt2',
            'traffic' => '',
            'type_of_sale' => 'Bulto',
            'quantity' => 12,
            'price' => 2,
            'image' => "D' color.png",
            'palette_color' => 'paleta_d_color.jpg',
            'url_sheet' => 'https://drive.google.com/file/d/1rIiUkSzbK9SOL5DSzxStLL2u0hIQlgnl/view?usp=sharing'
        ]);
        Product::create([
            'subcategory_id' => 4,
            'code' => 'LDCEO1235',
            'name' => "OCCIGRAFIADO",
            'description' => 'Mortero aplicado para el relleno de juntas en cerámicas, contiene hidrófugo y antihongos por lo que lo hace resistente a la formación de moho y hongos. Para uso en exteriores e interiores.',
            'weight' => 2,
            'format' => '',
            'yield' => '(m2)3',
            'traffic' => '',
            'type_of_sale' => 'Paleta',
            'quantity' => 150,
            'price' => 2,
            'image' => "Occigrafiado.png",
            'palette_color' => 'paleta_occigrafiado.png',
            'url_sheet' => 'https://drive.google.com/file/d/1hoPIHrQChGWYiZwZ3A1VFoyST0Lph3EH/view?usp=sharing'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
