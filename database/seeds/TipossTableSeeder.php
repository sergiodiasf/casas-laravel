<?php

use Illuminate\Database\Seeder;

class TipossTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert(['nome'=>'basemant']);
        DB::table('tipos')->insert(['nome'=>'quitinete']);
        DB::table('tipos')->insert(['nome'=>'full house']);
    }
}
