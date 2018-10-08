@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.admin')
@endsection

@section('content')

    {!! Form::open(['route' => 'admin.courses.store']) !!}

    <div class="container my-5 py-5 border rounded">
        <div class="row">
            <div class="col">
                <!-- Title Field -->
                <div class="form-group ">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Content Field -->
                <div class="form-group">
                    {!! Form::label('text', 'Content:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Create', ['class' => 'btn btn-lg btn-primary']) !!}
                    <a href="{!! route('admin.courses.index') !!}" class="btn btn-lg btn-default">Cancel</a>
                </div>
            </div>

        </div>
    </div>

    {!! Form::close() !!}

@endsection
