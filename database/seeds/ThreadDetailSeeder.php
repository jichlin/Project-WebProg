<?php

use Illuminate\Database\Seeder;

class ThreadDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trthreaddetails')->insert([
            'threadid' => 1,
            'post' => 'Gud Job',
            'postedby' => 2,
            'postedDate' =>'2018/10/30',
        ]);
        DB::table('trthreaddetails')->insert([
            'threadid' => 1,
            'post' => 'lol',
            'postedby' => 1,
            'postedDate' =>'2018/10/30',
        ]);
        DB::table('trthreaddetails')->insert([
            'threadid' => 2,
            'post' => 'Troll',
            'postedby' => 2,
            'postedDate' =>'2018/10/30',
        ]);

    }
}
