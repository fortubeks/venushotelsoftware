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
                        <li class="breadcrumb-item active" aria-current="page">Edit Purchase</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.purchase.index') }}" class="btn btn-dark">View Purchase(s)</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        @include('notifications.flash-messages')
                        <form action="{{ route('dashboard.hotel.purchase.update', $purchase->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 pb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                                        id="category_id">
                                        <option disabled value="">Select Category</option>
                                        @foreach (getModelList('purchase-categories') as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $purchase->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 pb-3">
                                    <label for="supplier_id" class="form-label">Supplier</label>
                                    <select class="form-control @error('supplier_id') is-invalid @enderror" name="supplier_id"
                                    id="supplier_id">
                                    <option disabled value="">Select Supplier</option>
                                    @foreach (getModelList('suppliers') as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 pb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" name="amount" required value="{{ $purchase->amount }}"
                                        class="form-control @error('amount') is-invalid @enderror" id="amount"
                                        placeholder="Amount">
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 pb-3">
                                    <label for="total_amount" class="form-label">Total Amount</label>
                                    <input type="number" name="total_amount" value="{{ $purchase->total_amount }}"
                                        class="form-control @error('total_amount') is-invalid @enderror" id="total_amount"
                                        placeholder="Total Amount">
                                    @error('total_amount')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 pb-3">
                                    <label for="discount" class="form-label">Discounted Amount</label>
                                    <input type="number" name="discount" value="{{ $purchase->discount }}"
                                        class="form-control @error('discount') is-invalid @enderror" id="discount"
                                        placeholder="Discount">
                                    @error('discount')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 pb-3">
                                    <label for="tax_rate" class="form-label">Tax Rate</label>
                                    <input type="number" name="tax_rate" value="{{ $purchase->tax_rate }}"
                                        class="form-control @error('tax_rate') is-invalid @enderror" id="tax_rate"
                                        placeholder="Tax Rate">
                                    @error('tax_rate')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 pb-3">
                                    <label for="tax_amount" class="form-label">Tax Amount</label>
                                    <input type="number" name="tax_amount" value="{{ $purchase->tax_amount }}"
                                        class="form-control @error('tax_amount') is-invalid @enderror" id="tax_amount"
                                        placeholder="Tax Amount">
                                    @error('tax_amount')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <label for="purchase_date" class="form-label">Purchase Date</label>
                                    <input type="date" name="purchase_date" required
                                        value="{{ $purchase->purchase_date }}"
                                        class="form-control @error('purchase_date') is-invalid @enderror" id="purchase_date"
                                        placeholder="Enter or Select Date">
                                    @error('purchase_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" required
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        @foreach ($statusOptions as $key => $status)
                                            <option value="{{ $key }}" {{ $key == $purchase->status ? 'selected' : '' }}>
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
                                <div class="col-12 pb-3">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea type="text" name="note" 
                                        class="form-control @error('note') is-invalid @enderror" id="note"
                                        placeholder="Add note here...">{{ $purchase->note }}</textarea>
                                    @error('note')
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
