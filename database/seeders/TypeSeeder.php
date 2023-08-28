<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = [
            [
                'name' => 'Web Application',
                'description' => 'A project involving the development of a web-based application or platform.',
            ],
            [
                'name' => 'Mobile App',
                'description' => 'Creating a mobile application for iOS or Android devices.',
            ],
            [
                'name' => 'E-commerce',
                'description' => 'Building an online store for selling products and services.',
            ],
            [
                'name' => 'CMS',
                'description' => 'Developing a content management system for easy content publishing.',
            ],
            [
                'name' => 'Social Network',
                'description' => 'Creating a platform for users to connect and share content.',
            ],
            [
                'name' => 'Game Development',
                'description' => 'Designing and building interactive games for various platforms.',
            ],
            [
                'name' => 'IoT Project',
                'description' => 'Working on an Internet of Things project involving connected devices.',
            ],
            [
                'name' => 'Data Analytics',
                'description' => 'Analyzing and visualizing data to gain insights and make decisions.',
            ],
            [
                'name' => 'AI/ML Project',
                'description' => 'Developing projects related to artificial intelligence or machine learning.',
            ],
            [
                'name' => 'Portfolio Website',
                'description' => 'Creating a personal portfolio website to showcase your work.',
            ],
        ];
        
        foreach($types as $type){
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->created_at = $faker->date();
            $newType->slug = $faker->slug();
            $newType->description = $type['description'];
            $newType->save();
        }
        
    }
}
