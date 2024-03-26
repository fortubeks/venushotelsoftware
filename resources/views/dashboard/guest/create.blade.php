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
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.room.index') }}" class="btn btn-dark">View Hotel</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        @include('notifications.flash-messages')
                        <form action="{{ route('dashboard.hotel.guest.store') }}" method="POST">
                            @csrf 
                           
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
                                    <label for="input1" class="form-label">Title</label>
                                    <select class="form-control @error('title') is-invalid @enderror" name="title"
                                        id="">
                                        <option disabled value="">Select Title</option>
                                        @foreach (['Mr', 'Mrs', 'Master', 'Miss'] as $title)
                                            <option value="{{ $title }}"
                                                {{ old('title', $title) == $title ? 'selected' : '' }}>{{ $title }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
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
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
                                    <label for="input1" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                                        class="form-control @error('last_name') is-invalid @enderror" id="input1"
                                        placeholder="Last Name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
                                    <label for="input1" class="form-label">Other Name</label>
                                    <input type="text" name="other_name" value="{{ old('other_name') }}"
                                        class="form-control @error('other_name') is-invalid @enderror" id="input1"
                                        placeholder="Other Name">
                                    @error('other_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
                                    <label for="input1" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" id="input1"
                                        placeholder="Email">
                                    @error('first')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
                                    <label for="input1" class="form-label">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror" id="input1"
                                        placeholder="Phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
                                    <label for="input1" class="form-label">City</label>
                                    <input type="text" name="city" required value="{{ old('city') }}"
                                        class="form-control @error('city') is-invalid @enderror" id="input1"
                                        placeholder="City">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
                                    <label for="input1" class="form-label">Country</label>
                                    <input type="text" name="country" required value="{{ old('country') }}"
                                        class="form-control @error('country') is-invalid @enderror" id="input1"
                                        placeholder="Country">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pb-3">
                                    <label for="input1" class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        class="form-control @error('address') is-invalid @enderror" id="input1"
                                        placeholder="Address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               

                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    </div>
@endsection
