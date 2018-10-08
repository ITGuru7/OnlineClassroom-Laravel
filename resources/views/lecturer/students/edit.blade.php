@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.lecturer')
@endsection

@section('content')

    <div class="container-fluid p-3">
        <div class="row">
            <h3>{!! $student->name !!}</h3>
        </div>
        <div class="row">
            <table class="table" id="courses-table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{!! $course->title !!}</td>
                        <td>
                            {!! Form::open(['route' => ['lecturer.students.remove_course', $student->id, $course->id], 'method' => 'delete']) !!}
                            <div class='btn-course'>
                                {!! Form::button('<i class="fa fa-trash"> Remove</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-lg', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
