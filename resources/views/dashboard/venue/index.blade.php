@extends('dashboard.layouts.app')

<style>
    .venue-photo {
        width: 40px;
        height: auto;
    }

    .scrollable-table-container {
        overflow-x: auto;
        max-width: 100%;
        width: 100%;
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
                <a href="{{ route('dashboard.hotel.venue.create') }}" class="btn btn-dark">Add New</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                @include('notifications.flash-messages')
                <div class="table-responsive scrollable-table-container">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nmae</th>
                                <th>Rate</th>
                                <th>Discounted Rate</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if ($venues->count())
                            <tbody>
                                @foreach ($venues as $venue)
                                    @php
                                        $venueStatus = $venue->status;
                                        $venueStatusColor = '';
                                        if ($venueStatus == '1') {
                                            $venueStatusColor = 'text-success';
                                        }
                                        if ($venueStatus == '0') {
                                            $venueStatusColor = 'text-danger';
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $venue->name }}</td>
                                        <td>{{ $venue->rate }}</td>
                                        <td>{{ $venue->discounted_rate ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($venue->description, 50) }}</td>
                                        <td class="{{ $venueStatusColor }}">
                                            {{ getStatusAsString($venue->status) }}
                                        </td>
                                        <td>{{ $venue->created_at->format('D M, Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-space ">
                                                <a href="{{ route('dashboard.hotel.venue.edit', $venue->id) }}"
                                                    class="btn bt-sm btn-primary">Edit</a>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
                                    <td colspan="7">
                                        <h4>No Available venues</h4>
                                    </td>
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
