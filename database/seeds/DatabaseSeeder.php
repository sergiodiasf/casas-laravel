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
        $this->call(TipossTableSeeder::class);

        $this->call(CasasTableSeeder::class);
        $this->call(PropostasTableSeeder::class);
        $this->call(PropostaAluguelTableSeeder::class);
    }
}
