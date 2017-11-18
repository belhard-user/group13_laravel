@extends('layouts.app')

@section('content')
    {{ Form::open() }}
        @include('article._form', ['btnText' => 'Создать'])
    {{ Form::close() }}
@endsection

@section('title', 'Добавить запись в блог')