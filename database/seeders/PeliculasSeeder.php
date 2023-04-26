<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peliculas')->insert([
            'titulo' => 'M3GAN',
            'id_thmdb' => '536554',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/d9nBoowhjiiYc4FBNtQkPY7c11H.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/rrYrO4N6f6AvuK2qCGW1lP0JfRQ.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'Black Adam',
            'id_thmdb' => '436270',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/3zXceNTtyj5FLjwQXuPvLYK5YYL.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/iAgriz8SgsbFNdxRDp0H4G6ihzC.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'Pantera Negra: Wakanda por siempre',
            'id_thmdb' => '505642',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/nl3Fy48dMaEV9oljX6Ah9cCoOlf.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/u4lFqebuxyktrhgy46cUiCmbqO4.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'Llaman a la puerta',
            'id_thmdb' => '631842',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/4Zna9CvyzaAgejsErmyXmHC64Dd.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/3x2UtOxRwE3rikRhYqBRXq2kDte.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'Gato con Botas: El último deseo',
            'id_thmdb' => '315162',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/1wLFPmkT2x6qjVyShv8ErJox9Qx.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/dO2y8j12P7YKF5R0KhDMLQP7BI7.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'Bodas de Plomo',
            'id_thmdb' => '758009',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/psfz1uOftyclRUazH7KenxvH3Lx.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/rYjWruRR5UEstLg4DjA6E1pIu2b.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'Avatar: El camino del agua',
            'id_thmdb' => '76600',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/kUAG4ZQcsNbRyiPyAr3hLdsVgAq.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/5axDhsRkfTy2fHJcKP66DmlJdDp.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'La elefanta del Mago',
            'id_thmdb' => '776835',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/qsIlpIFNavxMZlE0o71LwvUXOTf.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/6qjWwffUqjJQ3y6734fhIBce8NS.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'Pinocho de Guillermo del Toro',
            'id_thmdb' => '555604',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/mJLFkiATSjU9sbtblR1yFWhHs4h.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/nOl1hZkjWW1T3O6axSca9ZQo3HS.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'JUNG_E',
            'id_thmdb' => '843794',
            'img_thumb' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/42qUjPRefhCaS9Ln4kj2aoygW2w.jpg',
            'img_portada' => 'https://image.tmdb.org/t/p/w500/rzJ3ognamp54A0rqz5k2MNx7KMD.jpg',
            'url_1080' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_720' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'url_480' => 'https://download1486.mediafire.com/ve0nm5mk0d2gyGp4L7911H9Jh3EAt7yNvAlkzncUYH3sgR-CDB8gg82-gwV25Tt-UvNCt1_j6q5ErFnFlLpzFOOIgzZW-Q/6udcu6b0onjnuv5/mucho_de_mi.mp4',
            'active' => 'true',
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
    }
}


