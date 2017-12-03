@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('article.add') }}" class="btn btn-success btn-lg">Добавить статью</a>
            </div>
        </div>
    @endif
    @include('article._article', ['articles' => $articles])
@endsection

@section('title', 'Блог')