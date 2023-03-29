<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Select all from articles
     *
     */
    public function index()
    {
        $mostliked = DB::table('articles')->where('likes', '>', 50)->take(4)->get();
        return view('welcome', ['mostliked' => $mostliked]);
    }

}
