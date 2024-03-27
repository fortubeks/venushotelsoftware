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
        @include('notifications.flash-messages')
        <form action="{{ route('dashboard.hotel.settings.update-hotel-information', $hotel->id) }}" method="POST" enctype="multipart/form-data" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="card-header mb-4">
                                    <h4>Basic Information</h4>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <label for="input1" class="form-label">Name</label>
                                    <input type="text" name="name" required value="{{ old('name', $hotel->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="input1"
                                        placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <label for="input1" class="form-label">Number of Rooms</label>
                                    <input type="number" name="number_of_rooms" required
                                        value="{{ old('number_of_rooms', $hotel->number_of_rooms) }}"
                                        class="form-control @error('number_of_rooms') is-invalid @enderror" id="input1"
                                        placeholder="Discounted Rate">
                                    @error('number_of_rooms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <label for="input1" class="form-label">State</label>
                                    <select name="state_id" id=""
                                        class="form-control @error('country') is-invalid @enderror">
                                        <option value="" disabled>Select Country</option>
                                        @foreach (getModelList('states') as $key => $state)
                                            <option value="{{ $key }}"
                                                {{ $key == $hotel->state_id ? 'selected' : '' }}>{{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <label for="input1" class="form-label">Country</label>
                                    <select name="country_id" id=""
                                        class="form-control @error('country') is-invalid @enderror">
                                        <option value="" disabled>Select Country</option>
                                        @foreach (getModelList('countries') as $key => $country)
                                            <option value="{{ $key }}"
                                                {{ $key == $hotel->country_id ? 'selected' : '' }}>{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-3">
                                    <label for="input1" class="form-label">Address</label>
                                    <input type="text" name="address" required
                                        value="{{ old('address', $hotel->address) }}"
                                        class="form-control @error('number_of_rooms') is-invalid @enderror" id="input1"
                                        placeholder="Address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="card-header mb-4">
                                    <h4>Profile Information</h4>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ asset('storage/hotel/logos/' . $hotel->logo) }}" alt="Hotel logo"
                                            class="rounded-circle p-1 bg-primary" width="110">

                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-3">
                                    <label for="input1" class="form-label">Logo</label>
                                    <input type="file" name="logo" value="{{ old('logo', $hotel->logo) }}"
                                        class="form-control @error('logo') is-invalid @enderror" id="input1"
                                        placeholder="Logo">
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="input1" class="form-label">Website URL</label>
                                    <input type="text" name="website" value="{{ old('website', $hotel->website) }}"
                                        class="form-control @error('website') is-invalid @enderror" id="input1"
                                        placeholder="Website">
                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="input1" class="form-label">Phone</label>
                                    <input type="number" name="phone" required
                                        value="{{ old('phone', $hotel->phone) }}"
                                        class="form-control @error('phone') is-invalid @enderror" id="input1"
                                        placeholder="Phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="">
                                    <button class="btn btn-primary ">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end row-->
    </div>
@endsection
