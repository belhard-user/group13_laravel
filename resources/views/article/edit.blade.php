@extends('layouts.app')

@section('content')
    @include('errors._form_errors')
    {{ Form::model($article, ['route' => ['article.update', 'slug' => $article->slug], 'method' => 'put']) }}
    @include('article._form', ['btnText' => 'Редактировать'])
    {{ Form::close() }}
@endsection

@section('title', 'Редактирование записи ' . $article->title)