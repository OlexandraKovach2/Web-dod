<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Http\Requests\ChannelRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisteredUserController;


class ChannelController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Channel::class);
    }
    public function index(Request $request)
    {
        $id = $request->query('id');
        $news = new NewsController();
        if($id){
            return view('channels', ['autos' => $this->getChannelsByNews($id), 'news' => $news->getAllNews()]);
        }
        else{
            return view('channels', ['channels' => $this->getAllChannels(), 'news' => $news->getAllNews()]);
        }
    }

    public function create()
    {
        $news_list = News::all();
        return view('channels.create', ['news_list' => $news_list]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'author' => 'required',
            'topic' => 'required',
            'news_id' => 'required'
        ]);
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
        $request->validate([
            'author' => 'required',
            'topic' => 'required',
            'news_id' => 'required'
        ]);
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
    public function getChannelsByNews($id){
        return Channel::where('news_id', $id)->get();
    }
    public function getAllChannels(){
        return Channel::all();
    }
}
