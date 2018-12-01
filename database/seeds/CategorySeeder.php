<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('msCategory')->insert([
            'categoryID' => 1,
            'categoryName' => 'Science'
        ]);
        DB::table('msCategory')->insert([
            'categoryID' => 2,
            'categoryName' => 'Programming'
        ]);
        DB::table('msCategory')->insert([
            'categoryID' => 3,
            'categoryName' => 'International'
        ]);
    }
}
