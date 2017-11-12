@extends('layouts.app')

@section('content')
    <form action="" method="post">
        <input type="text" name="username">
        <input type="number" name="age">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input type="submit">
    </form>
@endsection