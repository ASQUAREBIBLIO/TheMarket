@extends('layouts.layout')

@section('content')

    <section>
        <div class="grid_head">
            <a href="{{ url()->previous() }}" class="text-decoration-none"><i class="las la-arrow-left"></i></a>
            <span>{{ $user->name }}</span>
        </div>

        <div class="profile pt-0 d-flex justify-content-center text-center">
            <div class="profile_flex pb-3 border-bottom border-dark-50">
                <div class="profile_banner">
                    <div class="profile_banner_head">
                        @if( !$profile )
                            <img src="/covers/cover.png" alt="marketplace_cover" class="cover"/>
                            <img src="/images/avatar.png" alt="marketplace_image" class="image"/>
                        @else
                            <img src="/covers/{{$user->profile->cover}}" alt="marketplace_cover" class="cover"/>
                            <img src="/images/{{$user->profile->image}}" alt="marketplace_image" class="image"/>
                        @endif
                    </div>

                    <div class="mt-5">
                        <h5>{{ $user->name }}</h5>
                        <h6>{{ $user->username }}</h6>
                        <h6>{{ $nbre }} {{__('Designs | ')}} {{$likes}} {{__('Likes')}} </h6>
                    </div>
                </div>

                <div class="d-block">
                    @if( $profile )
                        <a href="{{$user->profile->redbubble}}" class="rb"> <img src="/RB.png"/> </a>
                        <a href="{{$user->profile->teepublic}}" class="tp"><img src="/TP_logo.png" /></a>
                        <a class="accueil" href="{{ route('articles') }}"><i class="la la-home"></i></a>
                    @else
                        <a href="https://www.redbubble.com/" class="rb"> <img src="/RB.png" /></a>
                        <a href="https://www.teepublic.com/" class="tp"><img src="/TP_logo.png" /></a>
                        <a class="accueil" href="{{ route('articles') }}"><i class="la la-home"></i></a>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid-list">
            <h4 class="m-0">{{__('Artworks')}}</h4>
            <h6 class="text-black-50 mb-4">{{ $nbre }} {{__('Designs')}}</h6>
            @if($nbre != 0)
            <div class="grid">
                @foreach ($artPublisher as $article)
                    <article>
                        <a class="text-decoration-none text-black">
                            <a  href="{{route('article',[$article->id, $article->title, $article->user->username])}}">
                                <div class="product">
                                    <img src="/artworks/{{ $article->image }}" alt="artwork_image">
                                </div>
                            </a>
                            <div class="gridtext">
                                <h5>{{ $article->title }}</h5>
                                <div class="d-flex">
                                    <span class="likes-btn">{{ $article->likes }} <i class="las la-thumbs-up"></i></span>
                                </div>
                            </div>
                        </a>    
                    </article>
                @endforeach
            </div>
            @else
                <div class="d-flex justify-content-center">
                    <img src="/design_concept.png" width="300px"/>
                </div>
            @endif
        </div>
    </section>
    <footer>
        @include('publishers.footer')
    </footer>
@endsection
