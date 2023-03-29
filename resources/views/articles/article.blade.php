@extends('layouts.layout')

@section('content')
    <div class="header">
        <div class="header-container">
            <nav class="top-nav">
                <a class="active text-decoration-none">
                    <div>
                        <img src="/astore.png" alt="astore_logo">
                    </div>
                    <span>{{__(' Astore')}}</span>
                </a>
                <div class="right-top-nav">
                    <a href="{{ route('register')}}" class="sign_btn text-decoration-none">{{__('Sign up for free')}}</a>
                    <a href="{{route('login')}}" class="login_btn text-decoration-none">
                        <span>{{__('Login')}}</span>
                        <i class="las la-arrow-right"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <section>
        <div class="grid_head">
            <a href="{{ url()->previous() }}" class="text-decoration-none"><i class="las la-arrow-left"></i></a>
            <span>{{__('Preview')}}</span>
        </div>

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
                                {{__('By')}} 
                                <a href="{{route('publishers',[$article->user->id, $article->user->username])}}" class="text-decoration-underline text-black-50">
                                    {{ $article->user->username }}
                                </a>
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
                            <button class="thumbs-up" id="thumbs">
                                {{ $article->likes }}<i class="las la-thumbs-up"></i>
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <footer>
        @include('publishers.footer')
    </footer>
@endsection
