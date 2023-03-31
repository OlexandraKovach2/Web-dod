<form action="{{ route('news.store') }}" method="post">

    @csrf

    <label for="title">Title</label>
    <input required name="title" />
    <br />

    <label for="text">Text</label>
    <input required name="text" />
    <br />
    <label for="date">Date</label>
    <input required type="date" name="date" />
    <br />
    <label for="count_view">Number view</label>
    <input required type="number" name="count_view" />
    <br />

    <label for="comments_id">Comments</label>
    <select required name="comments_id">
        <option value="0">- please select News</option>
        @foreach ($comments_list as $comments_item)
            <option value="{{ $comments_item->id }}">{{ $comments_item->name }}</option>
        @endforeach

    </select>
    <br />
    <br />

    <button type="submit">Create</button>
</form>
