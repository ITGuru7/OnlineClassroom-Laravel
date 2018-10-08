<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('admin.courses.index', ['courses' => $courses]);
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $course = new Course;

        $course->title = $request->title;
        $course->content = $request->content;

        $course->save();

        return redirect(route('admin.courses.index'));
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.courses.edit', ['course' => $course]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $course->title = $request->title;
        $course->content = $request->content;

        $course->save();

        return redirect(route('admin.courses.index'));
    }

    public function destroy($id)
    {
        $course = Course::find($id);

        $course->delete();

        return redirect(route('admin.courses.index'));
    }
}
