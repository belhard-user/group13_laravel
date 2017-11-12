@extends('layouts.app')

@section('content')
    <form action="{{ route('article.store') }}" method="post">
        <div class="form-group">
            <label for="title">Название новости</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Название новости">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
        </div>

        {{ csrf_field() }}

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection

@section('title', 'Добавить запись в блог')