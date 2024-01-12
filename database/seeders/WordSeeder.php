<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql_file = public_path('word_ecommerce.sql');
        $db = [
            'host' => '127.0.0.1',
            'database' => 'ecommerce',
            'username' => 'root',
            'password' => null,
        ];
        exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database={$db['database']} < $sql_file");
    }
}