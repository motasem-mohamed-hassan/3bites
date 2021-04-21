@extends('layouts.dashboard')
@section('content')

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->first_name }}</li>
            <li>{{ $user->last_name }}</li>
            <li>{{ $user->email }}</li>
            <li>{{ $user->phone }}</li>
        @endforeach

    </ul>

@endsection
