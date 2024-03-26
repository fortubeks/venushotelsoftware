@extends('dashboard.layouts.app')

<style>
    .user-photo {
        width: 40px;
        height: auto;
    }

    .scrollable-table-container {
        overflow-x: auto;
        max-width: 100%;
        width: 100%;
    }
</style>

@section('contents')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.users.create') }}" class="btn btn-dark">Add New</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                @include('notifications.flash-messages')
                <div class="table-responsive scrollable-table-container">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if($users->count())
                        <tbody>
                            @foreach ($users as $user)
                            @php
                                $userStatus = $user->status;
                                $userStatusColor = '';
                                if ($userStatus == 'active') {
                                    $userStatusColor = 'text-success';
                                }
                                if ($userStatus == 'inactive') {
                                    $userStatusColor = 'text-danger';
                                }
                            @endphp
                                <tr>
                                    <td>
                                        @if (!empty($user->photo))
                                            <img class="img-fluid user-photo "
                                                src=" {{ asset('users/avatar/' . $user->avatar) ?? 'Not Available' }}"
                                                alt="">
                                        @else
                                            <img class="img-fluid user-photo"
                                                src=" {{ asset('dashboard/assets/images/avatars/user-avatar.png') ?? 'Not Available' }}"
                                                alt="">
                                        @endif
                                    </td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ removeUnderscore($user->role) }}</td>
                                    <td class="{{ $userStatusColor }}">{{removeUnderscoreAndCapitalise($user->status 
                                    )}}</td>
                                    <td>{{ $user->created_at->format('D M, Y') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-space ">
                                            <a href="{{ route('dashboard.hotel.users.edit', $user->id) }}"
                                                class="btn bt-sm btn-primary">Edit</a>


                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <td colspan="7"><h4>No Available Users</h4></td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    </div>
@endsection
