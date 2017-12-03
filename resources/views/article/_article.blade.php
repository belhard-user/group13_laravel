@foreach($articles as $article)
    <section>
        <h2>
            <a href="{{ route('article.show', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
        </h2>
        <div>{{ $article->description }}</div>
        <div class="tag-list">
            @foreach($article->tags as $tag)
                <a class="label {{ getLabelClass() }}" href="{{ route('tag', ['tag_slug' => $tag->slug]) }}">
                    {{ $tag->title }}
                </a>
            @endforeach
        </div>
    </section>
@endforeach

{{ $articles->render() }}