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
        <div class="card-header">LIST OF AGENTS</div>
        <div class="card-body">
            <table class="table table-striped table-sm" id="agentlist">
                <thead>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($agents as $agent )
                
                    <tr>
                        <form action="{{route('agentprofile')}}" method="GET">
                        <td>#</td>
                         <td>{{$agent->name}}</td>
                            <td>{{$agent->email}}</td>
                          <td>{{$agent->status}}</td>
                           <td><input type="text" name=uid hidden value="{{$agent->id}}" id="uid">
                            <button type="submit" class="btn btn-primary">View</button></td>
                            </form>
                    </tr>
                
                        
                    @empty
                        <tr>
                            <td>No User has been assigned as an Agent</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
  new DataTable('#agentlist');
</script>
</x-layouts.app>