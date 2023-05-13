<?php

use Illuminate\Database\Seeder;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(array(
            array(
            'name' => 'ROLE_SUPERADMIN',
            'description' => 'super_user',
            ),
            array(
                'name' => 'ROLE_USER',
                'description' => 'user',
                ),
            ));
    }
}
