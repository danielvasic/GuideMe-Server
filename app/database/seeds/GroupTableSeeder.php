<?php

class GroupTableSeeder extends Seeder {

    public function run()
    {
        DB::table('groups')->delete();

        Group::create(array(
            'name' => 'Administrator'
        ));

        Group::create(array(
            'name' => 'Moderator'
        ));
    }
}
