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
            <span>{{__('Artworks')}}</span>
        </div>

        <div class="grid-list">
            @if($ca != 0)
            <div class="grid">
                @foreach ($articles as $article)
                    <article>
                        <a href="{{route('article',[$article->id, $article->title, $article->user->username])}}" class="text-decoration-none text-black">
                            <div class="product">
                                <img src="/artworks/{{ $article->image }}" alt="artwork_image">
                            </div>
                            <div class="gridtext">
                                <h5>{{ $article->title }}</h5>
                                <h6>{{__('By')}} 
                                    <a href="{{route('publishers',[$article->user->id, $article->user->username])}}" class="text-decoration-underline text-black-50">{{ $article->user->username }}</a>
                                </h6>
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

        <div class="grid_head">
            <span>{{__('Picked for you')}}</span>
        </div>

        <div class="d-flex justify-content-center" style="margin-bottom: 50px;">
            <div class="rb-store">
                <script type="text/javascript" src="https://www.redbubble.com/assets/external_portfolio.js"></script>
                <script id="rb-xzfcxvzx" type="text/javascript">new RBExternalPortfolio('www.redbubble.com', 'philo10', 1, 3).renderIframe();</script>
            </div>
        </div>
    </section>
    <footer>
        @include('publishers.footer')
    </footer>
@endsection
