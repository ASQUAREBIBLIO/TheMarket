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
                        <a href="{{route('profile',[Auth::user()->id, Auth::user()->username])}}}" class="text-decoration-none">
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
        <div class="grid_head p-0 pb-3">
            <a href="{{ url()->previous() }}" class="text-decoration-none"><i class="las la-arrow-left"></i></a>
            <span>{{__("Settings") }}</span>
        </div>

        @if(session('success'))
        <div class="success">
            <p>
                {{ session('success') }}
            </p>
        </div>
        @endif

        <div class="d-flex justify-content-left bg-white border border-dark-50 rounded p-0 list-style-none" style="width: 100%;">
            <div class="set-side-bar bg-light text-light column">
                <div>
                    <div>
                        @if(!Auth::user()->profile)
                            <img src="/images/avatar.png" alt="marketplace_image" width="35"/>
                        @else
                            <img src="/images/{{Auth::user()->profile->image}}" alt="marketplace_image" width="35"/>
                        @endif
                    </div>
                </div>
                <div class="pt-4 pb-3" style="border-bottom: 1px solid #ddd;">
                    <div><a href="{{route('home')}}" class="text-decoration-none text-dark">{{__('Artworks')}}</a></div>
                    <div><a href="{{route('profile',[Auth::user()->id, Auth::user()->username])}}" class="text-decoration-none text-dark">{{__('Profile')}}</a></div>
                    <div><a href="{{route('card-profile',[Auth::user()->id, Auth::user()->username])}}" class="text-decoration-none text-dark">{{__('Profile Card')}}</a></div>
                    <div><a href="{{route('create')}}" class="text-decoration-none text-dark">{{__('Add New Artwork')}}</a></div>
                </div>
                <div class="pt-3">
                    <div><a href="{{route('settings',[Auth::user()->id, Auth::user()->username])}}" class="text-decoration-none text-dark">{{__('Seetings')}}</a></div>
                    <div><a href="{{route('profileSettings',[Auth::user()->id, Auth::user()->username])}}" class="text-decoration-none text-dark">{{__('Profile Seetings')}}</a></div>
                    <div><a href="{{route('personalSettings',[Auth::user()->id, Auth::user()->username])}}" class="text-decoration-none text-dark">{{__('Personal Seetings')}}</a></div>
                </div>
            </div>
            <div class="set-panel" style="width: 100%;">
                <div class="grid_head p-0 pb-3">
                    <span>{{__('Edit your personal information')}}</span>
                </div>
                <div>
                    <form style="width: 100%;" action="{{route('personalSettings',[Auth::user()->id, Auth::user()->username])}}" method="post">
                        @csrf
                        @method('PUT')
                
                        <div>
                            <div>
                                <div style="width: 100%;">
                                    <div >
                                        <div class="mb-3">
                                            <div class="">
                                                <input type="hidden" class="" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                                            </div>
                                        </div>
            
                                        <div class="mb-3">
                                            <div>
                                                <div class="mb-2">
                                                    <div class="">Full name</div>
                                                </div>
                                                <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" required>
                                            </div>
                                        </div>
            
                                        <div class="mb-3">
                                            <div>
                                                <div class="mb-2">
                                                    <div class="">Username</div>
                                                </div>
                                                <input type="text" class="form-control" id="username" name="username" value="{{Auth::user()->username}}" required>
                                            </div>
                                        </div>
            
                                        <div class="mb-3">
                                            <div>
                                                <div class="mb-2">
                                                    <div class="">Email</div>
                                                </div>
                                                <input type="email" class="form-control @error('password') is-invalid @enderror" id="email" name="email" value="{{Auth::user()->email}}">
                                                @error('email')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="submit" value="Save changes" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
        <style>
            .set-side-bar,.set-panel{padding: 30px;}
            .set-icon{top: 3px; left: 215px;}
            .del-acc {width: 180px;}
            @media (max-width: 490px){
                .set-icon{left: 190px;}
            }
            @media (max-width: 458px){
                .set-icon{left: 150px;top: 20px;}
            }
            @media (max-width: 408px){
                .set-side-bar,.set-panel{padding: 10px;}
                .set-icon{left: 190px; top: 3px;}
                .del-acc{width: 120px;}
            }
            @media (max-width: 381px){
                .set-icon{left: 150px;top: 20px;}
            }
            @media (max-width: 340px){
                .set-icon{left: 130px;top: 20px;}
            }
        </style>
    </section>

    <footer>
        @include('publishers.footer')
    </footer>
@endsection