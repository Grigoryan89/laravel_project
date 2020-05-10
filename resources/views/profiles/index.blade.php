
@extends('layouts.app')
<!-- Push a style dynamically from a view -->
@push('styles')
    <link href="{{ asset('css/profiles/index.css') }}" rel="stylesheet">
@endpush
<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/profiles/index.js') }}" defer></script>
@endpush

@section('content')


    <div class="wrapper">
        <header>
            <nav>
                <div class="menu-icon">
                    <i class="fa fa-bars fa-2x"></i>
                </div>
                <div class="logo">
                    <a class="navbar-brand d-flex" href="{{ url('/profile') }}">
                        <div class="pr-2 pt-1" style="color: lightyellow">Hello </div>
                        <div><img src="https://blog.cool-tabs.com/en/wp-content/uploads/2015/05/apps_contenidos_instagram-e1430844862778.png" style="border-left:solid #ffffff;height: 25px" class="pl-2"></div>
                    </a>
                </div>
                <div class="menu">
                    @if(Session::has('status'))
                        <div class="alert alert-success">
                            {{Session::get('status')}}
                        </div>
                    @endif
                    <ul>
                        @auth()
                        <li><a href="/profile/{{ auth()->user()->id}}">Home</a></li>
                        @endauth
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                            <li class="nav-item dropdown" style="height: 190px">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                    </ul>
                </div>

            </nav>
        </header>
        <div class="content">
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>

@endsection
