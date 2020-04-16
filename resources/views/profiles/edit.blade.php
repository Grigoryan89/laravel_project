
@extends('layouts.app')

@section('content')



    <div class="container bootstrap snippet">

        <div class="row">
            <div class="col-sm-10"><h1>Edit Profile </h1></div>
        </div>

        <div class="row">
            <div class="col-sm-9">




                    <div class="text-center">
                        <div class="row col-3">
                            <img src="{{ $profile->profileImage() }}" class="avatar img-circle img-thumbnail" alt="avatar">
                            <h6>Upload a different photo...</h6>
                        </div>
                    </div>

                <form action="/profile/{{ $profile->user->id }}" method="post" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <input type="file" id="image" name="image" class="text-center center-block file-upload pb-5">






                <div class="tab-content">
                    <div class="tab-pane active" id="home">


                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Title</h4></label>
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                                       name="title" value="{{ old('title') ?? $profile->title }}" placeholder="title" required autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Description</h4></label>
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror"
                                       name="description" value="{{ old('description') ?? $profile->description }}" placeholder="description" required autocomplete="description" autofocus>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile"><h4>Url</h4></label>
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror"
                                       name="url" value="{{ old('url') ?? $profile->url }}" placeholder="url" required autocomplete="url" autofocus>

                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                @can('update',$profile)
                                <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

               </form>

            </div>
        </div>

    </div>




@endsection
