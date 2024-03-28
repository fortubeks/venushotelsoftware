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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create a Supplier</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.supplier.index') }}" class="btn btn-dark">View Supplier(s)</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        @include('notifications.flash-messages')
                        <form action="{{ route('dashboard.hotel.supplier.update', $supplier->id) }}" method="POST">
                            @csrf @method('PUT')

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" required value="{{ old('name', $supplier->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ old('address', $supplier->address) }}"
                                        class="form-control @error('address') is-invalid @enderror" id="address"
                                        placeholder="Address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="contact_person_name" class="form-label">Contact Person Name</label>
                                    <input type="text" name="contact_person_name" required value="{{ old('contact_person_name', $supplier->contact_person_name) }}"
                                        class="form-control @error('contact_person_name') is-invalid @enderror" id="contact_person_name"
                                        placeholder="Contact Person Name">
                                    @error('contact_person_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="contact_person_phone" class="form-label">Contact Person Phone</label>
                                    <input type="text" name="contact_person_phone" required value="{{ old('contact_person_phone', $supplier->contact_person_phone) }}"
                                        class="form-control @error('contact_person_phone') is-invalid @enderror" id="contact_person_phone"
                                        placeholder="Contact Person Phone">
                                    @error('contact_person_phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="bank_account_name" class="form-label">Bank Account Name</label>
                                    <input type="text" name="bank_account_name" value="{{ old('bank_account_name', $supplier->bank_account_name) }}"
                                        class="form-control @error('bank_account_name') is-invalid @enderror" id="bank_account_name"
                                        placeholder="Bank Account Name">
                                    @error('bank_account_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name', $supplier->bank_name) }}"
                                        class="form-control @error('bank_name') is-invalid @enderror" id="bank_name"
                                        placeholder="Bank Name">
                                    @error('bank_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="bank_account_no" class="form-label">Bank Account Number</label>
                                    <input type="text" name="bank_account_no" value="{{ old('bank_account_no',  $supplier->bank_account_no) }}"
                                        class="form-control @error('bank_account_no') is-invalid @enderror" id="bank_account_no"
                                        placeholder="Bank Account Number">
                                    @error('bank_account_no')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $supplier->email) }}"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection
