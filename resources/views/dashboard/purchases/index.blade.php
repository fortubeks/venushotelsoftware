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
                        <li class="breadcrumb-item active" aria-current="page">Purchases</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.purchase.create') }}" class="btn btn-dark">Add New</a>
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
                                <th>Amount</th>
                                <th>Total Amount</th>
                                <th>Tax Amount</th>
                                <th>Tax Rate</th>
                                <th>Discount</th>
                                <th>Category</th>
                                <th>Supplier</th>
                                <th>Purchase Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if ($purchases->count())
                            <tbody>
                                @foreach ($purchases as $purchase)
                                @php
                                $purchaseStatus = $purchase->status;
                                $purchaseStatusColor = '';
                                if ($purchaseStatus == 'Recieved') {
                                    $purchaseStatusColor = 'text-success';
                                }
                                if ($purchaseStatus == 'Partial') {
                                    $purchaseStatusColor = 'text-danger';
                                }
                                if ($purchaseStatus == 'Ordered') {
                                    $purchaseStatusColor = 'text-primary';
                                }
                                if ($purchaseStatus == 'Pending') {
                                    $purchaseStatusColor = 'text-warning';
                                }
                                @endphp
                                    <tr>
                                        <td>{{ $purchase->amount }}</td>
                                        <td>{{ $purchase->total_amount }}</td>
                                        <td>{{ $purchase->tax_amount ?? 'N/A' }}</td>
                                        <td>{{ $purchase->tax_rate ?? 'N/A' }}</td>
                                        <td>{{ $purchase->discount ?? 'N/A' }}</td>
                                        <td>{{ $purchase->purchaseCategory->name }}</td>
                                        <td>{{ $purchase->supplier->name }}</td>
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td class="{{$purchaseStatusColor}}">{{ $purchase->status }}</td>
                                        <td>
                                            <div class="d-flex justify-content-space ">
                                                <a href="{{ route('dashboard.hotel.purchase.edit', $purchase->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('dashboard.hotel.purchase.destroy', $purchase->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this purchase?');">
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
                            <tbody>
                                <tr>
                                    <td colspan="9"><h4>No Available Purchase</h4></td>
                                </tr>
                            </tbody>
                        @endif
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    </div>
@endsection
