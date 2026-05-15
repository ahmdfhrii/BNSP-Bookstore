<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $books = [
            [
                'category_id' => 1,
                'title'       => 'Pengantar Pemrograman Javascript',
                'author'      => 'Jubilee Enterprise',
                'description' => 'Berisi panduan lengkap yang disusun untuk membantu siapa saja, baik pemula maupun pembelajar mandiri, yang ingin menguasai bahasa pemrograman paling populer di dunia web.',
                'price'       => 99000,
                'stock'       => 15,
                'image'       => 'js.png',
            ],
            [
                'category_id' => 3,
                'title'       => 'Bumi Manusia',
                'author'      => 'Pramoedya Ananta Toer',
                'description' => 'Kisah epik Minke di era kebangkitan nasional yang penuh dengan intrik dan perjuangan.',
                'price'       => 180000,
                'stock'       => 20,
                'image'       => 'bumi-manusia.png',
            ],
            [
                'category_id' => 8, 
                'title'       => 'Atomic Habits',
                'author'      => 'James Clear',
                'description' => 'Cara mudah dan terbukti untuk membentuk kebiasaan baik dan menghilangkan kebiasaan buruk setiap harinya.',
                'price'       => 86400,
                'stock'       => 100,
                'image'       => 'atomic-habbits.png',
            ],
            [
                'category_id' => 4,
                'title'       => 'The Psychology of Money',
                'author'      => 'Morgan Housel',
                'description' => 'Pelajaran abadi mengenai kekayaan, ketamakan, dan kebahagiaan dalam mengelola keuangan.',
                'price'       => 90000,
                'stock'       => 25,
                'image'       => 'the-psychologyof-money.png',
            ]
        ];

        foreach ($books as $book) {
            Book::create([
                'category_id' => $book['category_id'],
                'title'       => $book['title'],
                'slug'        => Str::slug($book['title']),
                'author'      => $book['author'],
                'description' => $book['description'],
                'price'       => $book['price'],
                'stock'       => $book['stock'],
                'image'       => $book['image'],
            ]);
        }
    }
}
