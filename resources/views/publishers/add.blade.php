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

    <section>
        <div class="grid_head">
            <a href="{{ url()->previous() }}" class="text-decoration-none"><i class="las la-arrow-left"></i></a>
            <span>{{ __('Add artwork') }}</span>
        </div>

        @if(Session::get('success'))
            <span class="success-msg">
                {{ Session::get('success') }}
            </span>
        @endif

        <div class="" id="ajouterEtudiant">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ route('create') }}" method="post" encType="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <div class="">
                                    <input type="hidden" class="form-control" id="user_id" name="user_id" value={{Auth::user()->id}}>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div>
                                    <div class="mb-2">
                                        <div class="">Set a title</div>
                                    </div>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="">
                                
                                    @error('title')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="">
                                    <div class="mb-2">
                                        <div class="">Upload an image</div>
                                    </div>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

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
                                        <div class="">Describe your artwork</div>
                                    </div>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Describe your artwork...">

                                    @error('description')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <div class="">
                                    <div class="mb-2">
                                        <div class="">Select a collection</div>
                                    </div>
                                    <select name="collection" id="collection"  class="form-control @error('collection') is-invalid @enderror">
                                        <option value="Beauty & Nature">Beauty & Nature</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Mixt Art">Mixt Art</option>
                                        <option value="Other">Other</option>
                                    </select>

                                    @error('collection')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="">
                                    <input type="hidden" class="form-control" id="likes" name="likes" value="0">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <a href="{{ url()->previous() }}" class="text-decoration-none text-light">Cancel</a>
                                </button>
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
