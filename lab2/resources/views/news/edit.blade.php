<form action="{{ route('news.update', $news) }}" method="post">

    {{ method_field('PUT') }}
    @csrf

    <input type="hidden" name="id" value="{{$news->id}}">

    <label for="title">Title</label>
    <input required name="title" value="{{$news->title}}"/>
    <br />

    <label for="text">Text</label>
    <input required name="text" value="{{$news->text}}"/>
    <br />

    <label for="date">Date</label>
    <input required type="date" name="date" value="{{$news->date}}"/>
    <br />

    <label for="count_view">Number view</label>
    <input required name="count_view" type="number" value="{{$news->count_view}}"/>
    <br />




    <label for="comments_id">Comments</label>
    <select required name="comments_id">
        @foreach ($comments_list as $comments)
            @if ($comments->id == $news->comments_id)
                <option value="{{ $comments->id }}">{{ $comments->name }}</option>
            @endif
        @endforeach
        @foreach ($comments_list as $comments_item)
            <option value="{{ $comments_item->id }}">{{ $comments_item->name }}</option>
        @endforeach

    </select>
    <br />
    <br />

    <button type="submit">Edit</button>
</form>
