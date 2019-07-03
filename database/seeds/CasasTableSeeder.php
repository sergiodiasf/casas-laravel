<?php

use Illuminate\Database\Seeder;

class CasasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('casas')->insert([
            'categoria' => 'categoria',
            'modelo' => 'MODELO',
            'tipo_id' => 1,
            'ano' => 2019,
            'preco' => 42750,
            'diaria' => 1500,
            'tamanho' => '40.87 sqft',
            'acompanhamentos' => 'Luz incluso',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);

        DB::table('casas')->insert([
            'categoria' => 'categoria',
            'modelo' => 'Modelo',
            'tipo_id' => 1,
            'ano' => 2017,
            'preco' => 175000,
            'diaria' => 1500,
            'tamanho' => '5.87 m',
            'acompanhamentos' => 'Tem Banheiro incluso',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);
  
    }
}
