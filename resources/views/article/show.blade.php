@extends('layouts.app')

@section('content')
    <h2>{{ $article->title }}</h2>
    <div>{{ $article->description }}</div>
@endsection