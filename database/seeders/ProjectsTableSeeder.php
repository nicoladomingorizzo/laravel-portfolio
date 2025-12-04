<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project();

            $newProject->title = $faker->sentence(5);
            $newProject->content = $faker->paragraph(10);
            $newProject->tools = $faker->words(10, true);

            $newProject->save();
        }
    }
}
