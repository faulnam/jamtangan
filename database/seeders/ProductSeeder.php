<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Fetch Categories
        $menChrono = Category::where('slug', 'men-chronograph-watches')->first();
        $menAutomatic = Category::where('slug', 'men-automatic-watches')->first();
        $menDress = Category::where('slug', 'men-dress-watches')->first();
        $menDiver = Category::where('slug', 'men-diver-watches')->first();
        $menSmart = Category::where('slug', 'men-smart-watches')->first();
        $menStraps = Category::where('slug', 'men-leather-straps')->first();

        $womenPetite = Category::where('slug', 'women-classic-petite')->first();
        $womenRosegold = Category::where('slug', 'women-luxury-rosegold')->first();
        $womenMesh = Category::where('slug', 'women-minimalist-mesh')->first();
        $womenLeather = Category::where('slug', 'women-leather-elegance')->first();
        $womenDiamond = Category::where('slug', 'women-diamond-accent')->first();

        // 2. Fetch Collections
        $newArrivalsCol = Collection::where('slug', 'new-arrivals')->first();
        $bestSellersCol = Collection::where('slug', 'best-sellers')->first();
        $saleCol = Collection::where('slug', 'sale')->first();
        $chronoCol = Collection::where('slug', 'chrono-master')->first();
        $heritageCol = Collection::where('slug', 'heritage-automatic')->first();

        // 3. Products Master Dataset
        $productsData = [
            // ----------------------------------------------------
            // MEN WATCHES
            // ----------------------------------------------------
            [
                'category_id' => $menChrono?->id ?? 1,
                'name' => "Jam Tangan Pria FIFA Chrono Master",
                'slug' => 'mens-fifa-chrono-master',
                'short_description' => 'Kronograf presisi tinggi dengan dial sunray biru megah, casing 316L stainless steel, dan kaca safir anti-gores.',
                'description' => '<p>Dirancang untuk pria berkarakter dinamis dan berkelas. FIFA Chrono Master memadukan dial sunburst biru laut dengan 3 sub-dial presisi hingga 1/10 detik. Dilengkapi bezel tachymeter terukir laser dan rantai solid link 316L stainless steel dengan double lock deployment clasp.</p><p>Kaca safir anti-gores berpelapis anti-pantulan menjamin keterbacaan sempurna di bawah sinar matahari langsung. Tahan air hingga 100 meter (10 ATM).</p>',
                'material_info' => 'Case: 316L Surgical Stainless Steel. Kaca: Double-domed Sapphire Crystal dengan Anti-Reflective Coating. Movement: Precision Quartz Chronograph Calibre. Water Resistance: 10 ATM (100m).',
                'sustainability_note' => 'Garansi Resmi Internasional 2 Tahun. Bahan ramah lingkungan dan 100% dapat didaur ulang seumur hidup.',
                'base_price' => 2450000,
                'compare_at_price' => 2850000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 165,
                'collections' => array_filter([$newArrivalsCol?->id, $bestSellersCol?->id, $chronoCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Royal Sunray Blue (Steel Bracelet)',
                        'color_hex' => '#25548a',
                        'sizes' => ['40mm' => 12, '42mm' => 25, '44mm' => 10],
                    ],
                    [
                        'color_name' => 'Pure Blizzard Silver (Steel Bracelet)',
                        'color_hex' => '#dedede',
                        'sizes' => ['40mm' => 8, '42mm' => 18, '44mm' => 6],
                    ],
                    [
                        'color_name' => 'Emerald Green Edition',
                        'color_hex' => '#1d5438',
                        'sizes' => ['42mm' => 15, '44mm' => 8],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-runner-blue.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/tree-runner-white.png', 'order' => 2, 'is_primary' => false],
                    ['url' => '/images/products/tree-runner-forest.png', 'order' => 3, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menAutomatic?->id ?? 1,
                'name' => "Jam Tangan Pria FIFA Heritage Automatic",
                'slug' => 'mens-fifa-heritage-automatic',
                'short_description' => 'Kemewahan jam mekanikal otomatis tanpa baterai dengan dial arang sunburst dan rantai Milanese mesh halus.',
                'description' => '<p>Perwujudan horologi klasik murni. FIFA Heritage Automatic ditenagai oleh gerakan mekanik otomatis dengan cadangan daya 42 jam yang terisi sendiri dari ayunan tangan Anda. Casing belakang transparan (exhibition caseback) memungkinkan Anda mengagumi gerakan roda keseimbangan dan rotor berukir.</p>',
                'material_info' => 'Case: 316L Stainless Steel 40mm. Movement: Automatic Self-Winding 24 Jewels, 21.600 bph. Kaca: Scratch-resistant Sapphire Crystal. Strap: Milanese Mesh Stainless Steel. Water Resistance: 5 ATM (50m).',
                'sustainability_note' => 'Bekerja 100% tanpa baterai. Dirancang tahan puluhan tahun dan dapat diwariskan ke generasi berikutnya.',
                'base_price' => 3250000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 140,
                'collections' => array_filter([$newArrivalsCol?->id, $bestSellersCol?->id, $heritageCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Charcoal Sunburst (Mesh Bracelet)',
                        'color_hex' => '#4d4b4a',
                        'sizes' => ['38mm' => 10, '40mm' => 20, '42mm' => 8],
                    ],
                    [
                        'color_name' => 'Champagne Heritage Gold',
                        'color_hex' => '#c2a868',
                        'sizes' => ['38mm' => 6, '40mm' => 15, '42mm' => 5],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/wool-runner-grey.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/runner-nz-oat.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menDiver?->id ?? 1,
                'name' => "Jam Tangan Pria FIFA Pro Diver 300M",
                'slug' => 'mens-fifa-pro-diver-300m',
                'short_description' => 'Jam selam profesional dengan ketahanan air 30 ATM (300 meter), bezel keramik putar searah, dan jarum luminous Super-LumiNova.',
                'description' => '<p>Diciptakan untuk menaklukkan kedalaman samudera. FIFA Pro Diver 300M menghadirkan dial hijau zamrud berpendar kuat di kegelapan laut berkat pigmen Swiss Super-LumiNova BGW9. Dilengkapi crown pengunci ulir (screw-down crown) dan katup pelepas helium otomatis.</p>',
                'material_info' => 'Bezel: Scratch-proof High-Gloss Ceramic. Case: 316L Stainless Steel 42mm. Kaca: Sapphire Crystal tebal 3.5mm. Water Resistance: 30 ATM (300m / 1000ft).',
                'sustainability_note' => 'Uji tekanan hidrostatik laboratorium berstandar ISO 6425 untuk jam selam profesional.',
                'base_price' => 3850000,
                'compare_at_price' => 4300000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 180,
                'collections' => array_filter([$bestSellersCol?->id, $saleCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Emerald Green Ceramic',
                        'color_hex' => '#1b4d32',
                        'sizes' => ['40mm' => 8, '42mm' => 22, '44mm' => 12],
                    ],
                    [
                        'color_name' => 'Deep Sea Navy',
                        'color_hex' => '#1e385c',
                        'sizes' => ['40mm' => 10, '42mm' => 20, '44mm' => 14],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-runner-forest.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/tree-dasher-navy.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menDress?->id ?? 1,
                'name' => "Jam Tangan Pria FIFA Classic Dress White",
                'slug' => 'mens-fifa-classic-dress-white',
                'short_description' => 'Desain gaun klasik minimalis berbalut dial putih porselen bersih dan strap kulit asli Italia.',
                'description' => '<p>Pilihan sempurna untuk setelan jas formal, pertemuan bisnis, dan momen istimewa. Menampilkan profil ramping setebal 7.5mm yang dengan mudah meluncur ke bawah manset kemeja Anda.</p>',
                'material_info' => 'Dial: Enamel Finish White. Strap: Italian Genuine Calfskin Leather. Kaca: Kaca Safir Anti-Gores. Tebal: 7.5mm Ultra-Slim.',
                'sustainability_note' => 'Kulit asli bersertifikasi Leather Working Group (LWG) penyamakan ramah lingkungan.',
                'base_price' => 1890000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 85,
                'collections' => array_filter([$bestSellersCol?->id, $newArrivalsCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Enamel White (Brown Leather)',
                        'color_hex' => '#ded7cd',
                        'sizes' => ['38mm' => 10, '40mm' => 25, '42mm' => 12],
                    ],
                    [
                        'color_name' => 'Blizzard Silver (Black Leather)',
                        'color_hex' => '#ffffff',
                        'sizes' => ['38mm' => 8, '40mm' => 20, '42mm' => 10],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/canvas-cruiser-white.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/cruiser-slipon-blizzard.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menChrono?->id ?? 1,
                'name' => "Jam Tangan Pria FIFA Phantom Black Chrono",
                'slug' => 'mens-fifa-phantom-black-chrono',
                'short_description' => 'Desain siluman monokrom full black DLC dengan strap silikon bertekstur nyaman untuk gaya kasual modern.',
                'description' => '<p>Nuansa maskulin tegas dalam balutan warna serba hitam matte berteknologi pelapis Diamond-Like Carbon (DLC). Sangat tangguh terhadap goresan dan nyaman di pergelangan tangan sepanjang hari.</p>',
                'material_info' => 'Case: Matte Black DLC Coated 316L Steel. Strap: High-Density Waterproof Silicone. Kaca: Sapphire Crystal with Dark AR Coating.',
                'sustainability_note' => 'Tahan benturan dan cuaca ekstrem tropis.',
                'base_price' => 2650000,
                'compare_at_price' => 2950000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 135,
                'collections' => array_filter([$bestSellersCol?->id, $chronoCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Phantom Matte Black',
                        'color_hex' => '#212121',
                        'sizes' => ['40mm' => 10, '42mm' => 24, '44mm' => 15],
                    ],
                    [
                        'color_name' => 'Anthracite Carbon',
                        'color_hex' => '#3a3a3a',
                        'sizes' => ['40mm' => 6, '42mm' => 16, '44mm' => 8],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/runner-nz-anthracite.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/wool-runner-black.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menChrono?->id ?? 1,
                'name' => "Jam Tangan Pria FIFA Racing Crimson Chrono",
                'slug' => 'mens-fifa-racing-crimson-chrono',
                'short_description' => 'Edisi balap motorsport dengan dial merah crimson menyala dan fungsi stopwatch presisi tinggi.',
                'description' => '<p>Terinspirasi dari sirkuit balap legendaris dunia. FIFA Racing Crimson memadukan dial merah cerah dengan sub-dial kontras dan jarum beraksen sporty.</p>',
                'material_info' => 'Case: 316L Stainless Steel 42mm. Strap: Perforated Rally Leather Strap. Water Resistance: 10 ATM.',
                'sustainability_note' => 'Garansi Resmi 2 Tahun Mesin & Baterai.',
                'base_price' => 2550000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => false,
                'weight_grams' => 150,
                'collections' => array_filter([$chronoCol?->id, $newArrivalsCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Crimson Racing Red',
                        'color_hex' => '#9e2424',
                        'sizes' => ['42mm' => 18, '44mm' => 10],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-dasher-red.png', 'order' => 1, 'is_primary' => true],
                ],
            ],

            // ----------------------------------------------------
            // WOMEN WATCHES
            // ----------------------------------------------------
            [
                'category_id' => $womenRosegold?->id ?? 1,
                'name' => "Jam Tangan Wanita FIFA Petite Rose Gold",
                'slug' => 'womens-fifa-petite-rosegold',
                'short_description' => 'Kemewahan feminin abadi dengan balutan rose gold berkilau, dial mutiara alami, dan indeks kristal berkilau.',
                'description' => '<p>Jam tangan wanita paling memukau dari fifa. Casing 32mm berlapis emas rose gold 18K PVD yang anggun dipadukan dengan dial Mother-of-Pearl alami yang membiaskan cahaya pelangi lembut di setiap sudut.</p><p>Rantai jubilee ramping melingkar lembut di pergelangan tangan Anda, cocok untuk busana kasual chic hingga gaun pesta mewah.</p>',
                'material_info' => 'Case & Strap: 18K Rose Gold PVD on 316L Steel. Dial: Genuine Natural Mother of Pearl. Kaca: Scratch-proof Sapphire Crystal. Water Resistance: 5 ATM (50m).',
                'sustainability_note' => 'Bahan hipoalergenik, 100% aman untuk kulit sensitif tanpa nikel.',
                'base_price' => 2190000,
                'compare_at_price' => 2490000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 95,
                'collections' => array_filter([$bestSellersCol?->id, $newArrivalsCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Rose Gold Pearl',
                        'color_hex' => '#d49b8a',
                        'sizes' => ['30mm' => 10, '32mm' => 25, '34mm' => 15],
                    ],
                    [
                        'color_name' => 'Blush Pink Pastel',
                        'color_hex' => '#e8b2b0',
                        'sizes' => ['30mm' => 8, '32mm' => 18, '34mm' => 10],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-lounger-pink.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/tree-lounger-terracotta.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $womenLeather?->id ?? 1,
                'name' => "Jam Tangan Wanita FIFA Classic Leather Elegance",
                'slug' => 'womens-fifa-classic-leather-elegance',
                'short_description' => 'Sentuhan minimalis berkelas dengan strap kulit asli Italia warna nude champagne dan bezel rose gold.',
                'description' => '<p>Keindahan dalam kesederhanaan. Dial krem champagne berpadu harmonis dengan tali kulit Italia yang lembut dan nyaman dipakai seharian di kantor maupun akhir pekan.</p>',
                'material_info' => 'Case: Polished Rose Gold 34mm. Strap: Soft Italian Nappa Leather. Kaca: Sapphire Crystal. Movement: Swiss Quartz.',
                'sustainability_note' => 'Desain ramah lingkungan dan baterai hemat energi bertahan hingga 3 tahun.',
                'base_price' => 1790000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 65,
                'collections' => array_filter([$bestSellersCol?->id, $newArrivalsCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Champagne Nude (Leather Strap)',
                        'color_hex' => '#bfae9b',
                        'sizes' => ['32mm' => 12, '34mm' => 20, '36mm' => 8],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/runner-nz-mushroom.png', 'order' => 1, 'is_primary' => true],
                ],
            ],
            [
                'category_id' => $womenMesh?->id ?? 1,
                'name' => "Jam Tangan Wanita FIFA Minimalist Silver Mesh",
                'slug' => 'womens-fifa-minimalist-silver-mesh',
                'short_description' => 'Siluet modern dengan dial putih bersih, profil ultra-tipis 6.8mm, dan gelang rantai pasir perak berkilau.',
                'description' => '<p>Jam tangan ultra-tipis berbobot ringan yang menyatu alami dengan pergelangan tangan wanita modern. Dilengkapi pengunci geser yang mudah diatur ukurannya sendiri tanpa alat pemotong rantai.</p>',
                'material_info' => 'Case: 316L Stainless Steel 32mm. Strap: Adjustable Milanese Mesh. Kaca: Sapphire Glass. Water Resistance: 5 ATM.',
                'sustainability_note' => 'Garansi 2 Tahun Resmi fifa Indonesia.',
                'base_price' => 1850000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 80,
                'collections' => array_filter([$bestSellersCol?->id, $newArrivalsCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Blizzard Silver Mesh',
                        'color_hex' => '#ffffff',
                        'sizes' => ['32mm' => 15, '34mm' => 20, '36mm' => 10],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/cruiser-slipon-blizzard.png', 'order' => 1, 'is_primary' => true],
                ],
            ],

            // ----------------------------------------------------
            // ACCESSORIES & STRAPS
            // ----------------------------------------------------
            [
                'category_id' => $menStraps?->id ?? 1,
                'name' => "FIFA Premium Leather Watch Strap 20mm/22mm",
                'slug' => 'fifa-premium-leather-watch-strap',
                'short_description' => 'Tali jam tangan kulit sapi asli Italia dengan mekanisme quick-release ganti tali instan tanpa alat.',
                'description' => '<p>Ubah gaya jam tangan fifa Anda dalam hitungan detik. Tali kulit asli berkualitas tinggi yang semakin berkarakter seiring berjalannya waktu. Dilengkapi pin pegas pelepas cepat (quick-release spring bars).</p>',
                'material_info' => '100% Genuine Italian Full-Grain Leather, Buckle 316L Steel.',
                'sustainability_note' => 'Pewarnaan berbasis ekstrak nabati alami tanpa bahan kimia keras.',
                'base_price' => 450000,
                'compare_at_price' => 550000,
                'is_active' => true,
                'is_featured' => false,
                'weight_grams' => 40,
                'collections' => array_filter([$newArrivalsCol?->id, $saleCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Chestnut Brown',
                        'color_hex' => '#6e4529',
                        'sizes' => ['20mm' => 30, '22mm' => 40],
                    ],
                    [
                        'color_name' => 'Classic Black',
                        'color_hex' => '#212121',
                        'sizes' => ['20mm' => 25, '22mm' => 35],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/canvas-cruiser-white.png', 'order' => 1, 'is_primary' => true],
                ],
            ],
            [
                'category_id' => $menStraps?->id ?? 1,
                'name' => "FIFA Luxury Automatic Watch Winder Box",
                'slug' => 'fifa-luxury-automatic-watch-winder',
                'short_description' => 'Kotak pemutar jam otomatis eksklusif dengan motor hening Jepang Mabuchi dan interior beludru lembut.',
                'description' => '<p>Jaga jam tangan otomatis fifa Anda tetap berdetak akurat dan siap dipakai setiap saat. Dilengkapi motor ultra-silent berteknologi Jepang, pengatur putaran multi-arah, dan pencahayaan LED biru lembut yang elegan.</p>',
                'material_info' => 'Solid Piano Lacquer Wood Box, Japanese Mabuchi Motor, Velvet Lining.',
                'sustainability_note' => 'Hemat daya listrik dengan adaptor AC ganda dan kompartemen baterai darurat.',
                'base_price' => 1450000,
                'compare_at_price' => 1750000,
                'is_active' => true,
                'is_featured' => false,
                'weight_grams' => 1200,
                'collections' => array_filter([$bestSellersCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Piano Gloss Black',
                        'color_hex' => '#1a1a1a',
                        'sizes' => ['Single Slot' => 20, 'Double Slot' => 15],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/wool-runner-black.png', 'order' => 1, 'is_primary' => true],
                ],
            ],
        ];

        // 4. Seed Products, Variants, Images & Reviews
        foreach ($productsData as $data) {
            $product = Product::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'category_id' => $data['category_id'],
                    'name' => $data['name'],
                    'short_description' => $data['short_description'],
                    'description' => $data['description'],
                    'material_info' => $data['material_info'],
                    'sustainability_note' => $data['sustainability_note'],
                    'base_price' => $data['base_price'],
                    'compare_at_price' => $data['compare_at_price'],
                    'is_active' => $data['is_active'],
                    'is_featured' => $data['is_featured'],
                    'weight_grams' => $data['weight_grams'],
                ]
            );

            // Sync collections
            if (!empty($data['collections'])) {
                $product->collections()->sync($data['collections']);
            }

            // Sync Images
            $product->images()->delete();
            foreach ($data['images'] as $img) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $img['url'],
                    'order' => $img['order'],
                    'is_primary' => $img['is_primary'],
                ]);
            }

            // Sync Variants
            $product->variants()->delete();
            $varIndex = 1;
            foreach ($data['variants'] as $varGroup) {
                foreach ($varGroup['sizes'] as $size => $stock) {
                    $sku = 'FIF-W-' . str_pad($product->id, 3, '0', STR_PAD_LEFT) . '-' . strtoupper(substr(Str::slug($varGroup['color_name']), 0, 4)) . '-' . Str::slug($size) . '-' . $varIndex;
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'sku' => $sku,
                        'color_name' => $varGroup['color_name'],
                        'color_hex' => $varGroup['color_hex'],
                        'size' => (string) $size,
                        'stock' => (int) $stock,
                        'price_override' => null,
                        'is_active' => true,
                    ]);
                    $varIndex++;
                }
            }

            // Seed Sample Verified Reviews for each watch
            $user = User::first();
            if ($user && $product->reviews()->count() === 0) {
                Review::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'rating' => 5,
                    'title' => 'Jam tangan paling presisi dan mewah!',
                    'comment' => 'Finishing casing stainless steel 316L sangat halus, kaca safirnya jernih tanpa silau. Dipakai di pergelangan tangan terasa berbobot mantap dan sangat elegan.',
                    'is_approved' => true,
                ]);
                Review::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'rating' => 5,
                    'title' => 'Kualitas setara jam tangan Swiss belasan juta',
                    'comment' => 'Desain dial rapi dan pergerakan jarumnya sangat mulus. Kemasan kotaknya pun sangat mewah dan berkelas. Sangat puas belanja di fifa!',
                    'is_approved' => true,
                ]);
            }
        }

        echo "ProductSeeder completed: " . count($productsData) . " rich watch products with transparent PNGs and variants seeded.\n";
    }
}
