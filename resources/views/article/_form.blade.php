<div class="form-group">
    {{ Form::label('title', 'Название новости') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => "Название новости"]) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Описание новости') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
</div>

<button type="submit" class="btn btn-primary">{{ $btnText }}</button>