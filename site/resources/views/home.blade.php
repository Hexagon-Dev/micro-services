@extends('default')

@section('content')
    <style>
        div {
            display: flex;
            width: 300px;
            margin: 0 auto;
            justify-content: space-between;
            padding-top: 400px;
        }
    </style>
    <div>
        <a href="{{ route('login') }}"><h1>Login</h1></a>
        <a href="{{ route('register') }}"><h1>Register</h1></a>
    </div>
@endsection
