<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<x-layouts.app>
    This is a a Test
        @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
<div>
<div class="card">
    <div class="card-header">
        VEHICLE MODEL MAPPING
    </div>
    <div class="card-body">
        <form action="{{route('importvmodel')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="col-auto mb-3">
            <input type="file" name="vmodelimport"  required class="form-control" id='vmodelimport'>
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-striped" id='vehiclemodels'>
            <th>S/no</th><th>NIIP ID</th><th>Vehicle Make</th><th>Model Name</th><th>Actions</th>
            </thead>
            @forelse ($vmodels as $vmodel)
                <tr>
                <td>{{$vmodel->vmodelid}}</td>
                <td>{{$vmodel->niipvmid}}</td>
                <td>{{$vmodel->vmodelname}}</td>
                <td>{{$vmodel->vmodelfullname}}</td>
                <td></td>
            </tr>
            
            @empty
                <tr>
                    <td>No Vehicle Models Recorded in System</td>
                </tr>
            @endforelse

        </table>
    </div>
</div>
</div>
<script>
  new DataTable('#vehiclemakes');
</script>
</x-layouts.app>