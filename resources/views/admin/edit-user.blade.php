@extends('layouts.admin')

<!-- Push a style dynamically from a view -->
@push('styles')
    <link href="{{ asset('css/admin/edit-user.css') }}" rel="stylesheet">
@endpush
<!-- Push a style dynamically from a view -->

@push('scripts')
    <script src="{{ asset('js/admin/block-user.js') }}" defer></script>
@endpush

@section('content')
    <div class="container">
        <div id="user-profile-2" class="user-profile">
            <div class="tabbable">


                <div class="tab-content no-border padding-24">
                    <div id="home" class="tab-pane in active">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 center">
                                <span class="profile-picture">
                                    <img class="editable img-responsive" alt=" Avatar" id="avatar2"
                                         src="{{ $user->profile->profileImage() }}">
                                </span>

                                <div class="space space-4 pt-2"></div>
                                @if($user->status == 'active')
                                    <button type="submit" class="btn btn-sm btn-block btn-success blocking-user"
                                            data-id="{{ $user->id }}" data-status="{{ $user->status }}">Active
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-sm btn-block btn-danger blocking-user"
                                            data-id="{{ $user->id }}" data-status="{{ $user->status }}">Inactive
                                    </button>
                                @endif

                            </div><!-- /.col -->

                            <div class="col-xs-12 col-sm-9">
                                <h4 class="blue">
                                    <span class="middle">{{$user->name}}</span>


                                </h4>

                                <div class="profile-user-info">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Username</div>

                                        <div class="profile-info-value">
                                            <span>{{$user->username}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Location</div>

                                        <div class="profile-info-value">
                                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                                            <span>Netherlands</span>
                                            <span>Amsterdam</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Email</div>

                                        <div class="profile-info-value">
                                            <span>{{$user->email}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Joined</div>

                                        <div class="profile-info-value">
                                            <span>{{ $user->created_at }}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Last Online</div>

                                        <div class="profile-info-value">
                                            <span>3 hours ago</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="hr hr-8 dotted"></div>

                                <div class="profile-user-info">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Website</div>

                                        <div class="profile-info-value">
                                            <a href="#" target="_blank">www.alexdoe.com</a>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name">
                                            <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                                        </div>

                                        <div class="profile-info-value">
                                            <a href="#">Find me on Facebook</a>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name">
                                            <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                                        </div>

                                        <div class="profile-info-value">
                                            <a href="#">Follow me on Twitter</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="space-20"></div>


                    </div><!-- /#home -->


                </div><!-- /#pictures -->
            </div>
        </div>
    </div>

@endsection
