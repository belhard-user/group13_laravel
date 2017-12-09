@extends('layouts.app')

@section('content')
    @include('errors._form_errors')
    @include('article._images', ['article' => $article])
    {{ Form::model($article, ['route' => ['article.update', 'slug' => $article->slug], 'method' => 'put', 'files' => true]) }}
    @include('article._form', ['btnText' => 'Редактировать'])
    {{ Form::close() }}
@endsection

@section('title', 'Редактирование записи ' . $article->title)