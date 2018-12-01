<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('msRoles')->insert([
           'rolesID' => 1,
            'rolesname' => 'Admin'
        ]);
        DB::table('msRoles')->insert([
            'rolesID' => 2,
            'rolesName' => 'User'
        ]);
    }
}
