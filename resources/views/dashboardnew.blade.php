@section('title', __('Dashboard'))
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
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
              <h4 class="text-center">{{$totalpolcount}}</h4></div>
            <div class="card-footer"><h4 class="text-center">Total Policy Count</h4></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
              <h4 class="text-center">{{$totalpoldraft}}</h4></div>
            <div class="card-footer"><h4 class="text-center">Draft Policies</h4></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card text-danger" aria-hidden="true" ></i></div>
              <h4 class="text-center text-danger">{{$totalpolfailed}}</h4></div>
            <div class="card-footer text-danger"><h4 class="text-center text-danger">Failed Policies</h4></div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              <div style="font-size: 30px"><i class="fa fa-credit-card text-success" aria-hidden="true" ></i></div>
              <h4 class="text-center text-success">{{$totalpolapproved}}</h4></div>
            <div class="card-footer text-success"><h4 class="text-center text-success">Approved Policies</h4></div>
          </div>
        </div>
                <div class="col-lg-4">
          <div class="card">            
            <div class="card-body">
              
                      <table class="table table-striped">
          <thead>
            <th>Product Type</th>
            <th>Policy Count</th>
          </thead>
          <tbody>
            @forelse ($policygroup as $pgdata)
            <tr>
              <td>{{$pgdata->producttype}}</td>
              <td>{{$pgdata->total}}</td>

            </tr>
        @empty
            <tr>
              <td>No Sales to Report</td>

            </tr>
        @endforelse   
          </tbody>
        </table>
        
            <div class="card-footer text-success"><h4 class="text-center text-success">Sales by Type</h4></div>
          </div>
        </div>
    </div>
</x-layouts.app>
