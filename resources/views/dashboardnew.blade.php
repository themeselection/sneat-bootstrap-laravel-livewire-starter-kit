<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
@section('title', __('Dashboard'))
<x-layouts.app :title="__('Dashboard')">
  <div>    
    <div class="row g-4 mb-3">
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
              <div style="font-size: 30px"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
              <h4 class="text-center">{{$creditleft}}</h4></div>
            <div class="card-footer"><h4 class="text-center">Upcoming Renewals</h4></div>
          </div>
        </div>
      </div>
@php
  Auth::check();
  $user = Auth::user();
@endphp
@if (in_array($user->role, ['admin', 'superadmin']))
        <div class="row g-4">
        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body table-responsive">
              
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
     <div class="col-auto">
          <div class="card">            
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-striped table-sm" id="agentproduction">
                <thead>
                  <th>Name</th>
                  <th>Class</th>
                  <th>Units</th>
                </thead>
                <tbody>
                  @forelse ($answers as $answer )
                    <tr>
                     
                    <td>{{$answer["agent_name"]}}</td>
                    <td>{{$answer["producttype"]}}</td>
                    <td>{{$answer["total_sale"]}}</td>
                  </tr>
                  @empty
                    <tr>
                    <td>No Sales Made</td>
                    <td></td>
                    <td></td>
                  </tr>
                  @endforelse
                  
                </tbody>
              </table>
              </div>
            <div class="card-footer text-success"><h4 class="text-center text-success">SALES BY AGENTS</h4></div>
          </div>
        </div>
    </div>
    </div>
  @else
    <div class="row g-4">
        <div class="col-lg-4">
          <div class="card">            
            <div class="card-body table-responsive">
              
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
              <td>You have no Sales to Report</td>

            </tr>
        @endforelse   
          </tbody>
        </table>
        
            <div class="card-footer text-success"><h4 class="text-center text-success">Sales by Type</h4></div>
          </div>
        </div>
    </div>
    </div>
@endif

<script>
  new DataTable('#agentproduction ');
</script>
</x-layouts.app>
