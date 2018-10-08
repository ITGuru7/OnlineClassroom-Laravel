@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.lecturer')
@endsection

@section('content')

    <div class="container-fluid my-3">
        <div class="card">

            <div class="card-header">
                <h4>New Post</h4>
            </div>

            <div class="card-body">
            {!! Form::open(['route' => ['lecturer.courses.store_post', $course_id], 'method' => 'post', 'files' => true]) !!}
                <div class="form-group row">
                    <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
                    <div class="col-md-6">
                        <input name="comment" type="text" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Video') }}</label>
                    <div class="col-md-6">
                        <input name="video" type="file" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('PowerPoint Slide') }}</label>
                    <div class="col-md-6">
                        <input name="slide" type="file" class="form-control">
                    </div>
                </div>
                <!-- Submit Field -->
                <div class="form-group row">
                    <div class="offset-md-4 col-md-6">
                        {!! Form::submit('Add', ['class' => 'btn btn-lg btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
