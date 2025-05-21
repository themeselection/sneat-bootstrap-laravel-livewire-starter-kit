@section('title', __('Dashboard'))

                @php
                use App\Models\agentsdetailsModel;
                    Auth::check();
                    $usercheck = Auth::user();
                    $agent=agentsdetailsModel::where('uid',$usercheck->id)->first();
                    $creditleft=$agent->noallocated - $agent->noused;
            
                @endphp
<x-layouts.app :title="__('Dashboard')">
    <div class="row g-4">
        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
              <h4 class="text-center">{{$creditleft}}</h4></div>
            <div class="card-footer"><h4 class="text-center">Upload Credit(s) Left</h4></div>
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
