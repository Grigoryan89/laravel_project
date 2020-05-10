@extends('layouts.admin')

<!-- Push a style dynamically from a view -->
@push('styles')
    <link href="{{ asset('css/admin/dashboard.css') }}" rel="stylesheet">
@endpush
<!-- Push a style dynamically from a view -->

@push('script')
{{--    <link href="{{ asset('js/admin/admin.js') }}" rel="stylesheet">--}}
@endpush

@section('content')


    <main role="main">

        <section class="panel important">
            <h2>Write Some News</h2>
            <ul>
                <li>Maybe</li>
            </ul>
        </section>

        <section class="panel important">
            <h2>Write a post</h2>
            <form action="" method="post">
                <div class="twothirds">
                    Blog title:<br/>
                    <input type="text" name="title" size="40"/><br/><br/>
                    Content:<br/>
                    <textarea name="newstext" rows="15" cols="67"></textarea><br/>
                </div>
                <div>
                    <input type="submit" name="submit" value="Save" />
                </div>

            </form>
        </section>

    </main>


@endsection
