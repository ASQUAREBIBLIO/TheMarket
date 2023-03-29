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
                        <a href="{{route('profile',[$article->user->id, $article->user->username])}}" class="text-decoration-none">
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

    <section>

        <div class="grid_head">
            <a href="{{ url()->previous() }}" class="text-decoration-none"><i class="las la-arrow-left"></i></a>
            <span>{{ Auth::user()->name }}</span>
        </div>
        
        <div>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action = "{{ route('showprofile') }}" method="post" encType="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <div class="">
                                    <input type="hidden" class="form-control" id="user_id" name="user_id" value={{Auth::user()->id}}>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="">
                                    <div class="mb-2">
                                        <div class="">Upload an image</div>
                                    </div>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                    <span style="font-size: 12px;font-weight: bold;">{{_('recommended: 512/512px')}}</span>
                                    @error('image')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="">
                                    <div class="mb-2">
                                        <div class="">Upload a cover</div>
                                    </div>
                                    <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover">
                                    @error('cover')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="">
                                    <div class="mb-2">
                                        <div class="">Redbubble marketplace</div>
                                    </div>
                                    <input type="text" class="form-control @error('redbubble') is-invalid @enderror" id="redbubble" name="redbubble" 
                                        placeholder="your-store-name.redbubble.com"
                                    >
                                    @error('redbubble')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="">
                                    <div class="mb-2">
                                        <div class="">Teepublic store</div>
                                    </div>
                                    <input type="text" class="form-control @error('teepublic') is-invalid @enderror" id="teepublic" name="teepublic" 
                                        placeholder="https://www.teepublic.com/your-store-username"
                                    >
                                    @error('teepublic')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <a href="{{ url()->previous() }}" class="text-decoration-none text-light">Cancel</a>
                                </button>
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>

                        <div>
                            <button onclick="if(confirm('Are you sure ?')){
                                event.preventDefault();
                                document.getElementById(
                                'delAccount-form-{{Auth::user()->id}}').submit();
                            }"
                             class="del-acc">
                                <i class="las la-trash"></i> {{__('Delete')}}
                            </button>
                        
                            <form id="delAccount-form-{{Auth::user()->id}}" action="{{ route('delAccount', Auth::user()->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
