<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Select all from articles
     *
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->paginate(30);
        $ca = DB::table('articles')->count();
        return view('articles.index', ['articles' => $articles, 'ca' => $ca]);
    }

    /**
     * Show an article by his id
     *
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $cp = DB::table('profiles')->count();

        return view('articles.article', ['article' => $article, 'cp' => $cp]);
    }

    /**
     * Count all the articles
     *
     */
    public function count()
    {
        $count = DB::table('articles')->count();
        return $count;
    }

    /**
     * Like an article
     *
     */
    public function like(Request $request, $id){
        $article = Article::find($id);

        $likeArticle = $request->input('likes');
        $likeArticle = $article->likes + 1;
        $article->likes = $likeArticle;

        $article = $article->save();

        return redirect()->back()->with('status', 'You liked it!');
    }

    /**
     * Show a publisher
     *
     */
    public function publisher($id)
    {
        $user = User::find($id);

        $nbre = $user->articles->count();

        $artPublisher = $user->articles;

        $likes = $user->articles->sum('likes');

        $profile = $user->profile;

        return view('articles.publisher', ['user' => $user,
            'nbre' => $nbre,
            'artPublisher' => $artPublisher,
            'likes' => $likes,
            'profile' => $profile
        ]);
    }
}
