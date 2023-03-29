<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Article;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'PreventBackHistory']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function Filter(Request $request){
        return $request->input('collection');
    }

    public function index(Request $request){
        if(HomeController::Filter($request) == "Beauty & Nature") $articles = Article::where('collection', 'Beauty & Nature')->orderBy('updated_at', 'desc')->paginate(30);
        elseif(HomeController::Filter($request) == "Sport") $articles = Article::where('collection', 'Sport')->orderBy('updated_at', 'desc')->paginate(30);
        elseif(HomeController::Filter($request) == "Mixt Art") $articles = Article::where('collection', 'Mixt Art')->orderBy('updated_at', 'desc')->paginate(30);
        else $articles = Article::orderBy('updated_at', 'desc')->paginate(30);
        
        $profiles = Profile::all();
        $cp = DB::table('profiles')->count();
        $links = $articles->links();
        $nbre = $articles->count();
        $user = User::find(Auth::user()->id);
        $design = $user->articles->count();
        $likes = $user->articles->sum('likes');
        $user = Auth::user()->id;
        $uidprofile = DB::select('select user_id from profiles');

        return view('home', ['profiles' => $profiles, 'cp' => $cp, 'articles' => $articles, 
                    'nbre' => $nbre, 'uid' => $user, 'uidp' => $uidprofile, 'links' => $links, 'design' => $design, 'likes' => $likes]);
    }

}
