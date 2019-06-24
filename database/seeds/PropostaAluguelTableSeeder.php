<?php

use Illuminate\Database\Seeder;

class PropostaAluguelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('proposta_aluguels')->insert([
            'nome_cliente' => 'Jean Manezinho',
            'email' => 'tt@tt.com',
            'telefone' => '654654654',
            'dias' => '10',
            'barco_id' =>  '2',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);
    }
}
