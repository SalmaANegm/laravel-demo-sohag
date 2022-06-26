<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Auth;

class ArticleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['create', 'store']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Article::where('user_id', Auth::id())->get();

        // Auth::user()->articles
        return view('article.index', ['articles' =>  Article::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Article::class);
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Article::class);
        // validation
        $request->validate([
            'title' => ['required','alpha_num','unique:articles'],
            'content' => 'required'
        ]);
        // store in DB
        // dd($request->all());
        Auth::user()->articles()->create($request->all()); //['title' => 'dfdfdf', 'content' => 'sdfsdf']
        
        // $article = new Article(); // articles: title, content, user_id
        // $article->title = $request->title;
        // $article->content = $request->content;
        // $article->user_id = Auth::id();
        // $article->save();

        // redirect
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Article $article) //articles/1/edit
    {
        // if($request->user()->cannot('update', $article))
            // abort(403);

        $this->authorize('update', $article);

        // can:update,article

        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        // dd($request->only(['title', 'content']));
        // validation
        $request->validate([
            'title' => ['required','alpha_num','unique:articles'],
            'content' => 'required'
        ]);
        
        // update DB
            // $article->update($request->only(['title', 'content']));
        $article->update($request->all());
        
        // \DB::table('articles')->update($request->all());

        // $article = Article::find($id);
        // $article->title = $request->title;
        // $article->content = $request->content;
        // $article->save();
        // dd($article);
        // redirect or return view  
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // Article::destroy($id);
        $article->delete(); // return true or false

        return redirect()->route('articles.index');
    }
}
