@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.student')
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
            <div class="card-header">
                <div class="col">
                    <h4>Posts</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="courses-table">
                    <thead>
                        <tr>
                            <th>Lecturer</th>
                            <th>Attendance</th>
                            <th>Comment</th>
                            <th>Video</th>
                            <th>Slide</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr id="user_{!! $post->user->id !!}">
                            <td>{!! $post->user->name !!}</td>
                            <td class="attendance offline">Offline</td>
                            <td>{!! $post->comment !!}</td>
                            <td><a href="{!! $post->video_url !!}">{!! $post->video !!}</a></td>
                            <td><a href="{!! $post->slide_url !!}">{!! $post->slide !!}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
