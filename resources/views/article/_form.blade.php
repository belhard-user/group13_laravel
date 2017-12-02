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
    {{ Form::select('tag_id[]', $tagList, null, ['class' => 'form-control', 'multiple']) }}
</div>

<button type="submit" class="btn btn-primary">{{ $btnText }}</button>