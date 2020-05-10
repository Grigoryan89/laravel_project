@extends('layouts.app')

<!-- Push a style dynamically from a view -->
@push('styles')
    <link href="{{ asset('css/profiles/show.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/profiles/show.js') }}" defer></script>
@endpush

@section('content')


    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true"
                 style="background-image:url('https://images.unsplash.com/photo-1476984251899-8d7fdfc5c92c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3700&q=80');">
            </div>
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-sm-3">
                        <img src="{{ $profile->profileImage() }}">

                    </div>
                    <div class="h1">
                        @can('update',$profile)
                            <a href="/profile/{{ $profile->user->id }}/edit">{{ __('Edit Profile') }}</a>
                        @endcan
                        <h3 class="title ">NAME:: {{ $profile->user->name }}</h3>
                        <h3 class="title">USERNAME:: {{ $profile->user->email }}</h3>
                        <h3 class="title">PROFILE TITLE:: {{ $profile->title }}</h3>
                        <h3 class="title">PROFILE DESCRIPTION:: {{ $profile->description }}</h3>
                        <h3 class="title">PROFILE URL:: {{ $profile->url }}</h3>
                    </div>
                </div>
                <div class="content d-flex justify-content-center">
                    <div class="social-description pr-3">
                        <p>My Post</p>
                        <h2>{{ $profile->user->posts->count() }}</h2>
                    </div>
                    <div class="social-description pr-3">
                        <p>Comments</p>
                        <h2>26</h2>
                    </div>
                    <div class="social-description pr-3">
                        <p>Bookmarks</p>
                        <h2>48</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{Session::get('flash_message')}}
                    </div>
                @endif
                <h1 class="title justify-content-center">About me</h1>
                <h5 class="description">An artist of considerable range, Ryan — the name taken by Melbourne-raised,
                    Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm,
                    intimate feel with a solid groove structure. An artist of considerable range.</h5>
                <div class="button-container d-flex justify-content-center pt-5">
                    @can('update',$profile)
                        <a href="/post/create" class="btn btn-primary btn-round btn-lg pl-5">Add Post</a>
                    @endcan
                </div>
                <div class="row">

                    <!-- Tab panes -->
                    <div class="tab-content gallery">

                        @foreach(  $profile->user->posts as $post)
                            <div class="col-7 pt-5 d-flex justify-content-center">
                                <a href="/post/{{ $post->id }}">
                                    <img src="/storage/{{ $post->image}}" class="img-raised">
                                </a>
                                <h3>
                                    {{ $post->title }}
                                    {{ $post->description }}
                                </h3>
                            </div>
                            <div class="col pt-5">
                                @foreach($post->comments as $comment)
                                    <div class="row border border-primary w-50  remove"  >
                                        <div class="col mt-2 d-flex">
                                            <h3>
                                                {{ $comment->comment }}
                                            </h3>
                                        </div>
                                        <div class="mt-2">
                                            @can('delete',$post)
                                                    <button  class="btn btn-danger delete-comment" data-id="{{ $comment->id }}" type="submit">Delete Comment</button>
                                            @endcan
                                                @error('comment')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                @endforeach
                            </div>

                            <form action="/comments" method="POST"
                                  enctype="multipart/form-data">
                                @method('POST')
                                @csrf

                                <div class="form-group w-50 pt-4">


                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input id="comment" type="comment"
                                           class="form-control @error('comment') is-invalid @enderror"
                                           name="comment" value="{{ old('comment') }}"
                                           placeholder="comment" required autocomplete="comment"
                                           autofocus>

                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <button class="btn btn-success" type="submit">Add Comment</button>

                            </form>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>








@endsection
