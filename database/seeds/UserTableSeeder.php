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
        //
        DB::table('users')->insert([
            [
               'name' => 'adam',
               'email' => 'test@salut.com',
               'password' => Hash::make('adam')
            ],
            
        ]);
    }
}
