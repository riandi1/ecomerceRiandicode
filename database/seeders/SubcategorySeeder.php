<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            //subcategorias de Celulares y tablets
            [
                'name' => 'Celulares y smartphones',
                'slug' => Str::slug('celulares y smartphones'),
                'color' => true,
                'category_id' => 1
            ],
            [
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares'),
                'category_id' => 1
            ],
            [
                'name' => 'Smartwaches o Reloj ',
                'slug' => Str::slug('Smartwaches o Reloj '),
                'category_id' => 1
            ],
            //Tv, audio y video
            [
                'name' => 'Tv y audio',
                'slug' => Str::slug('Tv y audio'),
                'category_id' => 2
            ],
            [
                'name' => 'Audios ',
                'slug' => Str::slug('Audios '),
                'category_id' => 2
            ],
            [
                'name' => 'Parlantes para carros',
                'slug' => Str::slug('Parlantes para carros'),
                'category_id' => 2
            ],
            //Consola y videojuegos
            [
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),
                'category_id' => 3
            ],
            [
                'name' => 'Play station',
                'slug' => Str::slug('Play station'),
                'category_id' => 3
            ],
            [
                'name' => 'Game Pc',
                'slug' => Str::slug('Game Pc'),
                'category_id' => 3
            ],
            [
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
                'category_id' => 3
            ],
            //Computacion
            [
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),
                'category_id' => 4
            ],
            [
                'name' => 'Pc escritorio',
                'slug' => Str::slug('Pc escritorio'),
                'category_id' => 4
            ],
            [
                'name' => 'Discos',
                'slug' => Str::slug('Discos'),
                'category_id' => 4
            ],
            [
                'name' => 'Mouse y teclados',
                'slug' => Str::slug('Mouse y teclados'),
                'category_id' => 4
            ],
            //Moda
            [
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color'=>true,
                'size'=>true,
                'category_id' => 5
            ],
            [
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color'=>true,
                'size'=>true,
                'category_id' => 5
            ],
            [
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
                'category_id' => 5
            ],
            [
                'name' => 'Anillos',
                'slug' => Str::slug('Anillos'),
                'category_id' => 5
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
