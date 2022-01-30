<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'first_name' => 'DBengkel',
            'last_name' => 'Admin',
            'email' => 'dbengkeladmin@gmail.com',
            'password' => bcrypt('dbadmin123'),
            'role_as' => '2'
        ]);

        User::create([
            'first_name' => 'Danu',
            'last_name' => 'artha',
            'email' => 'danuart21@gmail.com',
            'password' => bcrypt('123456'),
            'role_as' => '1'
        ]);

        User::create([
            'first_name' => 'Surya',
            'last_name' => 'Andika',
            'email' => 'suryandika123@gmail.com',
            'password' => bcrypt('123456'),
            'role_as' => '0'
        ]);

        Category::create([
            'name' => 'Kunci',
            'slug' => 'kunci',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '1',
            'main_image' => 'https://picsum.photos/235'
        ]);

        Category::create([
            'name' => 'Palu',
            'slug' => 'palu',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '1',
            'main_image' => 'https://picsum.photos/250'
        ]);

        Category::create([
            'name' => 'Obeng',
            'slug' => 'obeng',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/240'
        ]);

        Category::create([
            'name' => 'Dongkrak',
            'slug' => 'dongkrak',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/251'
        ]);

        Category::create([
            'name' => 'Tang',
            'slug' => 'tang',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '1',
            'main_image' => 'https://picsum.photos/248'
        ]);

        Category::create([
            'name' => 'Gergaji',
            'slug' => 'gergaji',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/241'
        ]);

        Category::create([
            'name' => 'Gerinda',
            'slug' => 'gerinda',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/235'
        ]);

        Category::create([
            'name' => 'Bor',
            'slug' => 'bor',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/235'
        ]);

        Category::create([
            'name' => 'Ragum',
            'slug' => 'ragum',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '1',
            'main_image' => 'https://picsum.photos/235'
        ]);

        Category::create([
            'name' => 'Paket Bengkel',
            'slug' => 'paket-bengkel',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/235'
        ]);

        Product::create([
            'name' => 'WR-CO0011 KUNCI RING PAS 16 mm TEKIRO',
            'slug' => 'wr-co0011-kunci-ring-pas-16-mm-tekiro',
            'category_id' => 1,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 31000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 17,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Kunci Shock Sok Set 25 pcs',
            'slug' => 'kunci-shock-sok-set-25-pcs',
            'category_id' => 1,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 185000,
            'disc_price' => 163000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 12,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Tool Set Bengkel - Kunci Perkakas Motor',
            'slug' => 'tool-set-bengkel-kunci-perkakas-motor',
            'category_id' => 1,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 250000,
            'disc_price' => 230000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 8,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Kunci Ring Pas 1 Set Isi 8 Ukuran 6 - 22 Tool Kit Alat Bengkel',
            'slug' => 'kunci-ring-pas-1-set-isi-8-ukuran-6-22-tool-kit-alat-bengkel',
            'category_id' => 1,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 45500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 25,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'KUNCI T TEKIRO PERKAKAS OTOMOTIF BENGKEL',
            'slug' => 'kunci-t-tekiro-perkakas-otomotif-bengkel',
            'category_id' => 1,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 32500,
            'disc_price' => 25000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 30,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Kunci Serbaguna 48 in 1 Terbaru / Tiger Wrench / Perkakas Bengkel',
            'slug' => 'kunci-serbaguna-48-in-1-terbaru-tiger-wrench-perkakas-bengkel',
            'category_id' => 1,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 79500,
            'disc_price' => 68400,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 15,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Palu ketok MAGIC reparasi bodi mobil serbaguna',
            'slug' => 'palu-ketok-magic-reparasi-bodi-mobil-serbaguna',
            'category_id' => 2,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 435000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 6,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'PALU BESI INGGRIS SHERLOCK 16 OZ',
            'slug' => 'palu-besi-inggris-sherlock-16-oz',
            'category_id' => 2,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 162500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 10,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Deli Claw Hammer / Palu Kambing 16oz Carbon Steel Alat Perkakas DL5002',
            'slug' => 'deli-claw-hammer-palu-kambing-16oz-carbon-steel-alat-perkakas-dl5002',
            'category_id' => 2,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 58000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 35,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Peralatan bengkel body repair palu ketok 7 pcs',
            'slug' => 'peralatan-bengkel-body-repair-palu-ketok-7-pcs',
            'category_id' => 2,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 1150000,
            'disc_price' => 850000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 3,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Palu Multifungsi /HAND TOOLS ORIGINAL TERMURAH',
            'slug' => 'palu-multifungsi-hand-tools-original-termurah',
            'category_id' => 2,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 118000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 14,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Palu Pneumatic Dengan Shank Ukuran 100mm Untuk Bengkel',
            'slug' => 'palu-pneumatic-dengan-shank-ukuran-100mm-untuk-bengkel',
            'category_id' => 2,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 199500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 12,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Weilai Wi-8001 Obeng set Magnetik Screwdriver Universal Set 112 In 1',
            'slug' => 'weilai-wi-8001-obeng-set-magnetik-screwdriver-universal-set-112-in-1',
            'category_id' => 3,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 115000,
            'disc_price' => 89500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 18,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Obeng Tekiro Set 2 Pcs - Obeng Bengkel Mekanik',
            'slug' => 'obeng-tekiro-set-2-pcs-obeng-bengkel-mekanik',
            'category_id' => 3,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 69000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 29,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Multipro Obeng Ketok Bengkel 5pcs',
            'slug' => 'multipro-obeng-ketok-bengkel-5pcs',
            'category_id' => 3,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 115000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 3,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Xiaomi HOTO Electric Screwdriver Obeng Otomatis',
            'slug' => 'xiaomi-hOTO-electric-screwdriver-obeng-otomatis',
            'category_id' => 3,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 575000,
            'disc_price' => 499000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 5,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'MX DEMEL Obeng Set Alat Reparasi Service Mobil Bengkel',
            'slug' => 'mx-demel-obeng-set-alat-reparasi-service-mobil-bengkel',
            'category_id' => 3,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 137000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 16,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Dongkrak harley jack moge jackstand HD standar harley - Hitam',
            'slug' => 'dongkrak-harley-jack-moge-jackstand-hd-standar-harley-hitam',
            'category_id' => 4,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 1250000,
            'disc_price' => 1999500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 4,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'DONGKRAK MOBIL MODEL JEMBATAN SCISSOR JACK KAPASITAS 1 TON UNIVERSAL',
            'slug' => 'dongkrak-mobil-model-jembatan-scissor-jack-kapasitas-1-ton-universal',
            'category_id' => 4,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 98000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 21,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Dongkrak Buaya 2 Ton MOLLAR / Dongkrak Mobil 2Ton',
            'slug' => 'dongkrak-buaya-2-ton-mollar-dongkrak-mobil-2Ton',
            'category_id' => 4,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 332500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 5,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'DONGKRAK AUTOBEST T825010R HYDRAULIC JACK LOWPROFILE 2.5TON',
            'slug' => 'dongkrak-autobest-t825010r-hydraulic-jack-lowprofile-2.5ton',
            'category_id' => 4,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 655000,
            'disc_price' => 628000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 6,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Dongkrak Mobil / Dongkrak Ulir 2 Ton / Dongkrak Jembatan Super Quality',
            'slug' => 'dongkrak-mobil-dongkrak-ulir-2-ton-dongkrak-jembatan-super-quality',
            'category_id' => 4,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 155000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 19,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Tang Lancip IWT 8 inch (versi lama) Made in Japan CHROME VANADIUM',
            'slug' => 'tang-lancip-iwt-8-inch-versi lama-made-in-japan-chrome-vanadium',
            'category_id' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 62700,
            'disc_price' => 48500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 25,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Tang Kupas Potong Automatic Wire Stripper STECO Crimping Tools Pliers',
            'slug' => 'tang-kupas-potong-automatic-wire-stripper-steco-crimping-tools-pliers',
            'category_id' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 79000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 17,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'GUTE MADICO Tang Kombinasi Tang Lancip Tang Potong - Multiguna',
            'slug' => 'gute-madico-tang-kombinasi-tang-lancip-tang-potong-multiguna',
            'category_id' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 18000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 38,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Lakoni Pro Tang Lancip Mini Long Nose Pliers 4,5 Inch',
            'slug' => 'lakoni-pro-tang-lancip-mini-long-nose-pliers-4,5-Inch',
            'category_id' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 26500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 20,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'MINI PLIER TANG KRISBOW 4 INC',
            'slug' => 'mini-plier-tang-krisbon-4-inc',
            'category_id' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 10500,
            'disc_price' => 7300,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 34,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Tang Burung 10 TEKIRO ( Original ) Perkakas Bengkel',
            'slug' => 'tang-burung-10-tekiro-original-perkakas-bengkel',
            'category_id' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 76000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 13,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Pisau Gergaji Pengganti Ukuran 6-1 / 2 Inch Untuk Bengkel',
            'slug' => 'pisau-gergaji-pengganti-ukuran-6-1-2-inch-untuk-bengkel',
            'category_id' => 6,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 183000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 10,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Deli Mini Saws / Gergaji Mini 6inch Pegangan Alumunium Perkakas DL6007',
            'slug' => 'deli-mini-saws-gergaji-mini-6inch-pegangan-alumunium-perkakas-dl6007',
            'category_id' => 6,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 35000,
            'disc_price' => 28500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 19,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => '5pcs Pisau Gergaji Fleksibel Anti Pecah S1122Bf Untuk Bengkel',
            'slug' => '5pcs-pisau-gergaji-fleksibel-anti-pecah-s1122bf-untuk-bengkel',
            'category_id' => 6,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 205000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 5,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Pisau Gergaji Taman Universal, Peralatan Bengkel Banyak Alat 2021',
            'slug' => 'pisau-gergaji-taman-universal-peralatan-bengkel-banyak-alat-2021',
            'category_id' => 6,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 325000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 12,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'GERGAJI KAYU CAMEL 18"-GERGAJI KAYU GAGANG KARET',
            'slug' => 'gergaji-kayu-camel-18-gergaji-kayu-gagang-karet',
            'category_id' => 6,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 47000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 20,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'MESIN MINI DIE GRINDER 3MM UNTUK BENGKEL',
            'slug' => 'mesin-mini-die-grinder-3mm-untuk-bengkel',
            'category_id' => 7,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 400000,
            'disc_price' => 350000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 8,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Tekiro RYU Grinder Mesin Gurinda Gerinda Tangan 4',
            'slug' => 'tekiro-ryu-grinder-mesin-gurinda-gerinda-tangan-4',
            'category_id' => 7,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 282500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 15,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Mesin Grinda Doziro ZAG-1001 Tangan 4" 100mm',
            'slug' => 'mesin-grinda-doziro-zag-1001-tangan-4-100mm',
            'category_id' => 7,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 225000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 5,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Gerinda Tangan Tekiro Alat Teknik Alat Bengkel',
            'slug' => 'gerinda-tangan-tekiro-Alat-teknik-alat-bengkel',
            'category_id' => 7,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 325000,
            'disc_price' => 299000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 10,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Mesin Gerinda Mikro Poles 90 Derajat Untuk Bengkel',
            'slug' => 'mesin-gerinda-mikro-poles-90-derajat-untuk-bengkel',
            'category_id' => 7,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 655000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 1,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'TEKIRO RYU Mesin bor listrik 10 mm set koper 22 pcs',
            'slug' => 'tekiro-ryu-mesin-bor-listrik-10-mm-set-koper-22-pcs',
            'category_id' => 8,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 335000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 15,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Black + Decker Bor Listrik Hammer Drill Cordless 18 Volt',
            'slug' => 'black-+-decker-bor-listrik-hammer-drill-cordless-18-volt',
            'category_id' => 8,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 1000000,
            'disc_price' => 850000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 5,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Bosch Bor Tangan Listrik Impact dengan Mata Bor 33Pcs',
            'slug' => 'bosch-bor-tangan-listrik-impact-dengan-mata-bor-33pcs',
            'category_id' => 8,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 769000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 9,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Kepala Bor 13mm | mesin | travo las argon | besi | bengkel',
            'slug' => 'kepala-bor-13mm-|-mesin-|-travo-las-argon-|-besi-|-bengkel',
            'category_id' => 8,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 42500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 30,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Mesin Bor Listrik 10mm Bolak-Balik / Mesin Bor Tangan NRT-PRO 450 HD',
            'slug' => 'mesin-bor-listrik-10mm-bolak-Balik-mesin-bor-tangan-nrt-pro-450-hd',
            'category_id' => 8,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 185000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 8,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'TEKIRO CATOK DUDUK BIASA 3" RAGUM GT-BV1250',
            'slug' => 'tekiro-catok-duduk-biasa-3-ragum-gt-bv1250',
            'category_id' => 9,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 62000,
            'disc_price' => 575000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 12,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => ' TEKIRO CATOK 6" - RAGUM MEJA 6 INCI - PENJEPIT BESI',
            'slug' => 'tekiro-catok-6-ragum-meja-6-inci-penjepit-besi',
            'category_id' => 9,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 1719000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 2,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Ragum Catok Meja Mini 360 Derajat Bahan Aluminum Untuk Bengkel',
            'slug' => 'ragum-catok-meja-mini-360-derajat-bahan-aluminum-untuk-bengkel',
            'category_id' => 9,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 193500,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 18,
            'status' => 1,
            'trending' => 1
        ]);

        Product::create([
            'name' => 'Ragum Mini Clamp Catok Meja Penjepit Vice Table Bengkel Kecil',
            'slug' => 'ragum-mini-clamp-catok-meja-penjepit-vice-table-bengkel-kecil',
            'category_id' => 9,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 49000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 24,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Alat Set Perkakas Palu Tang Obeng Set Kunci Pas Cutter Meteran Kunci L',
            'slug' => 'alat-set-perkakas-palu-tang-obeng-set-kunci-pas-cutter-meteran-kunci-l',
            'category_id' => 10,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 75000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 5,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'PAKET HEMAT 1 box alat perkakas KRISBOW',
            'slug' => 'paket-hemat-1-box-alat-perkakas-krisbow',
            'category_id' => 10,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 375000,
            'disc_price' => 328000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 3,
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'PAKET HEMAT 1 box alat perkakas multifungsi',
            'slug' => 'paket-hemat-1-box-alat-perkakas-multifungsi',
            'category_id' => 10,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => 435000,
            'main_image' => 'https://picsum.photos/' . mt_rand(250, 350),
            'quantity' => 5,
            'status' => 1,
            'trending' => 1
        ]);
    }
}
