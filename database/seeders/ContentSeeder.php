<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Coupon;
use App\Models\HeroSlide;
use App\Models\Page;
use App\Models\StoreLocation;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Static Pages
        $pages = [
            [
                'title' => 'Kisah fifa (Our Story)',
                'slug' => 'our-story',
                'meta_title' => 'Tentang Kami — Kisah & Filosofi Jam Tangan fifa',
                'meta_description' => 'fifa lahir dari dedikasi mendalam terhadap seni horologi dan pembuatan jam tangan presisi tinggi.',
                'content' => '<p>fifa lahir dari visi untuk menghadirkan jam tangan mewah berkualitas tinggi dengan presisi mekanikal luar biasa dan desain abadi yang dapat dinikmati seumur hidup.</p><h2>Seni Horologi & Material Pilihan</h2><p>Kami hanya menggunakan <strong>316L Surgical Grade Stainless Steel</strong>, kristal safir tahan gores dengan lapisan anti-reflektif ganda, serta mesin otomatis presisi dari manufaktur terkemuka dunia.</p><p>Setiap jam tangan fifa dirakit dan diuji ketahanan airnya secara ketat sebelum sampai di pergelangan tangan Anda.</p>',
            ],
            [
                'title' => 'Keahlian & Material (Craftsmanship)',
                'slug' => 'sustainability',
                'meta_title' => 'Standar Material & Kualitas Jam Tangan fifa',
                'meta_description' => 'Pelajari standar keahlian, kristal safir, baja 316L, dan kaliber mesin otomatis yang mentenagai jam tangan fifa.',
                'content' => '<p>Di fifa, setiap detik diukur dengan standar ketelitian tertinggi. Kami memilih material terbaik yang tahan korosi dan memiliki daya tahan puluhan tahun.</p><h3>Tiga Standar Utama Kami:</h3><ul><li><strong>Kaca Safir Anti-Gores (Sapphire Crystal):</strong> Tingkat kekerasan 9 skala Mohs, hanya bisa tergores oleh intan.</li><li><strong>Baja Bedah 316L:</strong> Anti-korosi, hipoalergenik, dan berkilau mewah.</li><li><strong>Mesin Otomatis Presisi:</strong> Cadangan daya hingga 42 jam tanpa memerlukan baterai.</li></ul>',
            ],
            [
                'title' => 'Tanya Jawab & Bantuan (FAQ)',
                'slug' => 'faq',
                'meta_title' => 'Pusat Bantuan & FAQ — fifa Indonesia',
                'meta_description' => 'Pertanyaan yang sering diajukan mengenai cara perawatan jam tangan, tingkat ketahanan air (ATM), dan garansi resmi 2 tahun.',
                'content' => '<h3>Berapa tingkat ketahanan air jam tangan fifa?</h3><p>Jam tangan fifa memiliki rating mulai dari 5 ATM (tahan cipratan dan hujan), 10 ATM (aman untuk berenang), hingga 30 ATM pada seri Pro Diver untuk menyelam profesional.</p><h3>Bagaimana cara merawat jam tangan automatic fifa?</h3><p>Kenakan secara rutin agar rotor terus mengisi daya pegas utama. Jika didiamkan lebih dari 40 jam, putar crown sebanyak 20-30 putaran searah jarum jam sebelum dikenakan kembali.</p><h3>Apakah ada garansi resmi?</h3><p>Ya! Setiap pembelian jam tangan fifa dilengkapi kartu garansi resmi internasional selama 2 tahun untuk mesin dan manufaktur.</p>',
            ],
            [
                'title' => 'Pengiriman & Pengembalian',
                'slug' => 'shipping-returns',
                'meta_title' => 'Kebijakan Pengiriman & Asuransi — fifa Indonesia',
                'meta_description' => 'Informasi pengiriman aman bergaransi, asuransi penuh, dan garansi penukaran 30 hari.',
                'content' => '<p>Setiap paket jam tangan fifa dikemas dalam kotak mewah berkunci dengan segel keamanan anti-bongkar dan asuransi pengiriman 100% via logistik <strong>Biteship</strong>.</p><p>Gratis ongkos kirim berlaku untuk pesanan di atas Rp 500.000.</p>',
            ],
            [
                'title' => 'Panduan Ukuran Dial (Size Guide)',
                'slug' => 'size-guide',
                'meta_title' => 'Panduan Memilih Ukuran Diameter Jam Tangan — fifa',
                'meta_description' => 'Tabel ukuran diameter dial jam tangan sesuai lingkar pergelangan tangan pria dan wanita.',
                'content' => '<p>Memilih diameter jam tangan yang tepat sangat penting untuk proporsi penampilan Anda:</p><ul><li><strong>32mm - 34mm:</strong> Ideal untuk wanita atau pergelangan ramping (&lt; 15 cm).</li><li><strong>38mm - 40mm:</strong> Ukuran klasik serbaguna untuk pria maupun wanita (15 - 17.5 cm).</li><li><strong>42mm - 44mm:</strong> Ukuran gagah untuk jam chronograph dan diver pada pergelangan tangan pria (&gt; 17.5 cm).</li></ul>',
            ],
            [
                'title' => 'Panduan Perawatan Jam (Shoe/Watch Care)',
                'slug' => 'shoe-care',
                'meta_title' => 'Panduan Merawat Jam Tangan fifa',
                'meta_description' => 'Tips merawat jam tangan mekanikal, pembersihan rantai baja, dan perawatan tali kulit.',
                'content' => '<p>Bersihkan rantai stainless steel menggunakan kain microfiber lembut. Hindari paparan medan magnet kuat (speaker besar, mesin MRI) pada jam tangan mekanik Anda.</p>',
            ],
            [
                'title' => 'Jejak Karbon & Etika Produksi',
                'slug' => 'carbon-footprint',
                'meta_title' => 'Komitmen Kualitas Berkelanjutan — fifa',
                'meta_description' => 'Etika pembuatan jam tangan tahan lama yang dapat diwariskan dari generasi ke generasi.',
                'content' => '<p>Jam tangan mekanis adalah bentuk perhiasan paling berkelanjutan di dunia — bekerja tanpa baterai beracun dan dirancang untuk bertahan puluhan tahun.</p>',
            ],
            [
                'title' => 'Hubungi Kami',
                'slug' => 'contact',
                'meta_title' => 'Hubungi Tim Layanan Pelanggan fifa',
                'meta_description' => 'Layanan bantuan customer service dan perbaikan jam tangan resmi fifa.',
                'content' => '<p>Tim Customer Support dan Layanan Purna Jual kami siap membantu Anda setiap hari kerja (Senin - Jumat, 09:00 - 18:00 WIB).</p><p>Email: <strong>support@fifa.co.id</strong><br>WhatsApp: <strong>0812-3456-7890</strong></p>',
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 2. Store Locations / Boutiques
        $stores = [
            [
                'name' => 'fifa Flagship Boutique Senayan City',
                'address' => 'Senayan City Mall Lt. 1 Unit 1-28, Jl. Asia Afrika Lot 19, Gelora, Tanah Abang',
                'city' => 'Jakarta Pusat',
                'phone' => '(021) 7278-1234',
                'opening_hours' => 'Setiap hari 10:00 - 22:00 WIB',
                'latitude' => -6.2271230,
                'longitude' => 106.7974560,
                'is_active' => true,
            ],
            [
                'name' => 'fifa Boutique Grand Indonesia',
                'address' => 'Grand Indonesia West Mall Lt. 2, Jl. M.H. Thamrin No. 1, Menteng',
                'city' => 'Jakarta Pusat',
                'phone' => '(021) 2358-5678',
                'opening_hours' => 'Setiap hari 10:00 - 22:00 WIB',
                'latitude' => -6.1951230,
                'longitude' => 106.8214560,
                'is_active' => true,
            ],
            [
                'name' => 'fifa Boutique Paris Van Java Bandung',
                'address' => 'Paris Van Java Mall Resort Level, Jl. Sukajadi No. 131-139, Cipedes',
                'city' => 'Kota Bandung',
                'phone' => '(022) 8206-3456',
                'opening_hours' => 'Setiap hari 10:00 - 22:00 WIB',
                'latitude' => -6.8891230,
                'longitude' => 107.5964560,
                'is_active' => true,
            ],
            [
                'name' => 'fifa Boutique Tunjungan Plaza Surabaya',
                'address' => 'Tunjungan Plaza 6 Lt. 3, Jl. Embong Malang No. 21-31, Kedungdoro',
                'city' => 'Kota Surabaya',
                'phone' => '(031) 5345-6789',
                'opening_hours' => 'Setiap hari 10:00 - 22:00 WIB',
                'latitude' => -7.2621230,
                'longitude' => 112.7384560,
                'is_active' => true,
            ],
            [
                'name' => 'fifa Boutique Beachwalk Kuta Bali',
                'address' => 'Beachwalk Shopping Center Lt. 1, Jl. Pantai Kuta, Badung',
                'city' => 'Bali',
                'phone' => '(0361) 8464-1234',
                'opening_hours' => 'Setiap hari 10:00 - 23:00 WITA',
                'latitude' => -8.7181230,
                'longitude' => 115.1694560,
                'is_active' => true,
            ],
        ];

        foreach ($stores as $s) {
            StoreLocation::updateOrCreate(['name' => $s['name']], $s);
        }

        // 3. Blog Posts
        $posts = [
            [
                'title' => 'Panduan Lengkap Memilih Diameter Jam Sesuai Pergelangan Tangan',
                'slug' => 'panduan-memilih-diameter-jam-tangan',
                'excerpt' => 'Menemukan proporsi dial 36mm hingga 44mm yang pas untuk postur dan ukuran pergelangan tangan Anda.',
                'cover_image' => '/images/home/travel-slides.jpg',
                'content' => '<p>Banyak penggemar jam tangan bingung menentukan ukuran case yang proporsional. Panduan ini mengulas lug-to-lug distance dan diameter dial agar jam tangan tampak sempurna saat dikenakan.</p><h2>Prinsip Proporsi Emas Pergelangan</h2><p>Ukur lingkar pergelangan tangan Anda menggunakan pita pengukur. Jika lingkar di bawah 16 cm, diameter 36mm-39mm adalah pilihan paling proporsional.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Mengenal Perbedaan Mesin Automatic, Quartz, dan Chronograph',
                'slug' => 'mengenal-perbedaan-mesin-jam-automatic-quartz',
                'excerpt' => 'Bedah teknologi mekanikal self-winding vs kristal kuarsa baterai dan fungsi stop-watch chronograph.',
                'cover_image' => '/images/home/woman-swing.jpg',
                'content' => '<p>Mesin mekanikal automatic bekerja murni dari energi kinetik gerakan tangan pemakai yang menggerakkan bandul rotor. Tanpa baterai, jarum detiknya menyapu halus (smooth sweep) yang mempesona.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Tips Merawat Jam Tangan Mekanikal Agar Awet Seumur Hidup',
                'slug' => 'tips-merawat-jam-tangan-mekanikal',
                'excerpt' => 'Langkah praktis membersihkan rantai baja, menjaga ketahanan air, dan waktu servis berkala.',
                'cover_image' => '/images/home/summer-rocks.jpg',
                'content' => '<p>Jam tangan mekanis yang dirawat dengan baik dapat diwariskan lintas generasi. Pastikan crown selalu terkunci rapat sebelum terkena air dan lakukan pengecekan pelumas setiap 3-5 tahun.</p>',
                'is_published' => true,
                'published_at' => now()->subDay(),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(['slug' => $post['slug']], $post);
        }

        // 4. Hero Slides
        $slides = [
            [
                'page' => 'home',
                'title' => 'Koleksi Jam Tangan Mewah & Presisi Tinggi',
                'subtitle' => 'Dibuat dari 316L stainless steel, kristal safir anti-gores, dan mesin otomatis akurat.',
                'cta_text' => 'Koleksi Pria',
                'cta_link' => '/men',
                'image' => '/images/home/hero-dasher.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'title' => 'Keanggunan Abadi di Setiap Detik',
                'subtitle' => 'Desain elegan berlapis rose gold dan mother-of-pearl memukau.',
                'cta_text' => 'Koleksi Wanita',
                'cta_link' => '/women',
                'image' => '/images/home/woman-swing.jpg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'men',
                'title' => 'Koleksi Jam Tangan Pria fifa',
                'subtitle' => 'Chronograph sporty, jam otomatis klasik, dan diver tangguh.',
                'cta_text' => 'Lihat Semua Pria',
                'cta_link' => '/men',
                'image' => '/images/home/hero-dasher.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'women',
                'title' => 'Koleksi Jam Tangan Wanita fifa',
                'subtitle' => 'Sentuhan rose gold, strap kulit mewah, dan dial mother-of-pearl.',
                'cta_text' => 'Lihat Semua Wanita',
                'cta_link' => '/women',
                'image' => '/images/home/woman-swing.jpg',
                'order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate([
                'page' => $slide['page'],
                'order' => $slide['order'],
            ], $slide);
        }

        // 5. Coupons
        $coupons = [
            [
                'code' => 'WELCOME10',
                'type' => 'percent',
                'value' => 10,
                'min_purchase' => 500000,
                'max_discount' => 250000,
                'starts_at' => now()->subDays(10),
                'expires_at' => now()->addMonths(6),
                'usage_limit' => 1000,
                'used_count' => 5,
                'is_active' => true,
            ],
            [
                'code' => 'FIFA50K',
                'type' => 'fixed',
                'value' => 50000,
                'min_purchase' => 500000,
                'max_discount' => null,
                'starts_at' => now()->subDays(5),
                'expires_at' => now()->addMonths(3),
                'usage_limit' => 500,
                'used_count' => 12,
                'is_active' => true,
            ],
            [
                'code' => 'WATCH20',
                'type' => 'percent',
                'value' => 20,
                'min_purchase' => 2000000,
                'max_discount' => 500000,
                'starts_at' => now()->subDays(1),
                'expires_at' => now()->addMonths(1),
                'usage_limit' => 200,
                'used_count' => 0,
                'is_active' => true,
            ],
        ];

        foreach ($coupons as $c) {
            Coupon::updateOrCreate(['code' => $c['code']], $c);
        }
    }
}
