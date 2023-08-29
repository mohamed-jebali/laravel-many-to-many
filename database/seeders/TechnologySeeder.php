<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'tecnology' => 'Vue',
                'native_language' => 'Javascript'
            ],
            [
                'tecnology' => 'Angular',
                'native_language' => 'Typecript'
            ],
            [
                'tecnology' => 'React',
                'native_language' => 'Javascript'
            ],
            [
                'tecnology' => 'Laravel',
                'native_language' => 'PHP'
            ],
        ];


        foreach($technologies as $tecnology){
            $newTechology = new Technology;
            $newTechology->name = $tecnology['tecnology'];
            $newTechology->native_language = $tecnology['native_language'];
            $newTechology->save();

        }
    }
}
