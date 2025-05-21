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
        <div class="card-header">AGENT DETAILS</div>
        <div class="card-body">
            <form action="{{route('agentupdate')}}" method="post">
                @csrf
            <div class="row gy-2 gx-3 align-items-center mb-3">
            <div class="col-auto">
                    <label class='form-label' for="agentname">Name</label>
                    @if (!empty($user->name))
                        <input type="text" class="form-control form-control-lg" name="agentname" disabled value="{{$user->name}}">
                    @else
                        <input type="text" class="form-control form-control-lg" name="agentname" disabled value="N/A. Please update User Record">
                    @endif
                    
            </div>
            <div class="col-auto">
                    <label class='form-label' for="agenttel">Telephone</label>
                    @if (!empty($user->name))
                        <input type="text" class="form-control form-control-lg" name="agentno" disabled value="{{$user->telno}}">
                    @else
                        <input type="text" class="form-control form-control-lg" name="agentno" disabled value="N/A. Please update User Record">
                    @endif
            </div>
            <div class="col-auto">
                    <label class='form-label form-check-label' for="agentname">Allocated Credits</label>
                    <input type="number" class="form-control form-control-lg"  name="noallocated"  value="{{$agent->noallocated}}"> 
                    <input type="number" class="form-control form-control-lg"  name="agentid" hidden value="{{$agent->id}}">                    
            </div>
            <div class="col-auto">
                    <label class='form-label' for="agentname">Credits used*</label>
                    <input type="number" class="form-control form-control-lg" name="noused"   disabled value="{{$agent->noused}}">                    
            </div>
            <div class="col-auto">
                    <label class='form-label form-check-label' for="status">Status</label>
                    <select class="form-control form-select form-control-lg" name="status" id="status">
                        <option value="activated">ACTIVATE</option>
                        <option value="deactivated">DEACTIVATE</option>
                    </select>                  
            </div>
            <div class="col-auto">
                    <label class='form-label' for="agentname">AUTH_TOKEN</label>
                    <input type="text" class="form-control form-control-lg" name="authtoken" value="{{$agent->auth_token}}">                 
            </div>
            <div class="col-auto">
                @if ($agent->allowcredit==true)
                    <input type="checkbox" class="form-check-input" name="agentcreditchk" checked value="allowed">
                    <label class='form-label form-check-label' for="agentcreditchk">Can buy on Credit ?</label>  
                @else
                    <input type="checkbox" class="form-check-input" name="agentcreditchk"  value="allowed">
                    <label class='form-label form-check-label' for="agentcreditchk">Can buy on Credit ?</label>  
                @endif
            </div>
        </div>
        <div>
            
            <button type="submit" class="btn btn-primary">GO</button></div>
        </form>
        </div>
    </div>
</div>
</x-layouts.app>