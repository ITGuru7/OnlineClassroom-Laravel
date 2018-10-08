@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.admin')
@endsection

@section('content')

    <div class="container-fluid p-3">
        <div class="row">
            <div class="col px-5 d-flex justify-content-end">
                <span>ARCHIVE SETTINGS</span>
            </div>
        </div>
        <div class="row">
            <table class="table" id="courses-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{!! $course->title !!}</td>
                        <td>{!! $course->content !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.courses.destroy', $course->id], 'method' => 'delete']) !!}
                            <div class='btn-course'>
                                <a href="{!! route('admin.courses.edit', [$course->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col">
                <a href="{!! route('admin.courses.create') !!}" class="btn btn-lg btn-secondary float-right">Create Course</a>
            </div>
        </div>
    </div>

@endsection
