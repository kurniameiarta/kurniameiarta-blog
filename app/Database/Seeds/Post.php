<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\Posts;
use Cocur\Slugify\Slugify;
use Faker\Factory;

class Post extends Seeder
{
    public function run()
    {
        // generate data with uuid
        $faker = Factory::create();
        $slugify = new Slugify();
        $model = new Posts();

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(6);
            $slug = $slugify->slugify($title);
            $content = $faker->paragraphs(10, true);

            $model->insert([
                'id_post' => $faker->uuid(),
                'title' => $title,
                'slug' => $slug,
                'body' => $content,
                'image' => 'default.jpg',
                'status' => 'draft',
                'created_at' => $faker->date('Y-m-d H:i:s'),
                'updated_at' => $faker->date('Y-m-d H:i:s'),
            ]);
        }
    }
}
