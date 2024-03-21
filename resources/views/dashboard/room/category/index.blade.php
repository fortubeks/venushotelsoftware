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
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.room-category.create') }}" class="btn btn-dark">Add New</a>
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
                                {{-- <th>#</th> --}}
                                <th>Name</th>
                                <th>Rate</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if ($room_categories->count())
                            <tbody>

                                @foreach ($room_categories as $category)
                                    <tr>
                                        {{-- <td>{{ $category->id }}</td> --}}
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->rate }}</td>
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
                                        <td>{{ $category->rate }}</td>
                                       
                                        <td>
                                            <div class="d-flex justify-content-space-between ">
                                                <a href="{{route('dashboard.hotel.room-category.edit', $category->id)}}" class="btn btn-primary">Edit</a>

                                                <form action="{{route('dashboard.hotel.room-category.destroy', $category->id)}}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
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
                            <h4>No Available Category</h4>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    </div>
@endsection
