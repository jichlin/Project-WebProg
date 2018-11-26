<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i < 10 ; $i++) {
            DB::table('msuser')->insert([
                'rolesID' => random_int(1, 2),
                'username' => str_random(10),
                'useremail' => str_random(10) . '@gmail.com',
                'userpassword' => str_random(10),
                'userphone' => mt_rand(111111111,999999999),
                'useraddress' => str_random(20),
                'userDOB' => date("Y-m-d H:i:s", mt_rand(1262055681, 1262055681)),
                'userPicture' => str_random(20),
                'usernegativepop' => random_int(0, 100),
                'userpositivepop' => random_int(0, 100),
                'gender' => rand(0, 1) ? 'F' : 'M',
                'created_at' => date("Y-m-d H:i:s", mt_rand(1262055681, 1262055681)),
                'updated_at' => date("Y-m-d H:i:s", mt_rand(1262055681, 1262055681))
            ]);
        }
        //
    }
}
