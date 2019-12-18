<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create();
        $u = new User;
        $u->name = "Ben";
        $u->email = "ben@gmail.com";
        $u->password = "password";
        $u->is_admin = "0";
        $u->save();
    }
}
