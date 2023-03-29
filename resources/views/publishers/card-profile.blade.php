@extends ('layouts.layout')

@section('content')
    <div class="header">
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
                        <a class="home-icon" href="{{ route('home') }}"><i class="la la-home"></i></a>
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
                            </div>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <section class="avatar-card">
        <div class="position-relative">
            <h4>{{__('Publishers')}}</h4>
            <div class="publishers-profiles">
                @foreach ($publishers as $publisher)
                    @if(Auth::user()->id != $publisher->id)
                        @if($publisher->profile)
                            <div>
                                <abbr title="{{ $publisher->username }}">
                                    <a href="{{route('publisher',[$publisher->id, $publisher->username])}}">
                                        <img src="/images/{{ $publisher->profile->image }}"/>
                                    </a>
                                </abbr>
                            </div>
                        @else
                            <div>
                                <abbr title="{{ $publisher->username }}">
                                    <a href="{{route('publisher',[$publisher->id, $publisher->username])}}">
                                        <img src="/images/avatar.png"/>
                                    </a>
                                </abbr>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>

        <div>
            <div class="card-profile">
                <div class="card-profile-cover">
                    @if( !$profile )
                        <img src="/covers/cover.jpg" alt="marketplace_cover" class="cover"/>
                        <a href="{{ route('profile', Auth::user()->id) }}">
                            <img src="/images/avatar.png" alt="marketplace_image" class="image"/>
                        </a>
                    @else
                        <img src="/covers/{{$user->profile->cover}}" alt="marketplace_cover" class="cover"/>
                        <a href="{{route('profile',[Auth::user()->id, Auth::user()->username])}}">
                            <img src="/images/{{$user->profile->image}}" alt="marketplace_image" class="image"/>
                        </a>
                    @endif
                </div>

                <div class="card-details">
                    <div>
                        <strong>{{ Auth::user()->name }}</strong><br>
                        <span>{{ Auth::user()->username }}</span>
                        <span>{{ Auth::user()->email }}</span>
                        <div class="btns d-block mt-2">
                            @if( $profile )
                                <a class="edit">{{ $nbre }}<i class="las la-tshirt"></i></a>
                                <a class="add">{{ $likes }}<i class="las la-thumbs-up"></i></a>
                                <a href="{{$user->profile->redbubble}}" class="rb"> <img src="/RB.png"/> </a>
                                <a href="{{$user->profile->teepublic}}" class="tp"><img src="/TP_logo.png" /></a>
                                <a href="{{ route('settings',[Auth::user()->id, Auth::user()->username]) }}" class="edit"><i class="la la-pencil"></i></a>
                            @else
                                <a class="edit">{{ $nbre }}<i class="las la-tshirt"></i></a>
                                <a class="add">{{ $likes }}<i class="las la-thumbs-up"></i></a>
                                <a href="https://www.redbubble.com/" class="rb"> <img src="/RB.png" /></a>
                                <a href="https://www.teepublic.com/" class="tp"><img src="/TP_logo.png" /></a>
                                <a href="{{ route('settings',[Auth::user()->id, Auth::user()->username]) }}" class="edit"><i class="la la-pencil"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="rem-mssge">
            <p>
                {{ session('success') }}
            </p>
        </div>
        @endif
    </section>
    <footer>
        @include('publishers.footer')
    </footer>
@endsection