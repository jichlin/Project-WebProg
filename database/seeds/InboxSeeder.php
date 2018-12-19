<?php

use Illuminate\Database\Seeder;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trmessage')->insert([
            'message' => 'Lol i love pizza',
            'sentdate' => '2018/10/30 10:00:00',
            'sentby' => 1,
            'sentto' => 2,
        ]);

        DB::table('trmessage')->insert([
            'message' => 'Lol i love birger',
            'sentdate' => '2018/10/30 10:00:00',
            'sentby' => 2,
            'sentto' => 1,
        ]);

    }
}
