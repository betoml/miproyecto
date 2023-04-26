<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')->insert([
            'titulo' => 'YOU',
            'id_thmdb_series' => '78191',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/1xO8LLhzohWjU9BoT8PNv8WQ57n.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/tZZxlFkz1rQehh7XZqXUbk13xPX.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')

        ]);
        DB::table('series')->insert([
            'titulo' => 'Euphoria',
            'id_thmdb_series' => '85552',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/288q0JefZUuTfqUG2qzPTCZYuAL.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/4rnNs0ukZ7GeJHVZrKNSIrM9Fbi.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')

        ]);
        DB::table('series')->insert([
            'titulo' => 'La Casa del Dragón',
            'id_thmdb_series' => '94997',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/goFG8C4gRIfidUzYln5YLstmwGp.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/abZMSJ0xRlTgmarBFEW3giEaraQ.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')

        ]);
        DB::table('series')->insert([
            'titulo' => 'La Brea',
            'id_thmdb_series' => '128839',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/wEo5pzSZ3MF4EzNvY2R1OZNX266.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/lygdnltzNQM8Ks6TtPsImou6f3A.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')

        ]);
        DB::table('series')->insert([
            'titulo' => 'Soy Georgina',
            'id_thmdb_series' => '156077',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/fcggR2wH0BVD2VxqQZozX1OzXUJ.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/cLI7E3f2esXgLN9GjcoPJp4fpSB.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')

        ]);
        DB::table('series')->insert([
            'titulo' => 'Peaky Blinders',
            'id_thmdb_series' => '60574',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/dYAeYkRqDfQrMGHdY7hrtllSPTu.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/8qPdsHxxJU493XbjeYAXStRo7z.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')

        ]);
        DB::table('series')->insert([
            'titulo' => 'La Ley de los Audaces',
            'id_thmdb_series' => '37680',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/6ZDGeUh4i10t3xAI7UncF9P9vZP.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/94f6zJyjWqKPqgTE0C3aRo0TveN.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')

        ]);
        DB::table('series')->insert([
            'titulo' => 'Dejémonos de Vargas',
            'id_thmdb_series' => '206164',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/d0bthLld2QnL0qAoeSkfDa639pz.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/d0bthLld2QnL0qAoeSkfDa639pz.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')

        ]);
        DB::table('series')->insert([
            'titulo' => 'Gotham Knights',
            'id_thmdb_series' => '195868',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/5riy7SdIhMhhYcDqeEOICVvXEHS.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/tZZxlFkz1rQehh7XZqXUbk13xPX.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('series')->insert([
            'titulo' => 'The Mandalorian',
            'id_thmdb_series' => '82856',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/mzzZKJ4fvwib8Fty1tv4Vtp9R0b.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/2LibH7EwwQJgEggPjw2QaWfs8Za.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
        DB::table('series')->insert([
            'titulo' => 'The Last of Us',
            'id_thmdb_series' => '82856',
            'img_thumb_series' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/8HIwg09k89FH7yqoy7loiVfId3U.jpg',
            'img_portada_series' => 'https://image.tmdb.org/t/p/w500/fLQxjFqJG2UWgMjAcXfQ8EK2aCj.jpg',
            'active' => true,
            'created_at' => date('Y:m:d h:i:s'),
            'updated_at' => date('Y:m:d h:i:s')
        ]);
    }
}
