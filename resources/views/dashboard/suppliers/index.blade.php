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
                        <li class="breadcrumb-item active" aria-current="page">Suppliers</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('dashboard.hotel.supplier.create') }}" class="btn btn-dark">Add New</a>
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
                                <th>Name</th>
                                <th>Personal Name</th>
                                <th>Personal Phone</th>
                                <th>Email</th>
                                <th>Bank Account Name</th>
                                <th>Bank Name</th>
                                <th>Bank Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if ($suppliers->count())
                            <tbody>

                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->contact_person_name }}</td>
                                        <td>{{ $supplier->contact_person_phone }}</td>
                                        <td>{{ $supplier->email ?? 'N/A'}}</td>
                                        <td>{{ $supplier->bank_account_name }}</td>
                                        <td>{{ $supplier->bank_name  }}</td>
                                        <td>{{ $supplier->bank_account_no }}</td>
                                        
                                        <td>
                                            <div class="d-flex justify-content-space ">
                                                <a href="{{route('dashboard.hotel.supplier.edit', $supplier->id)}}" class="btn btn-primary">Edit</a>

                                                <form action="{{route('dashboard.hotel.supplier.destroy', $supplier->id)}}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this supplier?');">
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
                                <td colspan="8"><h4>No Available Supplier</h4></td>
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
