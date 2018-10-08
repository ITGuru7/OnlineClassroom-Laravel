@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.lecturer')
@endsection

@section('content')
    @include('profile')
@endsection