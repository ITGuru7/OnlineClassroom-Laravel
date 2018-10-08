<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Course;
use App\Models\Register;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'title' => "Routing and switching",
                'content' => "Routing and Switching are different functions of network communications.",
            ],
            [
                'title' => "Client and server",
                'content' => "In Computer science, client-server is a software architecture model consisting of two parts.",
            ],
            [
                'title' => "C programming",
                'content' => "C is a general-purpose, imperative computer programming language, supporting structured programming ...",
            ],
            [
                'title' => "Java Programming",
                'content' => "Java is a general-purpose computer-programming language that is concurrent, class-based, object-oriented ...",
            ],
        ];

        foreach($courses as $course_data)
        {
            $course = new Course;
            $course->title = $course_data['title'];
            $course->content = $course_data['content'];
            $course->save();

            $users = User::all();
            foreach ($users as $user) {
                $register = new Register;
                $register->course_id = $course->id;
                $user->registers()->save($register);
            }
        }
    }
}
