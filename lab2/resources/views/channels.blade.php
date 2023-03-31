<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Lab2</title>
</head>
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Topic</th>
        <th>List news</th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($channels as $channel)
        <tr>
            <td>{{ $channel->id }}</td>
            <td>{{ $channel->author }}</td>
            <td>{{ $channel->topic }}</td>
            @foreach ($news as $news_)
                @if ($news_->id == $channel->news_id)
                    <td>{{ $news_->title }}</td>
                @endif
            @endforeach
            <td><button><a href="/channels/{{ $channel->id }}/edit">Edit</a></button></td>
            <td>
                <form action="{{ route('channels.destroy', $channel->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}

                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<button>
    <a href="/channels/create">Create new Channel</a>
</button>
</body>
</html>
