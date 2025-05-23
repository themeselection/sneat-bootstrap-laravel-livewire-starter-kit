                @php
                use App\Models\agentsdetailsModel;
                    Auth::check();
                    $usercheck = Auth::user();
                    if ($usercheck->role=='agent'){
                      $agent=agentsdetailsModel::where('uid',$usercheck->id)->first();
                    $creditleft=$agent->noallocated - $agent->noused;
                    }
                    
                @endphp
            
<nav
  class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
  id="layout-navbar">
  
  <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center me-auto">
      <div class="nav-item d-flex align-items-center">
        <span class="w-px-22 h-px-22"><i class="icon-base bx bx-search icon-md"></i></span>
        <input
          type="text"
          class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none"
          placeholder="Search..."
          aria-label="Search..." />
      </div>
    </div>
    <!-- /Search -->


    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
      @if ($usercheck->role=='agent')
            <li class="nav-item lh-1 me-4">
        <a
          class="github-button"
          href="#" 
          data-icon="octicon-star"
          aria-label="Star"
          >
          <div >{{$creditleft}} Credits</div></a
        >
      </li>
      <li class="nav-item lh-1 me-4">{{Auth::user()->name}} |<b> {{strtoupper(Auth::user()->role)}} </b></li>
        
      @endif

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <!-- Check if the user is authenticated -->
        @if (Auth::check())
          <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
            
            <div class="avatar avatar-online">
              <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="{{ route('settings.profile') }}" wire:navigate>
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/img/avatars/2.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                    <small class="text-body-secondary">{{ Auth::user()->role ?? 'User' }}</small> <!-- Display user role -->
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider my-1"></div>
            
            </li>
            <li>
              <a class="dropdown-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" wire:navigate>
        <i class="menu-icon fa fa-tachometer"></i>
        {{ __('Dashboard') }}</a>
            </li>
            <li>
              <a class="dropdown-item {{ request()->routeIs('lis') ? 'active' : '' }}" href="{{ route('list_policy') }}" wire:navigate>
        <i class="menu-icon fa fa-pencil"></i>{{ __('Policy Mgmt') }}</a>
            </li>
            @if ($usercheck->role=='admin' or $usercheck->role=='superadmin')
      <!-- User Management -->
    <li>
      <a class="dropdown-item {{ request()->is('list_users') ? 'active' : '' }}" href="{{ route('list_users') }}" wire:navigate>
        <i class="menu-icon fa fa-user"></i>{{ __('User Mgmt') }}
      </a>
    </li>
    <li>
      <a class="dropdown-item {{ request()->is('list_agents') ? 'active' : '' }}" href="{{ route('list_agents') }}" wire:navigate>
        <i class="menu-icon fa fa-address-card"></i>{{ __('Agent Mgmt') }}
      </a>
    </li>
     @endif
            <li>
              <div class="dropdown-divider my-1"></div>
            
            </li>
            <li>
              <a class="dropdown-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}" href="{{ route('settings.profile') }}" wire:navigate>
                <i class="icon-base bx bx-user icon-md me-3"></i><span>My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item {{ request()->routeIs('settings.password') ? 'active' : '' }}" href="{{ route('settings.password') }}" wire:navigate>
                <i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider my-1"></div>
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item" type="submit" class="btn p-0"><i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span></button>
              </form>
            </li>
          </ul>
        @else
          <!-- If the user is not logged in, show the login option -->
          <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('login') }}">Log In</a></li>
          </ul>
        @endif
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
