<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = ['PHP', 'React', 'HTML/CSS'];

        foreach ($types as $type) {
            $newType = new Type();

            $newType->name = $type;
            $newType->description = $faker->sentence();
        }
    }
}
