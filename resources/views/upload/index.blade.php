@extends('layouts.app')

@section('content')
    {{ Form::open(['files' => true]) }}
        {{ Form::file('photo[]', ['multiple']) }}
        <input type="submit">
    {{ Form::close() }}
@endsection