                @php
                use App\Models\agentsdetailsModel;
                    Auth::check();
                    $usercheck = Auth::user();
                    $agent=agentsdetailsModel::where('uid',$usercheck->id)->first();
                    $creditleft=$agent->noallocated - $agent->noused;
            
                @endphp
    
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
     <div class="card col-9 mb-3">
        <div class="card-header"><h4>CONFIRM POLICY DETAILS BELOW</h4></div>
        </div>
<form action="{{route('pay_policy')}}" method="post">
    @csrf
    <div class="card col-9 mb-3">
        <div class="card-header"><h4>PRODUCT DETAILS</h4></div>
        <div class="card-body">
            <div class="row gy-2 gx-3 align-items-center mb-3">
                <div class="col-auto">
                    <label for="" class="form-label">PRODUCT</label>
                    <input class="form-control form-control-lg" type="text" disabled value="MOTOR THIRD PARTY">
                </div>
                <div class="col-auto">
                    <label for="" class="form-label">PRODUCT TYPE</label>
                    <input class="form-control form-control-lg" type="text" disabled value="COMMERCIAL">
                    <input class="form-control form-control-lg" type="text" name='productid' hidden value="TO DO">
                </div>
                <div class="col-auto">
                    <label for="datefrom" class="form-label">DATE FROM</label>
                    <input class="form-control form-control-lg" type="text" disabled value="{{$policy->start_date}}">
                </div>
                <div class="col-auto">
                    <label for="" class="form-label">DATE TO</label>
                    <input class="form-control form-control-lg" type="text" disabled value="{{$policy->end_date}}">
                </div>
            </div>
        </div></div>
    <div class="card col-9 mb-3">
        <div class="card-header"><h4>PERSONAL DETAILS</h4></div>
        <div class="card-body">
            <div class="row gy-2 gx-3 align-items-center mb-3">
                 <div class="col-auto">
                    <label class='form-label' for="fname">Name on Certificate</label>
                    <input class='form-control form-control-lg' type="text" disabled name="name"  id="name" value="{{$policy->insured_name}}">
                </div>
            </div>

        </div>
    </div>
    
    <div class="card col-9 mb-3">
        <div class="card-header"><h4>VEHICLE DETAILS</h4></div>
        <div class="card-body">
            <div class="row gy-2 gx-3 align-items-center mb-3">
                <div class="col-auto">
                    <label class='form-label' for="regno">Registeration No.</label>
                    <input class='form-control form-control-lg' type="text" name="regno"  disabled id="regno" value="{{$policyrisk->regno}}">

                </div>
                <div class="col-auto">
                    <label class='form-label' for="chassisno">Chassis No.</label>
                    <input class='form-control form-control-lg' type="text" name="chassisno" disabled id="chassisno" value="{{$policyrisk->chassisno}}">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="engineno">Engine No.</label>
                    <input class='form-control form-control-lg' type="text" name="engineno" disabled id="engineno" value="{{$policyrisk->engineno}}">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="vehiclemake">Vehicle Make</label>
                    <input class='form-control form-control-lg' type="text" name="vehiclemake" disabled id="vehiclemake" value="{{$policyrisk->vehiclemake}}">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="vehiclemake">Vehicle Model</label>
                    <input class='form-control form-control-lg' type="text" name="vehiclemodel" disabled id="vehiclemodel" value="{{$policyrisk->vehiclemodel}}">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="yearofmake">Year of Make</label>
                    <input type="number" class="form-control form-control-lg" id="yearofmake" disabled name="yearofmake" value="{{$policyrisk->yearofmake}}">

                </div>
                <div class="col-auto">
                    <label class='form-label' for="vehiclecolor">Vehicle Color</label>
                    <input type="text" class="form-control form-control-lg" disabled value="{{$policyrisk->vehiclecolor}}">
                </div>
            </div>

        </div>
    </div>
     <div class="card col-9 mb-3">
        <div class="card-header"><h4>SELECT PAYMENT METHOD</h4></div>
        <div class="card-body">
            <input type="text" name='policyid' hidden value="{{$policy->id}}">
            <div class="row gy-2 gx-3 align-items-center mb-3">
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight" style="margin-right: 5px">
                <button class="btn btn-primary" type="submit" disabled name="paystack" data-toggle="tooltip" data-placement="right"title="Coming Soon">FlutterWave</button>

            </div>
            <div class="p-2 bd-highlight" style="margin-right: 5px">
                <button class="btn btn-primary" type="submit" disabled name="moniepoint" data-toggle="tooltip" data-placement="right"title="Coming Soon">Moniepoint</button>
            </div>
            @if ($user->role=='agent' && ($agent->allowcredit==true) && ($creditleft>=0))
            <div class="p-2 bd-highlight" style="margin-right: 5px">  {{$creditleft}}
                <button class="btn btn-primary" type="submit" name="agencycredit" onclick="disableButton()" id="acredtbtn">Agency Credit</button>
            </div>
            @endif
            
        </div>
            </div>
        </div>

     </div>
     </form>
     
<script>
function disableButton() {
    var button = document.getElementById("acreditbtn");
    button.disabled = true;
    button.innerText = "Processing...";
}
</script>
</x-layouts.app>


