<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Register;
use App\User;

class StudentsController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->get();
        $registers = Auth::user()->registers;
        foreach($students as $student) {
            $student->course_count = 0;
            foreach($registers as $register) {
                $course = $register->course;
                if ($course->user_register($student->id) != null) {
                    $student->course_count ++;
                }
            }
        }

        return view('lecturer.students.index', ['students' => $students]);
    }

    public function edit($id)
    {
        $student = User::find($id);
        $courses = [];
        $lecturer_registers = Auth::user()->registers;
        $student_registers = $student->registers;
        foreach($lecturer_registers as $lecturer_register) {
            $course = $lecturer_register->course;
            if ($course->user_register($student->id) != null) {
                array_push($courses, $course);
            }
        }
        return view('lecturer.students.edit', ['student' => $student, 'courses' => $courses]);
    }

    public function remove_course($student_id, $course_id)
    {
        $register = Register::where('user_id', $student_id)->where('course_id', $course_id);

        $register->delete();

        return redirect(route('lecturer.students.edit', $student_id));
    }
}
