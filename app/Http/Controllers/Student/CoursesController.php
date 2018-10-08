<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Course;
use App\Models\Register;
use App\Models\Post;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $lecturers = User::where('role', 'lecturer')->get();

        foreach($courses as $course) {
            $course->user_register = $course->user_register(Auth::id());
            $course->lecturer = null;
            foreach($lecturers as $lecturer) {
                if ($course->user_register($lecturer->id) != null) {
                    $course->lecturer = $lecturer;
                    break;
                }
            }
        }

        return view('student.courses.index', ['courses' => $courses]);
    }

    public function show($id)
    {
        $course = Course::find($id);
        $posts = Post::where('course_id', $course->id)->get();

        return view('student.courses.show', ['course' => $course, 'posts' => $posts]);
    }

    public function register($course_id)
    {
        $register = new Register;

        $register->course_id = $course_id;

        Auth::user()->registers()->save($register);

        return redirect(route('student.courses.index'));
    }

    public function unregister($course_id)
    {
        $register = Auth::user()->registers()->where('course_id', $course_id);

        $register->delete();

        return redirect(route('student.courses.index'));
    }
}
