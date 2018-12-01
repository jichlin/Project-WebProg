<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('msuser')->insert([
                'rolesID' => 1,
                'username' => 'admin',
                'useremail' => 'admin@gmail.com',
                'userpassword' => Hash::make('admin'),
                'userphone' => '0',
                'useraddress' => 'test',
                'userDOB' =>'1998/10/31',
                'userPicture' => '',
                'usernegativepop' => 0,
                'userpositivepop' => 0,
                'usergender' => 'U',
                'remember_token' => ''
            ]);

            DB::table('msuser')->insert([
                'rolesID' => 2,
                'username' => 'user',
                'useremail' => 'user@gmail.com',
                'userpassword' => Hash::make('user'),
                'userphone' => '1',
                'useraddress' => 'test',
                'userDOB' =>'1998/10/30',
                'userPicture' => '',
                'usernegativepop' => 0,
                'userpositivepop' => 0,
                'usergender' => 'U',
                'remember_token' => ''
            ]);

        //
    }
}
