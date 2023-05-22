@extends('Layot.layout')

@section('content')

    <div class="w-4xl mx-auto mt-8 ">
        <div class="mb-4">
            <h1 class="text-3xl font-bold text-center">
                Laravel lab 3
            </h1>
        </div>

        <div class="flex justify-end mt-10 my-2" >
            <a href="/news" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"> Show all news</a>
            <a href="/channels/create" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"> + Create new channel</a>

        </div>
<table class="min-w-full text-center">
    <tr>
        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 text-center">Id</th>
        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 text-center">Author</th>
        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 text-center">Topic</th>
        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 text-center">List news</th>
        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 text-center">Edit</th>
        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 text-center">Delete</th>
    </tr>
    <tbody class="bg-white">
    @foreach ($channels as $channel)
        <tr>
            <td class="px-6 whitespace-no-wrap border-b border-gray-200">{{ $channel->id }}</td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $channel->author }}</td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $channel->topic }}</td>
            @foreach ($news as $news_)
                @if ($news_->id == $channel->news_id)
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $news_->title }}</td>
                @endif
            @endforeach
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><a class="text-indigo-600 hover:text-indigo-900 text-gray-600" href="/channels/{{ $channel->id }}/edit"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg></a></td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <form action="{{ route('channels.destroy', $channel->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}

                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>

@endsection
