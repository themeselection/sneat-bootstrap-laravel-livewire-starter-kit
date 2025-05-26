<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5" 
    style="background-image:url({{asset('assets/img/illustrations/salamlogo.png')}}) ; background-repeat: no-repeat; background-size: cover;  ">
      <div class="w-100 d-flex justify-content-center">
        <div>

          <!--<img src="{{asset('assets/img/illustrations/salamlogo.png111')}}" class="img-fluid" alt="Login image" width="100%" height="100%"/>-->
        </div>
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Right Text -->
    <div class="card col-12 col-lg-5 col-xl-4">
      <div class="d-flex align-items-center authentication-bg p-sm-12 p-6 h-100">
        <div class="w-px-400 mx-auto mt-sm-12 mt-8">
          {{ $slot }}
          <div class="divider my-6">
            <div class="divider-text">or</div>
          </div>

          <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-facebook me-1_5">
              <i class="icon-base bx bxl-facebook-circle icon-20px"></i>
            </a>

            <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-twitter me-1_5">
              <i class="icon-base bx bxl-twitter icon-20px"></i>
            </a>

            <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-github me-1_5">
              <i class="icon-base bx bxl-github icon-20px"></i>
            </a>

            <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-google-plus">
              <i class="icon-base bx bxl-google icon-20px"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- /Right Text -->
  </div>
</div>
