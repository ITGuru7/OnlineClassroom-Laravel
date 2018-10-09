<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;
use Mail;

use App\User;
use App\Models\Course;
use App\Models\Register;
use App\Models\Post;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $students = User::where('role', 'student')->get();

        foreach($courses as $course) {
            $course->user_register = $course->user_register(Auth::id());
            $course->students_count = 0;
            foreach($students as $student) {
                if ($course->user_register($student->id) != null) {
                    $course->students_count ++;
                }
            }
        }

        return view('lecturer.courses.index', ['courses' => $courses]);
    }

    public function get_students($course_id)
    {
        $course = Course::find($course_id);
        $students = [];
        foreach($course->registers as $course_register) {
            if ($course_register->user->role == "student") {
                array_push($students, $course_register->user);
            }
        }
        return $students;
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $students = $this->get_students($course->id);
        $posts = Post::where('user_id', Auth::id())->where('course_id', $id)->get();
        return view('lecturer.courses.edit', ['course' => $course, 'students' => $students, 'posts' => $posts]);
    }

    public function register($course_id)
    {
        $register = new Register;

        $register->course_id = $course_id;

        Auth::user()->registers()->save($register);

        return redirect(route('lecturer.courses.index'));
    }

    public function unregister($course_id)
    {
        $register = Auth::user()->registers()->where('course_id', $course_id);

        $register->delete();

        return redirect(route('lecturer.courses.index'));
    }

    public function remove_student($course_id, $student_id)
    {
        $register = Register::where('course_id', $course_id)->where('user_id', $student_id);

        $register->delete();

        return redirect(route('lecturer.courses.edit', $course_id));
    }

    public function store_post($course_id, Request $request)
    {
        $post = new Post;

        $post->course_id = $course_id;
        $post->comment = $request->comment;

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $post->video = $video->getClientOriginalName();
            $path = $video->store('upload/videos', 'public');
            $post->video_url = Storage::disk('public')->url($path);
        }

        if ($request->hasFile('slide')) {
            $slide = $request->file('slide');
            $post->slide = $slide->getClientOriginalName();
            $path = $slide->store('upload/slides', 'public');
            $post->slide_url = Storage::disk('public')->url($path);
        }

        Auth::user()->posts()->save($post);

        $this->send_message_to_students($course_id, $post->id);

        return redirect(route('lecturer.courses.edit', $course_id));
    }

    public function send_message_to_students($course_id, $post_id)
    {
        $course = Course::find($course_id);
        $post = Post::find($post_id);

        $data = [
            'name' => Auth::user()->name,
            'comment' => $post->comment,
            'video' => $post->video,
            'video_url' => $post->video_url,
            'slide' => $post->slide,
            'slide_url' => $post->slide_url,
        ];

        foreach($course->registers as $course_register) {
            if ($course_register->user->role == 'student') {
                $student = $course_register->user;

                Mail::send('emails.post_notification' , $data, function($message) use ($student) {
                    $message->to($student->email)->subject("New post from your lecturer");
                    $message->from(Auth::user()->email, 'Lecturer');
                });
            }
        }

    }
}
