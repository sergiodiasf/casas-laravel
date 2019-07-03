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
            'nome_cliente' => 'Julho do caminhao',
            'email' => 'tt@tt.com',
            'telefone' => '454654654',
            'dias' => '180',
            'casa_id' =>  '2',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);
    }
}
