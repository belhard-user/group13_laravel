@if($article->images->count())
    <hr>
    @foreach($article->images as $image)
        <img width="100" src="{{ $image->url }}">
    @endforeach
@endif