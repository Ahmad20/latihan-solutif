<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create('id_ID');
        for ($i = 0; $i <= 50; $i++){
            DB::table('mahasiswa')->insert([
                'nim' => $faker->nik(),
                'name' => $faker->name(),
                'jurusan' => $faker->word(),
                // 'password' => \bcrypt($faker->word()),
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ]);
            DB::table('mata_kuliah')->insert([
                'name' => $faker->word(),
                'sks' => $faker->numberBetween(1, 4),
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ]);
        }  
    }
}
