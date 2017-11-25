@extends('layouts.app')

@section('content')

    {{--@if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif--}}
    <form action="" method="post">
        {{ csrf_field() }}
        <input type="text" name="name"><br>
        @if($errors->has('name'))
            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
        @endif
        <input type="text" name="age"><br>
        @if($errors->has('age'))
            <div class="alert alert-danger">{{ $errors->first('age') }}</div>
        @endif
        <button>validate</button>
    </form>
@endsection