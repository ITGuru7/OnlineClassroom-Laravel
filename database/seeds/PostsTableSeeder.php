<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Course;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $courses = Course::all();
        foreach($users as $user) {
            if ($user->role == 'lecturer') {
                foreach($courses as $course) {
                    $post = new Post;

                    $post->course_id = $course->id;
                    $post->comment = "Comment for " . $course->title;

                    $user->posts()->save($post);
                }
            }
        }
    }
}
