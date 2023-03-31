<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Channel;



class ChannelController extends Controller
{
    public function index()
    {
        $news = new NewsController();
        return view('channels', ['channels' => $this->getAllChannels(), 'news' => $news->getAllNews()]);
    }

    public function create()
    {
        $news_list = News::all();
        return view('channels.create', ['news_list' => $news_list]);
    }

    public function store(Request $request): RedirectResponse
    {
        $channel = Channel::create([
            'author' => $request->input('author'),
            'topic' => $request->input('topic'),
            'news_id' => $request->input('news_id'),
        ]);

        return \redirect(route('channels.index'));
    }

    public function edit(Channel $channel)
    {
        $news_list = News::all();
        return view('channels.edit', ['news_list' => $news_list, 'channel' => $channel]);
    }

    public function update(Request $request, Channel $channel): RedirectResponse
    {
        $channel->update([
            'author' => $request->input('author'),
            'topic' => $request->input('topic'),
            'news_id' => $request->input('news_id'),
        ]);
        return \redirect(route('channels.index'));
    }

    public function destroy($id): RedirectResponse
    {
        Channel::destroy($id);
        return \redirect(route('channels.index'));
    }

    public function getAllChannels(){
        return Channel::all();
    }
}
