@extends('dashboard.layouts.app')

<style>
    .user-photo {
        width: 40px;
        height: auto;
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
                        <li class="breadcrumb-item active" aria-current="page">guests</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.guest.create') }}" class="btn btn-dark">Add New</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                @include('notifications.flash-messages')
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if ($guests->count())
                        <tbody>
                            @foreach ($guests as $guest)
                            <tr>
                                <td>{{ $guest->id }}</td>
                                <td>{{ $guest->full_name }}</td>
                                <td>{{ $guest->phone }}</td>
                                <td>{{ $guest->address }}</td>
                                <td>{{ $guest->city }}</td>
                                <td>{{ $guest->status }}</td>
                                <td>
                                    <div class="d-flex justify-content-space">
                                        @if ($guest->deleted_at)
                                        <form action="{{ route('dashboard.hotel.guests.restore', $guest->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success">Restore</button>
                                        </form>
                                        @else
                                        <a href="{{ route('dashboard.hotel.guest.edit', $guest->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('dashboard.hotel.guest.destroy', $guest->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this guest?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <td colspan="7"><h4>No Available Guest</h4></td>
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
