<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          ['name' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('1234')]
        ]);
        
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Horor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['nama_kategori' => 'Komedi',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['nama_kategori' => 'Aksi',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['nama_kategori' => 'Drama',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
           ]);
    }
}
