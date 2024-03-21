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
                        <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.room.create') }}" class="btn btn-dark">Add New</a>
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
                                <th>Name</th>
                                <th>Categoty Type</th>
                                <th>Image</th>
                                <th>Rate</th>
                                <th>Discounted Rate</th>
                                {{-- <th>Created Date</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if ($rooms->count())
                            <tbody>

                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td>{{ $room->name }}</td>
                                        <td>{{ $room->category->name }}</td>
                                        <td>
                                            Image
                                            {{-- @if (!empty($user->photo))
                                      <img class="img-fluid user-photo " src=" {{ asset('users/avatar/' . $user->avatar) ?? 'Not Available' }}"
                                          alt="">
                                  @else
                                      <img class="img-fluid user-photo" src=" {{ asset('dashboard/assets/images/avatars/user-avatar.png') ?? 'Not Available' }}"
                                          alt="">
                                  @endif --}}
                                        </td>
                                        <td>{{ $room->rate }}</td>
                                        {{-- <td>{{ $user->phone }}</td> --}}
                                        <td>{{ $room->discounted_rate }}</td>
                                        <td>
                                            <div class="d-flex justify-content-space ">
                                                <a href="{{route('dashboard.hotel.room.edit', $room->id)}}" class="btn btn-primary">Edit</a>

                                                <form action="{{route('dashboard.hotel.room.destroy', $room->id)}}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this room?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <h4>No Available Rooms</h4>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    </div>
@endsection
