<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="/dashboard/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Venushotel</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('dashboard.home')}}" class="">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
           
        </li>
        <li>
            <a href="{{route('dashboard.hotel.users.index')}}" class="">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">User Management</div>
            </a>
           
        </li>
        <li>
            <a href="{{route('dashboard.hotel.room.index')}}" class="">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Room Management</div>
            </a>
           
        </li>
        <li>
            <a href="{{route('dashboard.hotel.room-category.index')}}" class="">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Reservation</div>
            </a>
           
        </li>
        <li>
            <a href="{{route('dashboard.hotel.guest.index')}}" class="">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Guests</div>
            </a>
           
        </li>
        <li>
            <a href="{{route('dashboard.hotel.venue.index')}}" class="">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Venue(s)</div>
            </a>
           
        </li>
       
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->