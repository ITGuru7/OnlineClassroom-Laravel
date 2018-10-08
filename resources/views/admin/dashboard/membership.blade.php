@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.admin')
@endsection

@section('content')

    <div class="container-fluid p-3">
        <div class="row justify-content-center">
            <h4>Our phone number : 0123456789</h4>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-success btn-lg"><i class="fa fa-phone"></i> Contact us for upgrade</button>
        </div>
    </div>

@endsection
