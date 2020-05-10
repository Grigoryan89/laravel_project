@extends('layouts.admin')

<!-- Push a style dynamically from a view -->
@push('styles')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endpush
<!-- Push a style dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/admin/users.js') }}" defer></script>
@endpush

@section('content')

    <div class="container" >
        <div class="col-sm-6 text-left"> <h4>Users List</h4></div>
        <div class="row ">
        <table class="table table-hover table-bordered">
            <tr class="success">
                <th>ID</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Posts Count</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        @foreach($users as $user)
            @if($user->user_type != 'admin')
                <tr>
                    <td><p>{{ $user->id }}</p></td>
                    <td><p>{{ $user->name }}</p></td>
                    <td><p>{{ $user->username }}</p></td>
                    <td><p>{{ $user->email }}</p></td>
                    <td><p>{{ $user->posts->count() }}</p></td>
                    <td><p>{{ $user->status }}</p></td>
                    <td><a class="btn btn-primary"  href="/admin/user/{{ $user->id }}/edit">Edit</a></td>
                    <td><button class="btn btn-danger delete-user"  data-id="{{ $user->id }}">Delete</button></td>
                </tr>
                @endif
                     @endforeach
        </table>
            <col-12 class="text-center">
                {{ $users->links() }}
            </col-12>

        </div>
    </div>
@endsection
