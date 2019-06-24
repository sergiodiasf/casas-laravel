<?php

use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert(['nome'=>'Azimut Yachts']);
        DB::table('marcas')->insert(['nome'=>'Cimitarra Yachts']);
        DB::table('marcas')->insert(['nome'=>'NX Boats']);
        DB::table('marcas')->insert(['nome'=>'Royal Mariner']);
        DB::table('marcas')->insert(['nome'=>'Schaefer Yachts']);
        DB::table('marcas')->insert(['nome'=>'Sessa Marine']);
        DB::table('marcas')->insert(['nome'=>'Schaefer Yachts']);
        DB::table('marcas')->insert(['nome'=>'Beneteau']);
    }
}
