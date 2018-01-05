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
            'name' => 'Alphamals (Animal Vertebrate Families)',
            'brand' => 'Alphamals',
            'category_id' => 1,
            'details' => 'Alphamals - book one introduces the reader to vertebrate animals starting from A - Albatross, B - buffalo '
            .'through to Z -Zokor. Learn about classification of the animals, habitat, and the names of their female, males, young ones, group '
            .'and their classification as regards their feeding.',
            'selling_price' => '160000',
            'image_location' => 'images/products/alphamals.jpg',
            'status' => 'HOT'
        ], [
            'id' => 2,
            'name' => 'Alphamals (Colour me)',
            'brand' => 'Alphamals',
            'category_id' => 1,
            'details' => 'Alphamals is a blend of the words; Alphabets and Animals. Alphamals colour me introduces children to colouring. All the '
            .'families in Animal vertebrate families Book one are sketched for children to colour them using their own colour scheme or copying the one '
            .'in Alphamals (Animal Vertebrate families) Book one.',
            'selling_price' => '160000',
            'image_location' => 'images/products/alphamals-color-me.jpg',
            'status' => 'HOT'
        ], [
            'id' => 3,
            'name' => 'Alphamals (Sketch Book)',
            'brand' => 'Alphamals',
            'category_id' => 1,
            'details' => 'Alphamals Sketch Book is here to give children a platform to start sketching their way to becoming real artists',
            'selling_price' => '156000',
            'image_location' => 'images/products/alphamals-sketch-book.jpg',
            'status' => 'COLD'
        ], [
            'id' => 4,
            'name' => 'Alphabet Book (A child\'s first)',
            'brand' => 'Alphabet Book',
            'category_id' => 1,
            'details' => 'An introduction to the letters of the modern English Alphabet with words and images',
            'selling_price' => '140000',
            'image_location' => 'images/products/alphabet-book.jpg',
            'status' => 'COLD'
        ], [
            'id' => 5,
            'name' => 'Akwukwo Nsechalu',
            'brand' => 'Akwukwo Nsechalu',
            'category_id' => 1,
            'details' => 'A sketch book for children that are learning how to draw',
            'selling_price' => '100000',
            'image_location' => 'images/products/akwukwo-nsechalu.jpg',
            'status' => 'COLD'
        ], [
            'id' => 6,
            'name' => 'Numbers Book (A child\'s first)',
            'brand' => 'Numbers Book',
            'category_id' => 1,
            'details' => 'An introduction to numbers from 1 to 10 with words and images',
            'selling_price' => '130000',
            'image_location' => 'images/products/numbers-book.jpg',
            'status' => 'COLD'
        ], [
            'id' => 7,
            'name' => 'Imu Itee agba (learning to colour)',
            'brand' => 'Imu Itee agba',
            'category_id' => 1,
            'details' => 'A book for children learning to colour',
            'selling_price' => '165000',
            'image_location' => 'images/products/imu-itee-agba.jpg',
            'status' => 'COLD'
        ], [
            'id' => 8,
            'name' => 'Asamgbede (Playing cards)',
            'brand' => 'Asamgbede',
            'category_id' => 2,
            'details' => 'Asamgbede is a card game. It is good for teaching children addition and the Igbo names that are on the cards',
            'selling_price' => '120000',
            'image_location' => 'images/products/asamgbede.jpg',
            'status' => 'COLD'
        ], [
            'id' => 9,
            'name' => 'Asa ngosi (flash cards)',
            'brand' => 'Asangosi',
            'category_id' => 2,
            'details' => 'Asangosi (flash cards) introduces the big and small letters of Igbo language with images and words with translations to English, French, German and Spanish',
            'selling_price' => '110000',
            'image_location' => 'images/products/asa-ngosi.jpg',
            'status' => 'COLD'
        ], [
            'id' => 10,
            'name' => 'Arum (My body)',
            'brand' => 'Arum',
            'category_id' => 3,
            'details' => 'A drawn human body with labeling of the different parts of the body with translations in English and French',
            'selling_price' => '123000',
            'image_location' => 'images/products/arum.jpg',
            'status' => 'COLD'
        ], [
            'id' => 11,
            'name' => 'English Alphabet Chart',
            'brand' => 'English Alphabe Chart',
            'category_id' => 3,
            'details' => 'An introduction to the letters of the modern English Alphabet with images',
            'selling_price' => '140000',
            'image_location' => 'images/products/english-alphabet-chart.jpg',
            'status' => 'COLD'
        ], [
            'id' => 12,
            'name' => 'English Numbers Chart',
            'brand' => 'English Numbers Chart',
            'category_id' => 3,
            'details' => 'An introduction to the numbers (1 - 10) in English using images',
            'selling_price' => '130000',
            'image_location' => 'images/products/english-numbers-chart.jpg',
            'status' => 'COLD'
        ], [
            'id' => 13,
            'name' => 'Dual Face English Alphabet and Numbers Chart',
            'brand' => 'Dual Face English Alphabet and Numbers Chart',
            'category_id' => 3,
            'details' => 'An introduction to the letters of the modern english alphabet with images',
            'selling_price' => '110000',
            'image_location' => 'images/products/english-alphabet-chart.jpg',
            'status' => 'COLD'
        ], [
            'id' => 14,
            'name' => 'Nnukwu na Obele Mkpulu okwu Asusu Igbo',
            'brand' => 'Nnukwu na Obele Mkpulu okwu Asusu Igbo',
            'category_id' => 3,
            'details' => 'Well design written big and small letters of the igbo language alphabet, placed in different colour backgrounds',
            'selling_price' => '120000',
            'image_location' => 'images/products/nnukwu-na-obele-mkpulu-okwu.jpg',
            'status' => 'COLD'
        ], [
            'id' => 15,
            'name' => 'Onu ogugu na Igbo',
            'brand' => 'Onu ogugu na Igbo',
            'category_id' => 3,
            'details' => 'An introduction to numbers one to ten in Igbo, with images and translations of the words to English and French',
            'selling_price' => '150000',
            'image_location' => 'images/products/onu-ogugu-na-igbo.jpg',
            'status' => 'COLD'
        ], [
            'id' => 16,
            'name' => 'Mkpulu na okwu asusu Igbo',
            'brand' => 'Mkpulu na okwu asusu Igbo',
            'category_id' => 3,
            'details' => 'The Alphabet of the Igbo language, with words, images and translations of the Igbo words to English, French and German',
            'selling_price' => '120000',
            'image_location' => 'images/products/mkpulu-na-okwu-asusu-igbo.jpg',
            'status' => 'COLD'
        ]]);

    }
}
