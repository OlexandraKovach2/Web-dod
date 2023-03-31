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
        <th>Title</th>
        <th>Text</th>
        <th>Date publish</th>
        <th>Count view</th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($news as $new)
        <tr>
            <td>{{ $new->id }}</td>
            <td>{{ $new->title }}</td>
            <td>{{ $new->text }}</td>
            <td>{{ $new->date }}</td>
            <td>{{ $new->count_view }}</td>
            @foreach ($comments as $comments_)
                @if ($comments_->id == $new->comments_id)
                    <td>{{ $comments_->title }}</td>
                @endif
            @endforeach
            <td><button><a href="/news/{{ $new->id }}/edit">Edit</a></button></td>
            <td>
                <form action="{{ route('news.destroy', $new->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}

                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<button>
    <a href="/news/create">Create new News</a>
</button>
</body>
</html>
