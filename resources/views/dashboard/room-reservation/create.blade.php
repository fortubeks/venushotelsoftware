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
                <a href="{{ route('dashboard.hotel.reservation.index') }}" class="btn btn-dark">View Reservations</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        @include('notifications.flash-messages')
                        <form action="{{ route('dashboard.hotel.reservation.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="guest" class="form-label">{{ __('guest') }}</label>
                                    <input type="hidden" id="guest_id" name="guest_id">
                                    <input oninput="setGuestID()" class="form-control" list="guestdatalistOptions"
                                        id="guest" placeholder="Type to search...">
                                    <datalist id="guestdatalistOptions">
                                        @foreach (getModelList('guests') as $guest)
                                            <option value="{{ $guest->full_name }}" data-value="{{ $guest->id }}">
                                        @endforeach
                                                
                                    </datalist>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Check-In Date</label>
                                    <input type="date" name="checkin_date" required
                                        value="{{ old('checkin_date', now()->format('Y-m-d')) }}"
                                        class="form-control @error('checkin_date') is-invalid @enderror" id="input1"
                                        placeholder="First Name">
                                    @error('checkin_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                    <label for="input1" class="form-label">Check-Out Date</label>
                                    <input type="date" name="checkout_date" required value="{{ old('check_out_date') }}"
                                        class="form-control datepicker @error('check_out_date') is-invalid @enderror"
                                        id="input1">

                                    @error('check_out_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="fw-bold">


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
                                    <input type="text" name="email" value="{{ old('email') }}"
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
                                        placeholder="Address">
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
                                <div id="input-container" class="col-lg-11">
                                    <div class="row d-flex justify-content-end" id="input-template">
                                        <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 room" id="room1">
                                            <label for="input4" class="form-label">Room</label>
                                            <select name="room[]" class="form-control room_id" required>
                                                <option value="">Select Room</option>
                                                @foreach (getModelList('rooms') as $room)
                                                    @if ($room->isAvailable(now(), now()))
                                                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('room')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 room">
                                            <label for="input1" class="form-label">Rate</label>
                                            <input id="rate_0" name="rate[]" type="number"
                                                onkeyup="updateAmount(0)" inputmode="decimal" min="0"
                                                class="form-control rate" placeholder="Rate">
                                            <span class="invalid-feedback rate-error" style="display:none;"
                                                role="alert">
                                                <!-- Error message for rate input -->
                                            </span>
                                        </div>
                                        <div class="col-lg-1 col-xl-1 col-md-6 col-sm-6 remove-icon mt-4">
                                            <!-- Remove icon here -->
                                            <span><button type="button"
                                                    class="btn  btn-danger remove-button">remove</button></span>

                                        </div>

                                    </div>
                                </div>

                                <div class=" d-flex justify-content-end mt-3">
                                    <button type="button" id="add-input" class="btn btn-dark">Add +</button>
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


    <script>
        window.addEventListener('load', function() {
            $("#add-input").click(function() {
                inputCounter++;

                // Clone the input template
                var newInput = $("#input-template").clone();

                // Update IDs and reset values
                newInput.find('[id]').each(function() {
                    var oldId = $(this).attr('id');
                    var newId = oldId.replace(/_0$/, '_' + inputCounter);
                    $(this).attr('id', newId);
                    $(this).val('');
                });

                // Attach event handlers for the new input fields
                newInput.find("input[type='number']").on('keyup', function() {
                    var index = $(this).attr('id').split('_')[1];
                    updateAmount(index);
                });

                // Attach a click event to the remove button
                newInput.find(".remove-button").click(function() {
                    newInput.remove();
                });

                // Append the new input element to the container
                $("#input-container").append(newInput);



                // Trigger an initial update of the amount for the new input
                updateAmount(inputCounter);
            });

            $('.dates').change(function() {
                // Get the selected date
                var checkInDate = $('#checkin_date').val();
                var checkOutDate = $('#checkout_date').val();

                // Perform an Ajax request to check room availability
                $.ajax({
                    url: '/check-room-availability',
                    method: 'POST',
                    data: {
                        checkin_date: checkInDate,
                        checkout_date: checkOutDate,
                        // Add other necessary data if needed
                    },
                    success: function(response) {
                        // Handle the response
                        if (response.available) {
                            // Rooms are available
                            alert('Rooms are available on ' + selectedDate);
                        } else {
                            // Rooms are not available
                            alert('No available rooms on ' + selectedDate);
                        }
                    },
                    error: function(error) {
                        // Handle the error
                        console.error('Ajax request failed:', error);
                    }
                });
            });
            $(".datepicker").flatpickr();

            $(".time-picker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "Y-m-d H:i",
            });

            $(".date-time").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $(".date-format").flatpickr({
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
            });

            $(".date-range").flatpickr({
                mode: "range",
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
            });

            $(".date-inline").flatpickr({
                inline: true,
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
            });

        });

        let inputCounter = 0;

        function updateAmount(index) {
            var qty = parseFloat($("#qty_" + index).val()) || 0;
            var rate = parseFloat($("#rate_" + index).val()) || 0;
            var amount = qty * rate;
            $("#amount_" + index).val(amount.toFixed(2)); // Format the amount as needed
            $("#unitQty_" + index).val(qty); // set unit qty
        }

        function setGuestID() {
            var value = $('#guest').val();
            $('#guest_id').val($('#guestdatalistOptions [value="' + value + '"]').data('value'));
        }
    </script>
@endsection
