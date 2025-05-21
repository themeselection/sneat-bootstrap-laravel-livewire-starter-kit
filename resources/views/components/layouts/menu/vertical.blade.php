                @php
                
                    Auth::check();
                    $usercheck = Auth::user();                    
                @endphp
<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link"><x-app-logo /></a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('dashboard') }}" wire:navigate>
        <i class="menu-icon fa fa-tachometer"></i>
        {{ __('Dashboard') }}</a>
    </li>
        <!-- Policy Management -->
    <li class="menu-item {{ request()->is('list_policy') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('list_policy') }}" wire:navigate>
        <i class="menu-icon fa fa-pencil"></i>{{ __('Policy Mgmt') }}</a>
    </li>

    @if ($user->role=='admin' or $user->role=='superadmin')
      <!-- User Management -->
    <li class="menu-item {{ request()->is('list_users') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('list_users') }}" wire:navigate>
        <i class="menu-icon fa fa-user"></i>{{ __('User Mgmt') }}
      </a>
    </li>
    @endif
      
   

  
      @if ($user->role=='admin' or $user->role=='superadmin')
        <!-- Agent Management -->
    <li class="menu-item {{ request()->is('list_agents') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('list_agents') }}" wire:navigate>
        <i class="menu-icon fa fa-address-card"></i>{{ __('Agent Mgmt') }}
      </a>
    </li>
     @endif

    <!-- Settings -->
    <li class="menu-item {{ request()->is('settings/*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div class="text-truncate">{{ __('Settings') }}</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('settings.profile') }}" wire:navigate>{{ __('Profile') }}</a>
        </li>
        <li class="menu-item {{ request()->routeIs('settings.password') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('settings.password') }}" wire:navigate>{{ __('Password') }}</a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
<!-- / Menu -->

<script>
  // Toggle the 'open' class when the menu-toggle is clicked
  document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
    menuToggle.addEventListener('click', function() {
      const menuItem = menuToggle.closest('.menu-item');
      // Toggle the 'open' class on the clicked menu-item
      menuItem.classList.toggle('open');
    });
  });
</script>
