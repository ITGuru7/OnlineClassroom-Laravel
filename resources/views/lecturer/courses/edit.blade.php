@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.lecturer')
@endsection

@section('content')

    <div class="container-fluid">
        <div class="card my-3">
            <div class="card-header">
                <div class="col">
                    <h3>{!! $course->title !!}</h3>
                </div>
                <div class="col">
                    <span>{!! $course->content !!}</span>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="courses-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{!! $student->name !!}</td>
                            <td>
                                {!! Form::open(['route' => ['lecturer.courses.remove_student', $course->id, $student->id], 'method' => 'delete']) !!}
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
            <div class="card-body w-100">
                <table class="table w-100" id="posts-table">
                    <thead>
                        <tr>
                            <th>Content</th>
                            <th>Video</th>
                            <th>Slide</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{!! $post->comment !!}</td>
                            <td><a href="{!! $post->video_url !!}">{!! $post->video !!}</a></td>
                            <td><a href="{!! $post->slide_url !!}">{!! $post->slide !!}</a></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('lecturer.courses.add_post', $course->id) }}" class="btn btn-primary float-right">Add Post</a>
            </div>
        </div>
    </div>

@endsection
