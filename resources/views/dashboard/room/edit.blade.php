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
                        <form action="{{ route('dashboard.hotel.room.update', $room->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Name</label>
                                    <input type="text" name="name" required value="{{ old('name', $room->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="input1"
                                        placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input4" class="form-label">Category</label>
                                    <select id="category" name="room_category_id"
                                        class="form-control @error('room_category_id') is-invalid @enderror" required>
                                        <option value="">Select Category</option>
                                        @foreach ($roomCategories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $room->room_category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('room_category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Rate</label>
                                    <input type="number" name="rate" required value="{{ old('rate', $room->rate) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="input1"
                                        placeholder="Rate">
                                    @error('rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Discounted Rate</label>
                                    <input type="number" name="discounted_rate" required
                                        value="{{ old('discounted_rate', $room->discounted_rate) }}"
                                        class="form-control @error('discounted_rate') is-invalid @enderror" id="input1"
                                        placeholder="Discounted Rate">
                                    @error('discounted_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Image</label>
                                    <input type="file" name="image" value="{{ old('image') }}"
                                        class="form-control @error('image') is-invalid @enderror" id="input1">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input1" class="form-label">Description</label>
                                    <textarea name="description" class="form-control @error('name') is-invalid @enderror" name="description"
                                        id="" cols="30" rows="10">{{ $room->description }}</textarea>
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
