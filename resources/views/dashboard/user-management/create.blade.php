@extends('dashboard.layouts.app')

@section('contents')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Users</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <button class="btn btn-dark">View Users</button>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">

                <div class="card">
                    <div class="card-body p-4">
                        @include('notifications.flash-messages')
                        <h5 class="mb-4">Create New User</h5>
                        <form action="{{ route('dashboard.users.store') }}" method="POST" class="row g-3">
                            @csrf 

                            <input type="hidden" name="user_account_id" value="{{Auth::user()->id}}">
                            <div class="col-md-6">
                                <label for="input1" class="form-label">First Name</label>
                                <input type="text" name="first_name" required value="{{ old('first_name') }}"
                                    class="form-control @error('first_name') is-invalid @enderror" id="input1"
                                    placeholder="First Name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input2" class="form-label">Last Name</label>
                                <input type="text" name="last_name" required value="{{ old('last_name') }}"
                                    class="form-control @error('last_name') is-invalid @enderror" id="input2"
                                    placeholder="Last Name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input3" class="form-label">Phone</label>
                                <input type="phone" name="phone" value="{{ old('phone') }}"
                                    class="form-control @error('phone') is-invalid @enderror" id="input3"
                                    placeholder="Phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                            @enderror
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <label for="input4" class="form-label">Email</label>
                        <input type="email" name="email" required value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" id="input4" placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <label for="input4" class="form-label">Photo</label>
                        <input type="file" name="photo" value="{{ old('photo') }}"
                            class="form-control @error('email') is-invalid @enderror" id="input4">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <label for="input4" class="form-label">Role</label>
                        <select name="role" id="role" required
                            class="form-control @error('role') is-invalid @enderror">
                            <option value="">Select Role</option>
                            @foreach ($roles as $key => $role)
                                <option value="{{ old('role', $role) }}">
                                    {{ $role }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                        <label for="input4" class="form-label">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}"
                            class="form-control @error('address') is-invalid @enderror" id="input4">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-3">
                        <button class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--end row-->
    </div>
@endsection
