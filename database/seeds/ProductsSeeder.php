<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([[
            'id' => 1,
            'name' => 'phone 1',
            'brand' => 'Iphone',
            'category_id' => 1,
            'details' => 'Number 1 phone',
            'selling_price' => '160000',
            'image_location' => 'images/products/phone1.jpg',
            'status' => 'HOT'
        ], [
            'id' => 2,
            'name' => 'phone 2',
            'brand' => 'Iphone',
            'category_id' => 1,
            'details' => 'Number 2 phone',
            'selling_price' => '160000',
            'image_location' => 'images/products/phone2.jpg',
            'status' => 'HOT'
        ], [
            'id' => 3,
            'name' => 'phone 3',
            'brand' => 'Iphone',
            'category_id' => 1,
            'details' => 'Number 3 phone',
            'selling_price' => '156000',
            'image_location' => 'images/products/phone3.jpg',
            'status' => 'COLD'
        ], [
            'id' => 4,
            'name' => 'phone 4',
            'brand' => 'Iphone',
            'category_id' => 1,
            'details' => 'Number 4 phone',
            'selling_price' => '140000',
            'image_location' => 'images/products/phone4.jpg',
            'status' => 'COLD'
        ], [
            'id' => 5,
            'name' => 'phone 5',
            'brand' => 'Iphone',
            'category_id' => 1,
            'details' => 'Number 5 phone',
            'selling_price' => '100000',
            'image_location' => 'images/products/phone5.jpg',
            'status' => 'COLD'
        ], [
            'id' => 6,
            'name' => 'phone 6',
            'brand' => 'Iphone',
            'category_id' => 1,
            'details' => 'Number 6 phone',
            'selling_price' => '130000',
            'image_location' => 'images/products/phone6.jpg',
            'status' => 'COLD'
        ], [
            'id' => 7,
            'name' => 'phone 7',
            'brand' => 'lg',
            'category_id' => 1,
            'details' => 'Number 7 phone',
            'selling_price' => '165000',
            'image_location' => 'images/products/phone7.jpg',
            'status' => 'COLD'
        ], [
            'id' => 8,
            'name' => 'phone 8',
            'brand' => 'samsung',
            'category_id' => 1,
            'details' => 'Number 8 phone',
            'selling_price' => '120000',
            'image_location' => 'images/products/phone8.jpg',
            'status' => 'COLD'
        ], [
            'id' => 9,
            'name' => 'phone 9',
            'brand' => 'Iphone',
            'category_id' => 1,
            'details' => 'Number 9 phone',
            'selling_price' => '110000',
            'image_location' => 'images/products/phone9.jpg',
            'status' => 'COLD'
        ], [
            'id' => 10,
            'name' => 'phone 10',
            'brand' => 'Iphone',
            'category_id' => 1,
            'details' => 'Number 10 phone',
            'selling_price' => '123000',
            'image_location' => 'images/products/phone10.jpg',
            'status' => 'COLD'
        ], [
            'id' => 11,
            'name' => 'phone 11',
            'brand' => 'blackberry',
            'category_id' => 1,
            'details' => 'Number 11 phone',
            'selling_price' => '140000',
            'image_location' => 'images/products/phone11.jpg',
            'status' => 'COLD'
        ], [
            'id' => 12,
            'name' => 'phone 12',
            'brand' => 'nokia',
            'category_id' => 1,
            'details' => 'Number 12 phone',
            'selling_price' => '130000',
            'image_location' => 'images/products/phone12.jpg',
            'status' => 'COLD'
        ], [
            'id' => 13,
            'name' => 'phone 13',
            'brand' => 'motorola',
            'category_id' => 1,
            'details' => 'Number 13 phone',
            'selling_price' => '110000',
            'image_location' => 'images/products/phone13.jpg',
            'status' => 'COLD'
        ], [
            'id' => 14,
            'name' => 'phone 14',
            'brand' => 'sony',
            'category_id' => 1,
            'details' => 'Number 14 phone',
            'selling_price' => '120000',
            'image_location' => 'images/products/phone14.jpg',
            'status' => 'COLD'
        ], [
            'id' => 15,
            'name' => 'phone 15',
            'brand' => 'lg',
            'category_id' => 1,
            'details' => 'Number 15 phone',
            'selling_price' => '150000',
            'image_location' => 'images/products/phone15.jpg',
            'status' => 'COLD'
        ], [
            'id' => 16,
            'name' => 'phone 16',
            'brand' => 'gionee',
            'category_id' => 1,
            'details' => 'Number 16 phone',
            'selling_price' => '120000',
            'image_location' => 'images/products/phone16.jpg',
            'status' => 'COLD'
        ], [
            'id' => 17,
            'name' => 'phone 17',
            'brand' => 'xiaomi',
            'category_id' => 1,
            'details' => 'Number 17 phone',
            'selling_price' => '130000',
            'image_location' => 'images/products/phone17.jpg',
            'status' => 'COLD'
        ], [
            'id' => 18,
            'name' => 'phone 18',
            'brand' => 'htc',
            'category_id' => 1,
            'details' => 'Number 18 phone',
            'selling_price' => '120000',
            'image_location' => 'images/products/phone18.jpg',
            'status' => 'COLD'
        ], [
            'id' => 19,
            'name' => 'phone 19',
            'brand' => 'samsung',
            'category_id' => 1,
            'details' => 'Number 19 phone',
            'selling_price' => '160000',
            'image_location' => 'images/products/phone19.jpg',
            'status' => 'COLD'
        ]]);

        DB::table('products')->insert([[
            'id' => 20,
            'name' => 'Laptop 1',
            'brand' => 'compaq',
            'category_id' => 2,
            'details' => 'Number 1 laptop',
            'selling_price' => '160000',
            'image_location' => 'images/products/laptop1.jpg',
            'status' => 'HOT'
        ], [
            'id' => 21,
            'name' => 'Laptop 2',
            'brand' => 'lenovo',
            'category_id' => 2,
            'details' => 'Number 2 laptop',
            'selling_price' => '160000',
            'image_location' => 'images/products/laptop2.jpg',
            'status' => 'HOT'
        ], [
            'id' => 22,
            'name' => 'Laptop 3',
            'brand' => 'dell',
            'category_id' => 2,
            'details' => 'Number 3 laptop',
            'selling_price' => '156000',
            'image_location' => 'images/products/laptop3.jpg',
            'status' => 'COLD'
        ], [
            'id' => 23,
            'name' => 'Laptop 4',
            'brand' => 'hp',
            'category_id' => 2,
            'details' => 'Number 4 laptop',
            'selling_price' => '140000',
            'image_location' => 'images/products/laptop4.jpg',
            'status' => 'HOT'
        ], [
            'id' => 24,
            'name' => 'Laptop 5',
            'brand' => 'samsung',
            'category_id' => 2,
            'details' => 'Number 5 laptop',
            'selling_price' => '100000',
            'image_location' => 'images/products/laptop5.jpg',
            'status' => 'HOT'
        ], [
            'id' => 25,
            'name' => 'Laptop 6',
            'brand' => 'apple',
            'category_id' => 2,
            'details' => 'Number 6 laptop',
            'selling_price' => '130000',
            'image_location' => 'images/products/laptop6.jpg',
            'status' => 'COLD'
        ], [
            'id' => 26,
            'name' => 'Laptop 7',
            'brand' => 'xiaomi',
            'category_id' => 2,
            'details' => 'Number 7 laptop',
            'selling_price' => '165000',
            'image_location' => 'images/products/laptop7.jpg',
            'status' => 'COLD'
        ], [
            'id' => 27,
            'name' => 'Laptop 8',
            'brand' => 'lg',
            'category_id' => 2,
            'details' => 'Number 8 laptop',
            'selling_price' => '120000',
            'image_location' => 'images/products/laptop8.jpg',
            'status' => 'COLD'
        ], [
            'id' => 28,
            'name' => 'Laptop 9',
            'brand' => 'compaq',
            'category_id' => 2,
            'details' => 'Number 9 laptop',
            'selling_price' => '110000',
            'image_location' => 'images/products/laptop9.jpg',
            'status' => 'COLD'
        ], [
            'id' => 29,
            'name' => 'Laptop 10',
            'brand' => 'lenovo',
            'category_id' => 2,
            'details' => 'Number 10 laptop',
            'selling_price' => '123000',
            'image_location' => 'images/products/laptop10.jpg',
            'status' => 'COLD'
        ], [
            'id' => 30,
            'name' => 'Laptop 11',
            'brand' => 'dell',
            'category_id' => 2,
            'details' => 'Number 11 laptop',
            'selling_price' => '140000',
            'image_location' => 'images/products/laptop11.jpg',
            'status' => 'COLD'
        ], [
            'id' => 31,
            'name' => 'Laptop 12',
            'brand' => 'apple',
            'category_id' => 2,
            'details' => 'Number 12 laptop',
            'selling_price' => '130000',
            'image_location' => 'images/products/laptop12.jpg',
            'status' => 'COLD'
        ], [
            'id' => 32,
            'name' => 'Laptop 13',
            'brand' => 'hp',
            'category_id' => 2,
            'details' => 'Number 13 laptop',
            'selling_price' => '110000',
            'image_location' => 'images/products/laptop13.jpg',
            'status' => 'COLD'
        ], [
            'id' => 33,
            'name' => 'Laptop 14',
            'brand' => 'samsung',
            'category_id' => 2,
            'details' => 'Number 14 laptop',
            'selling_price' => '120000',
            'image_location' => 'images/products/laptop14.jpg',
            'status' => 'COLD'
        ], [
            'id' => 34,
            'name' => 'Laptop 15',
            'brand' => 'acer',
            'category_id' => 2,
            'details' => 'Number 15 laptop',
            'selling_price' => '150000',
            'image_location' => 'images/products/laptop15.jpg',
            'status' => 'COLD'
        ]]);
    }
}
