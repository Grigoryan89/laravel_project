@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 col-md-offset-2">

                <h1>Create post</h1>

                <form action="/post" method="post" enctype="multipart/form-data">
                    @csrf @method('POST')

                    <div class="form-group">

                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                        name="title" value="{{ old('title') }}" placeholder="title" required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <input id="description" type="description" class="form-control @error('description') is-invalid @enderror"
                               name="description" value="{{ old('description') }}" placeholder="description" required autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-md-4 col-form-label  @error('image')is-invalid @enderror ">Post Image</label>

                        <input type="file" id="image" name="image" class="form-control-file">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                        <button class="btn btn-default">
                            Cancel
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
