<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Core\Uuid;

class User extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $data = [
            'id_user' => $faker->uuid,
            'name' => 'Wahyu Singgih Wicaksono',
            'username' => 'wahyusinggihw',
            'password' => password_hash('wahyusinggihw', PASSWORD_DEFAULT),
            'email' => 'wahyu@gmail.com',
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('users')->insert($data);
    }
}
