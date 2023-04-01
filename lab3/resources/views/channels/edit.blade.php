@extends('Layot.layout')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">

        <div class="mb-4">
            <h1 class="text-3xl font-bold">
                Edit Channel
            </h1>
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('channels.index') }}">< Back</a>
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <div class="flex flex-col">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    @if ($errors->any())
                        <div class="p-5 rounded bg-red-500 text-white m-3">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                        <form action="{{ route('channels.update', $channel) }}" method="post">

                            {{ method_field('PUT') }}
                            @csrf

                            <input type="hidden" name="id" value="{{$channel->id}}">

                            <div class="">
                            <label class="text-lg font-medium text-gray-900 dark:text-white" for="author">Author</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="author" value="{{$channel->author}}"/>
                            </div>

                            <div class="mt-4">
                            <label class="text-lg font-medium text-gray-900 dark:text-white" for="topic">Topic</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="topic" value="{{$channel->topic}}"/>
                            </div>
                            <div class="mt-4">
                            <label class="text-lg font-medium text-gray-900 dark:text-white" for="news_id">News</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  name="news_id">
                                @foreach ($news_list as $news)
                                    @if ($news->id == $channel->news_id)
                                        <option value="{{ $news->id }}">{{ $news->title }}</option>
                                    @endif
                                @endforeach
                                @foreach ($news_list as $news_item)
                                    <option value="{{ $news_item->id }}">{{ $news_item->title }}</option>
                                @endforeach

                            </select>
                            </div>


                            <div class="flex items-center justify-start mt-4 gap-x-2">
                                <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-green-100 bg-green-500 hover:bg-green-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
