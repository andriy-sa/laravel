<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        /* roles */
        DB::table('roles')->insert([
           'name' => 'admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'user'
        ]);

        /* user */

        DB::table('users')->insert([
            'name'     => 'Andriy',
            'email'    => 'andriy_smolyar_0@mail.ru',
            'password' => bcrypt('password'),
        ]);

        DB::table('users_roles')->insert([
            'user_id' => 1,
            'role_id' => 2,
        ]);

        /* categories */
        DB::table('categories')->insert([
            'uk_title' => 'Електрика',
            'ru_title' => 'Электрика',
            'icon'     => 'fa-battery-three-quarters ',
            'url'      => 'electronics',
        ]);
        DB::table('categories')->insert([
            'uk_title' => 'Двері, вікна',
            'ru_title' => 'Двери, окна',
            'icon'     => 'fa-hospital-o',
            'url'      => 'vikna-dveri',
        ]);

        /* advertisements */
        DB::table('advertisements')->insert([
            'title'       => 'first',
            'description' => 'description',
            'url'         => 'first',
            'category_id' => 1,
            'user_id'     => 1,
            'created_at'  => date('Y-m-d H:i:s')
        ]);

        DB::table('advertisements')->insert([
            'title'       => 'second',
            'description' => 'description',
            'url'         => 'second',
            'category_id' => 2,
            'user_id'     => 1,
            'created_at'  => date('Y-m-d H:i:s')
        ]);
        DB::table('advertisements')->insert([
            'title'       => 'third',
            'description' => 'description',
            'url'         => 'third',
            'category_id' => 1,
            'user_id'     => 1,
            'created_at'  => date('Y-m-d H:i:s')
        ]);
    }
}
