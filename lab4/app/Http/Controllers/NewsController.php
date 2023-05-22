<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getAllNews(){
        return News::all();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = new CommentController();
        return view('news', ['news' => $this->getAllNews(), 'comments' => $comments->getAllComments()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comments_list = Comment::all();
        return view('news.create', ['comments_list' => $comments_list]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'date' => 'required',
            'count_view' => 'required',
            'comments_id' => 'required'
        ]);
        $news = News::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'date' => $request->input('date'),
            'count_view' => $request->input('count_view'),
            'comments_id' => $request->input('comments_id'),
        ]);

        return \redirect(route('news.index'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $comments_list = Comment::all();
        return view('news.edit', ['comments_list' => $comments_list, 'news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'date' => 'required',
            'count_view' => 'required',
            'comments_id' => 'required'
        ]);
        $news->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'date' => $request->input('date'),
            'count_view' => $request->input('count_view'),
            'comments_id' => $request->input('comments_id'),
        ]);
        return \redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        News::destroy($id);
        return \redirect(route('news.index'));
    }
}
