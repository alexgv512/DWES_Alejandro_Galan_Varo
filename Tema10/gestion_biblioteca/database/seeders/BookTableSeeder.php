<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importante para poder usar DB

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // insertamos datos en la tabla books
        DB::table('books')->insert([
            'title' => 'El Quijote',
            'author' => 'Miguel de Cervantes',
            'published_year' => 1605,
        ]);

        DB::table('books')->insert([
            'title' => 'El hobbit',
            'author' => 'J.R.R. Tolkien',
            'published_year' => 1937,
        ]);

        DB::table('books')->insert([
            'title' => 'El código Da Vinci',
            'author' => 'Dan Brown',
            'published_year' => 2003,
        ]);

        //
    }

    
}
