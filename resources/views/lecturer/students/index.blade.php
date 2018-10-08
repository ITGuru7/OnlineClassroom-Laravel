@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.lecturer')
@endsection

@section('content')

    <div class="container-fluid p-3">
        <div class="row">
            <table class="table" id="courses-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course Count</th>
                        <th>Attendance</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr id="user_{!! $student->id !!}">
                        <td>{!! $student->name !!}</td>
                        <td>{!! $student->course_count !!}</td>
                        <td class="attendance offline">Offline</td>
                        <td>
                            @if($student->course_count > 0)
                                <a href="{!! route('lecturer.students.edit', [$student->id]) !!}" class='btn btn-info btn-lg'><i class="fa fa-edit"></i> View</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
