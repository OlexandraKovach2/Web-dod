<form action="{{ route('channels.update', $channel) }}" method="post">

    {{ method_field('PUT') }}
    @csrf

    <input type="hidden" name="id" value="{{$channel->id}}">

    <label for="author">Author</label>
    <input required name="author" value="{{$channel->author}}"/>
    <br />

    <label for="topic">Topic</label>
    <input required name="topic" value="{{$channel->topic}}"/>
    <br />

    <label for="news_id">News</label>
    <select required name="news_id">
        @foreach ($news_list as $news)
            @if ($news->id == $channel->news_id)
                <option value="{{ $news->id }}">{{ $news->title }}</option>
            @endif
        @endforeach
        @foreach ($news_list as $news_item)
            <option value="{{ $news_item->id }}">{{ $news_item->title }}</option>
        @endforeach

    </select>
    <br />
    <br />

    <button type="submit">Edit</button>
</form>
