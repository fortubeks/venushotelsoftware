@extends('dashboard.layouts.app')

@section('contents')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <button class="btn btn-dark">Add New</button>
            </div>
        </div>
        <!--end breadcrumb-->
     
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>email</th>
                                <th>Phone</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                           @foreach ($users as $user)
                           <tr>
                            <td>{{$user->first_name}}</td>
                            <td> <img src=" {{ asset('users/avatar/' . $user->avatar) ?? 'Not Available' }}" alt=""> </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->created_at->format('D M, Y')}}</td>
                            <td>
                                <div class="d-flex justify-content-between mr-2">
                                    <a href="{{route('dashboard.users.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                                    <form
                                        action=""
                                        method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-dark">Resend Login
                                            Details</button>
                                    </form>
                                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                           @endforeach
                           
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    </div>
@endsection
