@extends('layouts.app')

<!-- Push a style dynamically from a view -->
@push('styles')
    <link href="{{ asset('css/profiles/show.css') }}" rel="stylesheet">
@endpush

@section('content')



    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image:url('https://images.unsplash.com/photo-1476984251899-8d7fdfc5c92c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3700&q=80');">
            </div>
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-sm-3">
                        <img src="{{ $profile->profileImage() }}" >

                    </div>
                    <div class="h1">
                        @can('update',$profile)
                        <a href="/profile/{{ $profile->user->id }}/edit">Edit Profile</a>
                        @endcan
                        <h3 class="title ">NAME::     {{ $profile->user->name }}</h3>
                        <h3 class="title">USERNAME::     {{ $profile->user->email }}</h3>
                        <h3 class="title">PROFILE TITLE::     {{ $profile->title }}</h3>
                        <h3 class="title">PROFILE DESCRIPTION::     {{ $profile->description }}</h3>
                        <h3 class="title">PROFILE URL::     {{ $profile->url }}</h3>
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
                <h1 class="title justify-content-center">About me</h1>
                <h5 class="description">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</h5>
                <div class="button-container d-flex justify-content-center pt-5">
                    @can('update',$profile)
                    <a href="/post/create" class="btn btn-primary btn-round btn-lg pl-5">Add Post</a>
                        @endcan
                </div>
                <div class="row">

                <!-- Tab panes -->
                    <div class="tab-content gallery">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="col-md-10 ml-auto mr-auto">
                                <div class="row collections">

                                    @foreach(  $profile->user->posts as $post)
                                    <div class="col-md-3 pt-5">
                                        <a href="/post/{{ $post->id }}"><img src="/storage/{{ $post->image}}" alt="" class="img-raised"></a>
                                    </div>
                                        @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>






@endsection
