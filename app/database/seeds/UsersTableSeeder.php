<?php

class UsersTableSeeder extends Seeders {
    
    public function run() {
        $user = new User;
        $user->firstname = "Mark";
        $user->lastname = "Redmond";
        $user->email = "mars384@gmail.com";
        $user->password = Hash::make('mypassword');
        $user->telephone = "602-555-5738";
        $user->admin = true;
        $user->save();
    }
}
