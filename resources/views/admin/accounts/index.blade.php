@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.admin')
@endsection

@section('content')

    <div class="container-fluid p-3">
        <div class="row">
            <table class="table" id="accounts-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Attendance</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($accounts as $account)
                    <tr id="user_{!! $account->id !!}">
                        <td>{!! $account->name !!}</td>
                        <td>{!! $account->email !!}</td>
                        <td>{!! $account->role !!}</td>
                        <td class="attendance offline">Offline</td>
                        <td>
                            {!! Form::open(['route' => ['admin.accounts.destroy', $account->id], 'method' => 'delete']) !!}
                            <div class='btn-account'>
                                {{-- <a href="{!! route('admin.accounts.edit', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a> --}}
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
