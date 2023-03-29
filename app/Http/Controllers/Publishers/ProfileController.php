<?php

namespace App\Http\Controllers\Publishers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'PreventBackHistory']);
    }

    public function index(){
        $profiles = Profile::all();
        return view('publishers.publisher', ['profile' => $profiles]);
    }

     /**
     *
     */
    public function show($id)
    {
        $user = User::find(Auth::user()->id);
        if($user->articles != null)
            $nbre = $user->articles->count();
        else $nbre = 0;

        $artPublisher = $user->articles;

        $likes = $user->articles->sum('likes');

        $profile = $user->profile;

        return view('publishers.profile', ['user' => $user,
            'nbre' => $nbre,
            'artPublisher' => $artPublisher,
            'likes' => $likes,
            'profile' => $profile
        ]);
    }
}
