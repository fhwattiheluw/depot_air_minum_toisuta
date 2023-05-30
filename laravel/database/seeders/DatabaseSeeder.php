<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('pengeluarans')->insert([
          'nama_pengeluaran' => "tutup botol",
          'id' => 1
      ]);

      DB::table('kostumers')->insert([
          'nama_kostumer' => 'kantor' . Str::random(10),
          'telp' => rand(111111111111111,9999999999999),
          'alamat' => Str::random(10)
      ]);

      DB::table('users')->insert([
          'name' => 'user' . Str::random(10),
          'email' => Str::random(15).'@gmail.com',
          'password' =>  Hash::make('12345678'),
          'level' => 'operator'
      ]);
    }
}
