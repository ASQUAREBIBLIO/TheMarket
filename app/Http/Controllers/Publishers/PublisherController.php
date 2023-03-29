<?php

namespace App\Http\Controllers\Publishers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Article;
use App\Models\Profile;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

class PublisherController extends Controller
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
     * Select the articles of a specific user
     *
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Add an article
     *
     */
    public function create(){
        $cp = DB::table('profiles')->count();
        $uidprofile = DB::select('select user_id from profiles');
        return view('Publishers.add',['cp' => $cp, 'uidp' => $uidprofile]);
    }

    /**
     * Update an existing article
     * 
     */
    public function edit($id){
        $article = DB::select('select * from articles where id = ?',[$id]);
        $cp = DB::table('profiles')->count();
        $uidprofile = DB::select('select user_id from profiles');
        return view('Publishers.update',['article' => $article,'cp' => $cp, 'uidp' => $uidprofile]);
    }

    /**
     * Insert the article into DB
     *
     */
    public function store(Request $request)
    {
        /**
         * Request validation
         *
         */
        $request->validate([
            'title' => 'required|string|min:5',
            'image' => 'required',
            'description' => 'required|string|max:5000',
            'collection' => 'required'
        ]);

        /**
         * Insert into articles
         *
         */
        $user = User::find(Auth::user()->id);
        $article = new Article();

        $article->user_id = $request->input('user_id');
        $article->title = $request->input('title');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('artworks', $filename);

            $article->image = $filename;
        }
        $article->description = $request->input('description');
        $article->collection = $request->input('collection');
        $article->likes = $request->input('likes');

        $user->articles()->save($article);
        return redirect()->route('preview',[$article->id,$article->title,$article->user->username])->with('success','Your arwork has been published successfuly. ');
    }

    /**
     * Modify or update an article details
     *
     */
    public function update(Request $request,$id)
    {
        /**
         * Request validation
         *
         */
        $request->validate([
            'title' => 'required|string|min:5',
            'image' => 'required',
            'description' => 'required|string|max:5000',
            'collection' => 'required'
        ]);

        /**
         * Update an article
         */
        $article = Article::findOrFail($id);
        $image_path = public_path('artworks').'/'.$article->image;
        unlink($image_path);

        $title = $request->input('title');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('artworks', $filename);

            $image = $filename;
        }
        $description = $request->input('description');
        $collection = $request->input('collection');

        DB::update('update articles set title = ?, image = ?, description = ?, collection = ? where id = ?',[$title,$image,$description,$collection,$id]);

        return redirect()->route('preview',[$id,$article->title,Auth::user()->username])->with('success','Your arwork has been updated successfuly. ');
    }

    /**
     * Show a publisher
     *
     */
    public function show($id)
    {
        $user = User::find($id);
        $nbre = $user->articles->count();
        $artPublisher = $user->articles;
        $likes = $user->articles->sum('likes');
        $profile = $user->profile;

        return view('publishers.publisher', ['user' => $user,
            'nbre' => $nbre,
            'artPublisher' => $artPublisher,
            'likes' => $likes,
            'profile' => $profile
        ]);
    }

    /**
     * Delete a single user
     *
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $image_path = public_path('artworks').'/'.$article->image;
        unlink($image_path);
        $article->delete();
        return redirect()->route('profile',[Auth::user()->id,Auth::user()->username])->with('success','Your arwork was successfuly removed.');
    }

    /**
     * Count users
     *
     */
    public function count(){
        $count = DB::table('users')->count();
        return $count;
    }

    /**
     * Preview an article
     *
     */
    public function preview($id)
    {
        $article = Article::findOrFail($id);
        $user = Auth::user()->id;
        $cp = DB::table('profiles')->count();
        $uidprofile = DB::select('select user_id from profiles');
        return view('publishers.preview', ['article' => $article, 'cp' => $cp, 'uid' => $user, 'uidp' => $uidprofile]);
    }

    public function showprofile(){
        return view('publishers.edit-profile');
    }

    public function createprofile(Request $request)
    {
        /**
         * Request validation
         *
         */
        $request->validate([
            'image' => 'required',
            'cover' => 'required',
            'redbubble' => 'required|string|max:500',
            'teepublic' => 'required|string|max:500'
        ]);

        /**
         * Insert into articles
         *
         */
        $user = User::find(Auth::user()->id);
        $profile = new Profile();

        $profile->user_id = $request->input('user_id');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('images', $filename);

            $profile->image = $filename;
        }
        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('covers', $filename);

            $profile->cover = $filename;
        }
        $profile->redbubble = $request->input('redbubble');
        $profile->teepublic = $request->input('teepublic');

        $user->profile()->save($profile);
        return redirect()->route('profile',[Auth::user()->id])->with('success','Your profile has been updated successfuly. ');
    }

    public function editprofile(Request $request,$id){
/**
         * Request validation
         *
         */
        $request->validate([
            'image' => 'required',
            'cover' => 'required',
            'redbubble' => 'required|string|max:500',
            'teepublic' => 'required|string|max:500'
        ]);

        /**
         * Insert into articles
         *
         */
        $uid = Auth::user()->id;

        $profile = Profile::findOrFail($id);
        $image_path = public_path('images').'/'.$profile->image;
        unlink($image_path);

        $cover_path = public_path('covers').'/'.$profile->cover;
        unlink($cover_path);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('images', $filename);

            $image = $filename;
        }
        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('covers', $filename);

            $cover = $filename;
        }
        $redbubble = $request->input('redbubble');
        $teepublic = $request->input('teepublic');

        DB::update('update profiles set image = ?, cover = ?, redbubble = ?, teepublic = ? where id = ?',[$image,$cover,$redbubble,$teepublic,$id]);
        
        return redirect()->route('profile',[$uid])->with('success','Your profile has been updated successfuly. ');
    
    }

    public function like($id)
    {

        /**
         * Update an article
         */
        $article = Article::find($id);
        $likes = $article->likes + 1;

        DB::update('update articles set likes = ? where id = ?',[$likes,$id]);

        return redirect()->route('preview',[$id,$article->title,Auth::user()->username]);
    }


    public function card(){
        $user = User::find(Auth::user()->id);
        if($user->articles != null)
            $nbre = $user->articles->count();
        else $nbre = 0;
        $likes = $user->articles->sum('likes');
        $profile = $user->profile;
        $publishers = User::all();

        return view('publishers.card-profile', ['user' => $user,
            'nbre' => $nbre,
            'likes' => $likes,
            'profile' => $profile,
            'publishers' => $publishers
        ]);
    }

    public function delAccount($id){
        
        $acc = User::findOrFail(Auth::user()->id);
        $acc->articles()->delete();
        $acc->profile()->delete();

        $acc->delete();

        return redirect('/')->with('success','Your account has been removed.');;
    }

    public function settings(){
        $uid = User::find(Auth::user()->id);
        $profile = $uid->profile;
        return view('Publishers.settings',['profile' => $profile]);
    }

    public function profileSettings(){
        $uid = User::find(Auth::user()->id);
        $profile = $uid->profile;
        return view('Publishers.profileSettings',['profile' => $profile]);
    }

    public function personalSettings(){
        $uid = User::find(Auth::user()->id);
        $profile = $uid->profile;
        return view('Publishers.personalSettings',['profile' => $profile]);
    }

    public function updateProfileSettings(Request $request){

        /**
         * Request validation
         *
         */
        $request->validate([
            'image' => 'required',
            'cover' => 'required',
            'redbubble' => 'required|string|max:500',
            'teepublic' => 'required|string|max:500'
        ]);

        /**
         * user profile settings
         */
        $uid = User::find(Auth::user()->id);
        $setProfile = $uid->profile;
        
        $image_path = public_path('images').'/'.$setProfile->image;
        unlink($image_path);
        $cover_path = public_path('covers').'/'.$setProfile->cover;
        unlink($cover_path);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('images', $filename);

            $image = $filename;
        }
        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('covers', $filename);

            $cover = $filename;
        }
        $redbubble = $request->input('redbubble');
        $teepublic = $request->input('teepublic');
        DB::update('update profiles set image = ?, cover = ?, redbubble = ?, teepublic = ? where id = ?',[$image,$cover,$redbubble,$teepublic,$uid->profile->id]);
        
        return redirect()->back()->with('success','Changes have been made successfuly.');
    }

    public function updatePersonalSettings(Request $request, $id){

        /**
         * Request validation
         *
         */
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:5',
            'email' => 'required|string|email|max:255',
        ]);

        /**
         * user personel settings
         */
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        DB::update('update users set name = ?, username = ?, email = ? where id = ?',[$name,$username,$email,Auth::user()->id]);
        
        return redirect()->route('personalSettings',[Auth::user()->id, Auth::user()->username])->with('success','Changes have been made successfuly.');
    }

}
