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
                        <th>Title</th>
                        <th width="50%">Content</th>
                        <th>Students</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{!! $course->title !!}</td>
                        <td>{!! $course->content !!}</td>
                        @if($course->user_register != null)
                            <td>{!! $course->students_count !!}</td>
                            <td>
                                {!! Form::open(['route' => ['lecturer.courses.unregister', $course->id], 'method' => 'post']) !!}
                                <div class='btn-account'>
                                    {!! Form::button('<i class="fa fa-times"> Unregister</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                    <a href="{!! route('lecturer.courses.edit', [$course->id]) !!}" class='btn btn-info btn-xs'><i class="fa fa-edit"></i> View</a>
                                </div>
                                {!! Form::close() !!}
                            </td>
                        @else
                            <td>-</td>
                            <td>
                                {!! Form::open(['route' => ['lecturer.courses.register', $course->id], 'method' => 'post']) !!}
                                <div class='btn-account'>
                                    {!! Form::button('<i class="fa fa-check"> Register</i>', ['type' => 'submit', 'class' => 'btn btn-success btn-xs']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
