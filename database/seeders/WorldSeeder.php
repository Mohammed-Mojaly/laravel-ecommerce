<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorldSeeder extends Seeder
{

    public function run()
    {
        $sql_file = public_path('laravel_ecommerce_world.sql');
        $db = [
            'host' => 'localhost',
            'database' => 'laravel_ecommerce',
            'username' => 'root',
            'password' => null,
        ];

        exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database={$db['database']} < $sql_file");
    }
}
