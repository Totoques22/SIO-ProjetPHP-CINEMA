<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Film;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. CRÉATION DES GENRES
        $action = Genre::create(['libGenre' => 'Action']);
        $scifi = Genre::create(['libGenre' => 'Science-Fiction']);
        $comedie = Genre::create(['libGenre' => 'Comedie']);
        $drame = Genre::create(['libGenre' => 'Drame']);
        $animation = Genre::create(['libGenre' => 'Animation']);
        $fantastique = Genre::create(['libGenre' => 'Fantastique']);
        $thriller = Genre::create(['libGenre' => 'Thriller']);

        // 2. CRÉATION DES FILMS (Un par genre)

        // Film d'Action
        Film::create([
            'titreFil' => 'John Wick',
            'descFil' => 'Un ancien tueur a gages reprend du service.',
            'imgFil' => 'johnwick.jpg',
            'dureFil' => 101,
            'idGenre' => $action->idGenre
        ]);

        // Film de Science-Fiction
        Film::create([
            'titreFil' => 'Avatar',
            'descFil' => 'Un marine paraplegique infiltre une planete extraterrestre.',
            'imgFil' => 'avatar.jpg',
            'dureFil' => 162,
            'idGenre' => $scifi->idGenre
        ]);

        // Film de Comédie
        Film::create([
            'titreFil' => 'La Grande Vadrouille',
            'descFil' => 'Deux francais aident des aviateurs anglais.',
            'imgFil' => 'vadrouille.jpg',
            'dureFil' => 132,
            'idGenre' => $comedie->idGenre
        ]);

        // Film Dramatique
        Film::create([
            'titreFil' => 'Titanic',
            'descFil' => 'Une romance historique sur le paquebot insubmersible.',
            'imgFil' => 'titanic.jpg',
            'dureFil' => 195,
            'idGenre' => $drame->idGenre
        ]);

        // Film d'Animation
        Film::create([
            'titreFil' => 'Le Roi Lion',
            'descFil' => 'Un jeune lion doit reprendre sa place legitime de roi.',
            'imgFil' => 'roilion.jpg',
            'dureFil' => 88,
            'idGenre' => $animation->idGenre
        ]);

        // Film Fantastique
        Film::create([
            'titreFil' => 'Harry Potter a l ecole des sorciers',
            'descFil' => 'Un orphelin decouvre qu il est un sorcier celebre.',
            'imgFil' => 'harrypotter.jpg',
            'dureFil' => 152,
            'idGenre' => $fantastique->idGenre
        ]);

        // Film Thriller
        Film::create([
            'titreFil' => 'Joker',
            'descFil' => 'La descente aux enfers d un comique rate a Gotham.',
            'imgFil' => 'joker.jpg',
            'dureFil' => 122,
            'idGenre' => $thriller->idGenre
        ]);
    }
}
