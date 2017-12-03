@extends('layouts.app')

@section('content')
    <h1>{{ $tag->title }}</h1>
    @include('article._article', ['articles' => $tag->articles])
@endsection