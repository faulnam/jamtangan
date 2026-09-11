<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Men Main Categories & Subcategories
        $men = Category::updateOrCreate(
            ['slug' => 'men'],
            [
                'parent_id' => null,
                'gender' => 'men',
                'name' => 'Pria',
                'description' => 'Koleksi jam tangan pria fifa dengan presisi tinggi, material kaca safir, dan ketahanan air superior.',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $menWatches = Category::updateOrCreate(
            ['slug' => 'men-watches'],
            [
                'parent_id' => $men->id,
                'gender' => 'men',
                'name' => 'Jam Tangan',
                'description' => 'Koleksi jam tangan pria mewah dan kasual',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $menWatchTypes = [
            'Automatic & Mekanikal' => 'men-automatic-watches',
            'Chronograph & Sport' => 'men-chronograph-watches',
            'Classic Dress Watch' => 'men-dress-watches',
            'Diver & Tahan Air' => 'men-diver-watches',
            'Smart & Hybrid Watch' => 'men-smart-watches',
        ];

        foreach ($menWatchTypes as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id' => $menWatches->id,
                    'gender' => 'men',
                    'name' => $name,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        $menAccessories = Category::updateOrCreate(
            ['slug' => 'men-accessories'],
            [
                'parent_id' => $men->id,
                'gender' => 'men',
                'name' => 'Tali & Aksesori',
                'description' => 'Tali jam kulit asli, stainless steel mesh, dan kotak winder jam tangan',
                'order' => 2,
                'is_active' => true,
            ]
        );

        foreach (['Tali Kulit Italia' => 'men-leather-straps', 'Tali Steel & Mesh' => 'men-steel-straps', 'Kotak Winder & Travel Case' => 'men-watch-cases'] as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id' => $menAccessories->id,
                    'gender' => 'men',
                    'name' => $name,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        // 2. Women Main Categories & Subcategories
        $women = Category::updateOrCreate(
            ['slug' => 'women'],
            [
                'parent_id' => null,
                'gender' => 'women',
                'name' => 'Wanita',
                'description' => 'Koleksi jam tangan wanita fifa bernuansa elegan, rose gold, dan detail mother-of-pearl memukau.',
                'order' => 2,
                'is_active' => true,
            ]
        );

        $womenWatches = Category::updateOrCreate(
            ['slug' => 'women-watches'],
            [
                'parent_id' => $women->id,
                'gender' => 'women',
                'name' => 'Jam Tangan',
                'description' => 'Koleksi jam tangan wanita elegan',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $womenWatchTypes = [
            'Classic & Petite' => 'women-classic-petite',
            'Luxury & Rose Gold' => 'women-luxury-rosegold',
            'Minimalist & Mesh' => 'women-minimalist-mesh',
            'Leather Band Elegance' => 'women-leather-elegance',
            'Diamond Accent Series' => 'women-diamond-accent',
        ];

        foreach ($womenWatchTypes as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id' => $womenWatches->id,
                    'gender' => 'women',
                    'name' => $name,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        $womenAccessories = Category::updateOrCreate(
            ['slug' => 'women-accessories'],
            [
                'parent_id' => $women->id,
                'gender' => 'women',
                'name' => 'Tali & Aksesori',
                'description' => 'Tali jam kulit wanita dan kotak perhiasan jam tangan',
                'order' => 2,
                'is_active' => true,
            ]
        );

        foreach (['Tali Kulit Pastel' => 'women-leather-straps', 'Gelang Mesh Rose Gold' => 'women-mesh-straps', 'Travel Pouch' => 'women-watch-pouches'] as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id' => $womenAccessories->id,
                    'gender' => 'women',
                    'name' => $name,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        // 3. Collections
        $collections = [
            [
                'title' => 'Produk Terbaru',
                'slug' => 'new-arrivals',
                'description' => 'Koleksi jam tangan terbaru dengan inovasi movement presisi tinggi dan desain kontemporer.',
                'order' => 1,
            ],
            [
                'title' => 'Produk Terlaris',
                'slug' => 'best-sellers',
                'description' => 'Koleksi jam tangan paling dicari dan menjadi favorit pelanggan di seluruh Indonesia.',
                'order' => 2,
            ],
            [
                'title' => 'Diskon Spesial',
                'slug' => 'sale',
                'description' => 'Penawaran istimewa berbatas waktu untuk seri jam tangan pilihan.',
                'order' => 3,
            ],
            [
                'title' => 'Seri Chrono Master',
                'slug' => 'chrono-master',
                'description' => 'Ketepatan pengukuran waktu tingkat tinggi dalam balutan casing 316L surgical steel.',
                'order' => 4,
            ],
            [
                'title' => 'Seri Heritage Automatic',
                'slug' => 'heritage-automatic',
                'description' => 'Kemewahan mesin mekanikal otomatis tanpa baterai dengan kaca safir anti-gores.',
                'order' => 5,
            ],
        ];

        foreach ($collections as $col) {
            Collection::updateOrCreate(
                ['slug' => $col['slug']],
                [
                    'title' => $col['title'],
                    'description' => $col['description'],
                    'is_active' => true,
                    'order' => $col['order'],
                ]
            );
        }
    }
}
