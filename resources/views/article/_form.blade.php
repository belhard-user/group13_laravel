<div class="form-group">
    {{ Form::label('title', 'Название новости') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => "Название новости"]) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Описание новости') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Тэги') }}
    {{ Form::select('tag_id[]', $tagList, null, ['class' => 'form-control js-select', 'multiple']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Тэги') }}
    {{ Form::file('images[]', ['multiple' => true]) }}
</div>

<button type="submit" class="btn btn-primary">{{ $btnText }}</button>

@section('css')
    @parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-select').select2();
        });
    </script>
@endsection
