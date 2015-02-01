<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'username' => 'admin',
            'password' => 'guideme123',
            'email' => 'admin@guideme.ba',
            'group_id' => 1
        ));

        User::create(array(
            'username' => 'tvolaric',
            'password' => 'guideme123',
            'first_name' => 'Tomislav',
            'last_name' => 'Volarić',
            'email' => 'tvolaric@guideme.ba',
            'group_id' => 2
        ));

        User::create(array(
            'username' => 'dvasic',
            'password' => 'guideme123',
            'first_name' => 'Daniel',
            'last_name' => 'Vasić',
            'email' => 'dvasic@guideme.ba',
            'group_id' => 2
        ));

        User::create(array(
            'username' => 'ebrajkovic',
            'password' => 'guideme123',
            'first_name' => 'Emil',
            'last_name' => 'Brajković',
            'email' => 'ebrajkovic@guideme.ba',
            'group_id' => 2
        ));

        User::create(array(
            'username' => 'adilber',
            'password' => 'guideme123',
            'first_name' => 'Ante',
            'last_name' => 'Dilber',
            'email' => 'adilber@guideme.ba',
            'group_id' => 2
        ));

        User::create(array(
            'username' => 'hljubic',
            'password' => 'guideme123',
            'first_name' => 'Hrvoje',
            'last_name' => 'Ljubić',
            'email' => 'hljubic@guideme.ba',
            'group_id' => 2
        ));

        User::create(array(
            'username' => 'iprskalo',
            'password' => 'guideme123',
            'first_name' => 'Ivo',
            'last_name' => 'Prskalo',
            'email' => 'iprskalo@guideme.ba',
            'group_id' => 2
        ));

        User::create(array(
            'username' => 'tkordic',
            'password' => 'guideme123',
            'first_name' => 'Tomislav',
            'last_name' => 'Kordić',
            'email' => 'tkordic@guideme.ba',
            'group_id' => 2
        ));
    }
}
