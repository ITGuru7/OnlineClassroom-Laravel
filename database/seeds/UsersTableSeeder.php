<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = "admin";
        $admin->email = "cnatalia7472@gmail.com";
        $admin->password = bcrypt('aaaaaaaa');
        $admin->role = "admin";
        $admin->save();

        for ($i = 1; $i <= 3; $i ++) {
            $lecturer = new User;
            $lecturer->name = "lecturer".$i;
            // $lecturer->email = "lecturer".$i."@email.com";
            $lecturer->email = "cnatalia7472@gmail.com";
            $lecturer->password = bcrypt('aaaaaaaa');
            $lecturer->role = "lecturer";
            $lecturer->save();
        }

        for ($i = 1; $i <= 3; $i ++) {
            $student = new User;
            $student->name = "student".$i;
            // $student->email = "student".$i."@email.com";
            $student->email = "cnatalia7472@gmail.com";
            $student->password = bcrypt('aaaaaaaa');
            $student->role = "student";
            $student->save();
        }
    }
}
