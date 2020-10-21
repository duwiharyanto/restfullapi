<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class pegawai extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('pegawai')->insert([
        // 	'nama' => 'Joni',
        // 	'alamat' => 'bantul',
        // 	'departmen_id' => 1,
        // 	'no_hp' => '0857245454545s'
        // ]);
        $faker = Faker::create('id_ID');
        for($i=1;$i<=10;$i++){ 
        DB::table('pegawai')->insert([
            'nama' => $faker->name,
            'alamat' =>$faker->address,
            'departmen_id' => 1,
            'no_hp' =>'bantul',
        ]);
        }
    }
}