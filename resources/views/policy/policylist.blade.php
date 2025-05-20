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
        <div class="card-header">BUY A MOTOR POLICY</div>
        <div class="card-body">
            <div class="flex">
                <form action="{{route('buy_policy')}}" method="get">
                    <button class="btn btn-primary" name="btnprivatemotor">Private Motor Third Party</button>
                    <button class="btn btn-primary" name="btncommercialmotor">Commercial Motor Third Party</button>
                    <button class="btn btn-primary" name="btnmotorcycle">Motorcycle/Tricycle Third Party</button>
                    
                </form>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id='policylist'>
                    <thead>
                        <th>S/No</th>
                        <th>Policy No.</th>
                        <th>Policy Type</th>
                        <th>Insured Name</th>
                        <th>Contribution</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($policies as $policy )
                            <tr>
                                <td>#</td>
                                <td>@if (empty($policy->policyno))
                                    Incomplete Policy
                                @else
                                    {{$policy->policyno}}
                                @endif
                                    </td>
                                <td>{{$policy->policytype}}</td>
                                <td>{{$policy->insured_name}}</td>
                                <td>{{$policy->contribution}}</td>
                                <td>{{$policy->status}}</td>
                                <td><form action="{{route('view_policy')}}" method="get">
                                    <input type="number" value="{{$policy->id}}" hidden name='id'>

                                    <button class="btn btn-primary" type="submit">View Policy</button>

                                </form>
                                    
                                    @if ($policy->status=='approved' && !empty($policy->policyno))
                                        <a target="_blank" class="btn btn-success" href="https://demo.bitlect.net/api/v1/policy/view-certificate?policy_no={{$policy->policyno}}">
                                        Print Certificate
                                        </a>
                                    @endif
                                    
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
  new DataTable('#policylist');
</script>
</x-layouts.app>