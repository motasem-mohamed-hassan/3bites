@extends('layouts.dashboard')
@section('content')

    <ul>
        @foreach ($admins as $admin)
            <li>{{ $admin->name }}</li>
            <li>{{ $admin->email }}</li>
            <li>{{ $admin->is_super == true ? "superAdmin" : "Admin" }}</li>
            <li>actions</li>
        @endforeach

    </ul>

    <form action="{{ route('d.admin.store') }}" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="password">
        <button type="submit">Create</button>
    </form>

@endsection
