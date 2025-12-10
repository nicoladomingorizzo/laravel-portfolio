<?php

namespace Database\Seeders;

use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $tags = [
            'PHP',
            'JavaScript',
            'Python',
            'JavaScript',
            'TypeScript',
            'HTML5',
            'CSS3',
            'Laravel',
            'Node.js',
            'Express.js',
            'Django',
            'React',
            'Vue.js',
            'Angular',
            'jQuery',
            'MySQL',
            'PostgreSQL',
            'MongoDB',
            'SQLite',
            'Redis',
            'Git',
            'Docker',
            'AWS / GCP / Azure',
            'Vercel / Netlify',
            'CI/CD',
            'Bootstrap',
            'Tailwind CSS',
            'Sass / Less'
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->color = $faker->hexColor();
            $newTag->save();
        }
    }
}
