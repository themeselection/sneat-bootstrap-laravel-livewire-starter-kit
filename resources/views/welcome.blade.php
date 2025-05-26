<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{url('/')}}" data-framework="laravel">
  @section('title', __('Welcome'))
  <head>
    @include('partials.head')
  </head>
  <body>
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="d-flex justify-content-end mb-3">
          @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-secondary me-2">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endif
            @endauth
          @endif
      </div>
      <div class="col col-xl col-sm col-md col-8 mx-auto py-auto" style="height: 100vh ; padding-top:5%">
        <div class="card col-auto">
          <div class="row g-0" style="background-color: rgb(19, 19, 60)">
            <div class="col-sm d-flex align-items-center">
              <div class="card-body" style="color: white">
                <h1 class="h4 card-title" style="color: white">Welcome to <i>mySalam Online</i></h1>
                <p class="card-text mb-5">
                  Streamlined, efficient, and customer-focused, we’re here to empower customers and agents.
                   Let’s accelerate your journey to smarter takaful solutions today!</p>
              
              </div>
            </div>
            <div class="col-sm">
              <img class="card-img card-img-right" src="{{asset('assets/img/illustrations/mySalm-welcome.png')}}" alt="Card image">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Include Scripts -->
    @include('partials.scripts')
    <!-- / Include Scripts -->
  </body>
</html>
