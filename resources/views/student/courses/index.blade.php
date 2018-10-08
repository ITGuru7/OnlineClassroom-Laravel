@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.student')
@endsection

@section('content')

    <div class="container-fluid p-3">
        <div class="row">
            <table class="table" id="courses-table">
                <thead>
                    <tr>
                        <th width="10%">Title</th>
                        <th width="40%">Content</th>
                        <th>Lecturer</th>
                        <th>Status</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{!! $course->title !!}</td>
                        <td>{!! $course->content !!}</td>
                        <td>{!! ($course->lecturer != null ? $course->lecturer->name : '-') !!}</td>
                        @if($course->user_register != null)
                            <td>registered</td>
                            <td>
                                {!! Form::open(['route' => ['student.courses.unregister', $course->id], 'method' => 'post']) !!}
                                <div class='btn-account'>
                                    {!! Form::button('<i class="fa fa-times"> Unregister</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                    <a href="{{ route('student.courses.show', $course->id) }}" class="btn btn-primary">View posts</a>
                                </div>
                                {!! Form::close() !!}
                            </td>
                        @else
                            <td>unregistered</td>
                            <td>
                                {!! Form::open(['route' => ['student.courses.register', $course->id], 'method' => 'post']) !!}
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
