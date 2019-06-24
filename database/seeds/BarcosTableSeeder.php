<?php

use Illuminate\Database\Seeder;

class BarcosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('barcos')->insert([
            'categoria' => 'dorna',
            'modelo' => 'FOCKER 160',
            'marca_id' => 3,
            'ano' => 2019,
            'preco' => 27500,
            'diaria' => 7500,
            'tamanho' => '4.87 m',
            'acompanhamentos' => 'Garantia de 6 Meses',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);

        DB::table('barcos')->insert([
            'categoria' => 'dorna',
            'modelo' => 'FOCKER 190',
            'marca_id' => 1,
            'ano' => 2017,
            'preco' => 17500,
            'diaria' => 7500,
            'tamanho' => '5.87 m',
            'acompanhamentos' => 'Garantia de 9 Meses',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);
  
    }
}
