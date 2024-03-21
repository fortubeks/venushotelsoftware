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
                <a href="{{ route('dashboard.hotel.room-category.index') }}" class="btn btn-dark">View Category</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        @include('notifications.flash-messages')
                        <form action="{{route('dashboard.hotel.room-category.update', $room_category->id)}}" method="POST">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Name</label>
                                    <input type="text" name="name" required value="{{ old('name', $room_category->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="input1"
                                        placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Rate</label>
                                    <input type="number" name="rate" required value="{{ old('rate', $room_category->rate) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="input1"
                                        placeholder="Rate">
                                    @error('rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Image</label>
                                    <input type="file" name="image"  value="{{ old('image') }}"
                                        class="form-control @error('image') is-invalid @enderror" id="input1">
                                    @error('image')
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
