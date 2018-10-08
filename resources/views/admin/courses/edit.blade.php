@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.admin')
@endsection

@section('content')

    {!! Form::open(['route' => ['admin.courses.update', $course->id], 'method' => 'put']) !!}

    <div class="container my-5 py-5 border rounded">
        <div class="row">
            <div class="col">
                <!-- Title Field -->
                <div class="form-group ">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', $course->title, ['class' => 'form-control']) !!}
                </div>

                <!-- Content Field -->
                <div class="form-group">
                    {!! Form::label('text', 'Content:') !!}
                    {!! Form::textarea('content', $course->content, ['class' => 'form-control']) !!}
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}
                    <a href="{!! route('admin.courses.index') !!}" class="btn btn-lg btn-default">Cancel</a>
                </div>
            </div>

        </div>
    </div>

    {!! Form::close() !!}

@endsection
