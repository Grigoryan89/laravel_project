@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle"
                                 style="max-width: 50px">
                        </div>
                        <div class="pl-3 d-flex">
                            <div class="font-weight-bold"><a
                                    href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                            </div>
                            <div class="pl-3">
                                <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-danger" type="submit">DELETE</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p><span class="font-weight-bold"><a
                                href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a></span></p>
                    <h3><span>Title::  {{ $post->title }}</span></h3>
                    <hr>
                    <h3><span>Description::  {{ $post->description }}</span></h3>

                </div>
            </div>
        </div>
    </div>
@endsection


