<?php

use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trthread')->insert([
            'categoryid' => 1,
            'createdby' => 2,
            'threadname' => 'Google Dev',
            'threaddescription' => 'Android',
            'createddate' =>'2018/10/30',
            'isclosed' => '0'
        ]);

        DB::table('trthread')->insert([
            'categoryid' => 1,
            'createdby' => 1,
            'threadname' => 'Test',
            'threaddescription' => 'Testing',
            'createddate' =>'2018/10/30',
            'isclosed' => '0'
        ]);
    }
}
