<div>
    @if ($message = Session::get('success_message'))
        <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="ms-3">
                    {{-- <h6 class="mb-0 text-white">Primary Alerts</h6> --}}
                    <div class="text-white">{{ $message }}!</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('error_message'))
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
            </div>
            <div class="ms-3">
                <div class="text-white">{{$message}}!</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('warning_message'))
        <div class="p-4 mb-3 bg-warning-400 rounded">
            <p class="text-warning-800">{{ $message }}</p>
        </div>
    @endif
</div>
