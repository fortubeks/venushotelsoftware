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
                        <li class="breadcrumb-item active" aria-current="page">Create a Reservation</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.venue.index') }}" class="btn btn-dark">View Venues</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        @include('notifications.flash-messages')
                        <form action="{{ route('dashboard.hotel.venue.store') }}" method="POST">
                            @csrf

                           <div class="row">
                          
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <label for="input1" class="form-label"> Name</label>
                                <input type="text" name="name" required value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" id="input1"
                                    placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 room mb-3" id="room1">
                                <label for="input4" class="form-label">Rate</label>
                                <input type="number" name="rate" required value="{{ old('rate') }}"
                                    class="form-control @error('rate') is-invalid @enderror" id="input1"
                                    placeholder="Name">
                                @error('rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 mb-3">
                                <label for="input1" class="form-label">Discounted Rate</label>
                                <input id="rate_0" name="discounted_rate" type="number" onkeyup="updateAmount(0)"
                                    inputmode="decimal" min="0"
                                    class="form-control rate @error('discounted_rate') is-invalid @enderror"
                                    placeholder="Discounted Rate">
                                @error('discounted_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <label for="input4" class="form-label">Satus</label>
                                <select name="status" id="status" required
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Select Status</option>
                                    @foreach ($statusOptions as $key => $status)
                                        <option value="{{ $key }}">
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="input1" class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                    id="input1" placeholder="Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
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
