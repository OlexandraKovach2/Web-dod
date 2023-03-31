<form action="{{ route('channels.store') }}" method="post">

    @csrf

    <label for="author">Author</label>
    <input required name="author" />
    <br />

    <label for="topic">Topic</label>
    <input required name="topic" />
    <br />

    <label for="news_id">News</label>
    <select required name="news_id">
        <option value="0">- please select News</option>
        @foreach ($news_list as $news_item)
            <option value="{{ $news_item->id }}">{{ $news_item->title }}</option>
        @endforeach

    </select>
    <br />
    <br />

    <button type="submit">Create</button>
</form>
