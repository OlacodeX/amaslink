<?php

use Illuminate\Database\Seeder;

class role_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_user')->insert(array(
            array(
            'role_id' => '1',
            'user_id' => '1',
            ),
            array(
                'role_id' => '2',
                'user_id' => '2',
                ),
            ));
    }
}
