<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Faker\Generator as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data_courses = config('courses');
        foreach ($data_courses as $item) {
            $course = new Course();
            $course->nome_corso = $item['nome_corso'];
            $course->posti_disponibili = $item['posti_disponibili'];
            $course->cap_sede_corso = $item['cap_sede_corso'];
            $course->città_di_svolgimento = $item['città_di_svolgimento'];
            $course->indirizzo_di_svolgimento = $item['indirizzo_di_svolgimento'];
            $course->provincia = $item['provincia'];
            $course->direttore_corso = $item['direttore_corso'];
            $course->docenti_corso = $item['docenti_corso'];
            $course->inizio_di_svolgimento = $item['inizio_di_svolgimento'];
            $course->fine_svolgimento = $item['fine_svolgimento'];
            $course->genere_corso = $item['genere_corso'];
            $course->numero_autorizzazione = $faker->randomDigit();  
            $course->durata_corso = $item['durata_corso'];
            $course->save();
        }
    }
}
