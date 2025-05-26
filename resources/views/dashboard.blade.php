@section('title', __('Dashboard'))
<x-layouts.app :title="__('Dashboard')">
    <div class="row g-4">
      This is HERE
      <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
              <h4 class="text-center"></h4></div>
            <div class="card-footer"><h4 class="text-center">Upload Credit(s) Left</h4></div>
          </div>
        </div>
          <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
              <h4 class="text-center"></h4></div>
            <div class="card-footer"><h4 class="text-center">Total Policy Count</h4></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
              <h4 class="text-center"></h4></div>
            <div class="card-footer"><h4 class="text-center">Draft Policies</h4></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card text-danger" aria-hidden="true" ></i></div>
              <h4 class="text-center text-danger"></h4></div>
            <div class="card-footer text-danger"><h4 class="text-center text-danger">Failed Policies</h4></div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card text-success" aria-hidden="true" ></i></div>
              </div>
            <div class="card-footer text-success"><h4 class="text-center text-success">Approved Policies</h4></div>
          </div>
        </div>

         <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card text-success" aria-hidden="true" ></i></div>
              <h4 class="text-center text-success"></h4></div>
            <div class="card-footer text-success"><h4 class="text-center text-success">SALES BY AGENTS</h4></div>
          </div>
        </div>



        
        <div class="col-lg-4">
          <div class="overflow-hidden rounded border" style="aspect-ratio: 16/6;">
            <x-placeholder-pattern class="h-100 w-100" style="stroke: color-mix(in oklab, oklch(.21 .034 264.665) 20%, transparent);" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="overflow-hidden rounded border" style="aspect-ratio: 16/6;">
            <x-placeholder-pattern class="h-100 w-100" style="stroke: color-mix(in oklab, oklch(.21 .034 264.665) 20%, transparent);" />
          </div>
        </div>
        <div class="col-lg-12">
          <div class="overflow-hidden rounded border" style="aspect-ratio: 16/6;">
            <x-placeholder-pattern class="h-100 w-100" style="stroke: color-mix(in oklab, oklch(.21 .034 264.665) 20%, transparent);" />
          </div>
        </div>
    </div>
</x-layouts.app>
