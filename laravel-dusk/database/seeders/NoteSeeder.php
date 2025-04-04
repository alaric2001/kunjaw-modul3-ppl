<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;
use Faker\Factory as Faker;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 25; $i++) {
            Note::create([
                'penulis_id' => rand(1, 2),
                'judul' => ucwords(implode(' ', $faker->words(3))),
                // 'judul' => $faker->sentence(3), // Contoh: "Belajar Laravel Dasar"
                'isi' => $faker->paragraphs(3, true), // 3 paragraf teks acak
            ]);
        }
    }
}
