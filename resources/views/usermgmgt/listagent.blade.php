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
            <table class="table table-striped">
                <thead>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>State</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($agents as $agent )
                <form action="{{route('agentprofile')}}" method="GET">
                    <tr>
                        <td>#</td>
                         <td>{{$agent->name}}</td>
                          <td>{{$agent->status}}</td>
                           <td><input type="text" name=uid hidden value="{{$agent->id}}">
                            <button type="submit" class="btn btn-primary">View</button></td>
                    </tr>
                </form>
                        
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
</x-layouts.app>