<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        DB::table('forum_categories')->insert([
            'title' => 'Mahallah',
            'description' => 'Mahallah in IIUM',  
        ]);
        DB::table('forum_categories')->insert([
            'title' => 'Kulliyah',
            'description' => 'Kuliyyah in IIUM',  
        ]);
        DB::table('forum_categories')->insert([
            'title' => 'CLUB and SOCIETY',
            'description' => 'Club and Society in IIUM',  
        ]);
    }
}
