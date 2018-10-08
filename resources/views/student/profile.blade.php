@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.student')
@endsection

@section('content')
    @include('profile')
@endsection