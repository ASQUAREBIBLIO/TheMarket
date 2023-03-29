@extends('layouts.layout')

@section('content')
<div class="header position-fixed">
    <div class="header-container">
        <nav class="top-nav">
            <a class="active text-decoration-none" href="javascript:0">
                <div>
                    <img src="/astore.png" alt="astore_logo">
                </div>
                <span>{{__(' Astore')}}</span>
            </a>
                <div class="right-top-nav">
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
        <div class="grid_head">
            <a href="{{ url()->previous() }}" class="text-decoration-none"><i class="las la-arrow-left"></i></a>
            <span>{{__('Preview')}}</span>
        </div>

        @if(session('success'))
        <div class="success">
            <p>
                {{ session('success') }}<a href="{{ route('create') }}">{{__(' Add an artwork !')}}</a>
            </p>
        </div>
        @endif

        <div class="flex">
            <div class="flex_card">
                <article class="artwork-img">
                    <img src="/artworks/{{ $article->image }}" alt="artwork_image" />
                </article>
                <article>
                    <div class="card_content">
                        <div>
                            <h5>
                                {{ $article->title }}
                                @if($uid != $article->user->id)
                                    {{__('By')}} 
                                    <a href="{{route('publisher',[$article->user->id, $article->user->username])}}" class="text-decoration-underline text-black-50">
                                        {{ $article->user->username }}
                                    </a>
                                @else
                                    {{__('By')}} 
                                    <a href="{{route('profile',[$article->user->id, $article->user->username])}}" class="text-decoration-underline text-black-50">
                                        {{ $article->user->username }}
                                    </a>
                                @endif
                            </h5>
                        </div>

                        <div>
                            <p>
                                {{ $article->description }}
                            </p>
                        </div>

                        <div>
                            <strong>{{ $article->collection }}</strong>
                        </div>

                        <div>
                            <button onclick="like()"
                                class="thumbs-up" id="thumbs">
                                <i class="las la-thumbs-up"></i>{{__(' like')}}
                            </button>
                            @if($uid == $article->user->id)
                            <button onclick="if(confirm('Are you sure ?')){
                                    event.preventDefault();
                                    document.getElementById(
                                    'delete-form-{{$article->id}}').submit();
                                }"
                                 class="del-btn-prev text-decoration-none">
                                <i class="las la-trash"></i>{{__(' remove')}} 
                            </button>

                            <button class="edit-btn-prev">
                                <a href="{{route('edit',[$article->id, $article->title, Auth::user()->username])}}" class="text-decoration-none">
                                    <i class="la la-pencil"></i>{{__(' edit')}}
                                </a>
                            </button>
                            @endif
                        </div>

                        <form id="like-form-{{$article->id}}" action="{{route('like',[$article->id, $article->title, Auth::user()->username])}}" method="POST">
                            @csrf
                            @method('PUT')
                        </form>

                        <form id="delete-form-{{$article->id}}" action="{{route('delete',[$article->id, $article->title, Auth::user()->username])}}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </article>
            </div>
        </div>
    </section>
    <footer>
        @include('publishers.footer')
    </footer>
    <script>
        function like(){
            event.preventDefault();
            document.getElementById('like-form-{{$article->id}}').submit();
            var likebtn = document.getElementById('thumbs');
            likebtn.style.display = "none";
        }
    </script>
@endsection
