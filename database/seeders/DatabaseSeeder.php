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
            'role_as' => '1'
        ]);

        Category::create([
            'name' => 'Palu',
            'slug' => 'palu',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/100'
        ]);

        Category::create([
            'name' => 'Obeng',
            'slug' => 'obeng',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/100'
        ]);

        Category::create([
            'name' => 'Kunci',
            'slug' => 'kunci',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/100'
        ]);

        Category::create([
            'name' => 'Dongkrak',
            'slug' => 'dongkrak',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/100'
        ]);

        Category::create([
            'name' => 'Lainnya',
            'slug' => 'lainnya',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat architecto aliquid blanditiis.',
            'status' => '1',
            'popular' => '0',
            'main_image' => 'https://picsum.photos/100'
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);

        Product::create([
            'name' => 'Product Sample',
            'slug' => 'product-sample-' . mt_rand(1111111, 9999999),
            'category_id' => mt_rand(1, 6),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde libero fugit praesentium quae corporis numquam? Ex labore adipisci magni aliquid sapiente quaerat eos expedita quia quos, sequi amet! Doloremque, odit!',
            'ori_price' => mt_rand(100000, 500000),
            'disc_price' => mt_rand(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => mt_rand(15, 100),
            'status' => 1,
            'trending' => 0
        ]);
    }
}
