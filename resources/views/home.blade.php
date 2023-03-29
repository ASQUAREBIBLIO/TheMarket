@extends('layouts.layout')

@section('content')
    <div class="header position-fixed">
        <div class="header-container">
            <nav class="top-nav">
                <a class="active text-decoration-none" href="javascript:0">
                    <div>
                        <img src="astore.png" alt="astore_logo">
                    </div>
                    <span>{{__(' Astore')}}</span>
                </a>
                <div class="right-top-nav">
                    <a class="stats">{{ $design }}<i class="las la-tshirt"></i></a>
                    <a class="stats">{{ $likes }}<i class="las la-thumbs-up"></i></a>
                    <div class="d-flex">
                        <a href="{{route('profile',[Auth::user()->id, Auth::user()->username])}}" class="text-decoration-none">
                            <div class="profile_avatar">
                                <div>
                                    @if(!Auth::user()->profile)
                                        <img src="/images/avatar.png" alt="marketplace_image" class="image"/>
                                    @else
                                        <img src="/images/{{Auth::user()->profile->image}}" alt="marketplace_image" class="image"/>
                                    @endif
                                </div>
                                <span>{{ Auth::user()->username}}</span>
                            </div>
                        </a>

                        <label for="check" class="icon-toggle">
                            <i class="bars-icon las la-align-right"></i>
                            <i class="vanish las la-arrow-left position-absolute"></i>
                        </label>
                    </div>
                </div>
                <style>
                    a.stats, a.stats i{color: black; text-decoration: none; font-weight: bold;}
                </style>
            </nav>

            <input type="checkbox" id="check">
            <div class="drop-menu position-absolute">
                <div>
                    <a href="{{route('profile',[Auth::user()->id, Auth::user()->username])}}" class="text-decoration-none">
                        <div class="profile_avatar d-flex">
                            <div>
                                @if(!Auth::user()->profile)
                                    <img src="/images/avatar.png" alt="marketplace_image" class="image"/>
                                @else
                                    <img src="/images/{{Auth::user()->profile->image}}" alt="marketplace_image" class="image"/>
                                @endif
                            </div>
                            <span>{{ Auth::user()->username}}</span>
                            <div class="icon-angle position-absolute">
                                <i class="las la-angle-right"></i>
                            </div>
                        </div>
                    </a>

                    <div class="drop-menu-items">
                        <a href="/home">
                            {{__('Artworks')}}
                        </a>

                        <a href="{{route('profile',[Auth::user()->id, Auth::user()->username])}}">
                            {{__('Account')}}
                        </a>

                        <a href="{{ route('create') }}" class="create_btn">
                            {{__('Add an artwork')}}
                        </a>


                        <a class="log_btn text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <section class="pt-5">
        <div class="grid-list">
            <h4 class="m-0">{{__('Artworks')}}</h4>
            <h6 class="text-black-50 mb-1">{{ $nbre }} {{__('Designs')}}</h6>

            <form action="{{ route('home') }}" method="post" encType="multipart/form-data" class="mb-3 d-flex" style="height: 35px;">
                @csrf
                <div class="mb-3">
                    <div class="">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value={{Auth::user()->id}}>
                    </div>
                </div>

                <div>
                    <div class="">
                        <select name="collection" id="collection"  class="@error('collection') is-invalid @enderror" style="height: 35px;border: 1px solid #ddd;">
                            <option value="All" class="bg-light">All</option>
                            <option value="Beauty & Nature" class="bg-light">Beauty & Nature</option>
                            <option value="Sport" class="bg-light">Sport</option>
                            <option value="Mixt art" class="bg-light">Mixt Art</option>
                            <option value="Other" class="bg-light">Other</option>
                        </select>

                        @error('collection')
                            <span class="invalid-feedback text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="filter">
                    <button class="" type="submit">{{__('Filter')}}</button>
                </div>

                <style>
                    .filter button{
                        background-color: black;
                        color: white;
                        border-radius: 0 5px 5px 0;
                        height: 100%;
                        padding: 0 15px;
                    }
                </style>
            </form>

            @if($nbre != 0)
                <div class="grid">
                    @foreach ($articles as $article)
                        <article>
                            <a href="{{route('preview',[$article->id, $article->title, $article->user->username])}}" class="text-decoration-none text-black">
                                <div class="product">
                                    <img src="/artworks/{{ $article->image }}" alt="artwork_image">
                                </div>
                                <div class="gridtext">
                                    <h5>{{ $article->title }}</h5>
                                    @if($uid != $article->user->id)
                                    <h6>{{__('By')}} 
                                        <a href="{{route('publisher',[$article->user->id, $article->user->username])}}" class="text-decoration-underline text-black-50">{{ $article->user->username }}</a>
                                    </h6>
                                    @else
                                    <h6>{{__('By')}} 
                                        <a href="{{route('profile',[$article->user->id, $article->user->username])}}" class="text-decoration-underline text-black-50">{{ $article->user->username }}</a>
                                    </h6>
                                    @endif
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @else
                <em>{{__('Nothing to show.')}}</em>
            @endif
            <div class="d-flex justify-content-center pt-5">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
    <footer>
        @include('publishers.footer')
    </footer>
@endsection
