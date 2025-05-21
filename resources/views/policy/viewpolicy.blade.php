<x-layouts.app>
    @php
        if ($policy->status=='draft'or $policy->status=='failed') {
            # code...
            $statcheck='enabled';
        } else {
            # code...
            $statcheck='disabled';
        }
        
    @endphp
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
<form action="{{route('submit_mpolicy')}}" method="post">
    @csrf
    <div class="card col-9 mb-3">
        <div class="card-header"><h4>POLICY DETAILS</h4>
        <h5 style="color:#040273 "><b>POLICY NO  :</b> 
            @if (!empty($policy->policyno))
                {{$policy->policyno}}
            @else
                Policy Number not yet Generated
            @endif
        <br>
        @if ($policy->status=='failed')
            <span class="text-danger mr-5">
                <b>STATUS : </b>{{strtoupper($policy->status)}} 
            </span>       
            
        @else
        <span class="mr-5">
            <b>STATUS : </b>{{strtoupper($policy->status)}}

        </span>         
            
        @endif
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    View
  </a>
        </h5>
  
        <div class="collapse" id="collapseExample">
  <div class="card card-body">
    @if (!empty($policy->elite_msg))
    {{$policy->elite_msg}}     
    @else
     N/A   
    @endif
  </div>
</div>
        </div>
        <div class="card-body">
            <div class="row gy-2 gx-3 align-items-center mb-3">
                <div class="col-auto">
                    <label for="" class="form-label">PRODUCT</label>
                    <input class="form-control form-control-lg" type="text" disabled value="MOTOR THIRD PARTY">
                </div>
                <div class="col-auto">
                    <label for="" class="form-label">PRODUCT TYPE</label>
                    <input class="form-control form-control-lg" type="text" disabled value="{{$policy->producttype}}">
                    <input class="form-control form-control-lg" type="text" name='producttype' hidden value="{{$policy->producttype}}">
                </div>
                <div class="col-auto">
                    <label for="" class="form-label">CONTRIBUTION ( &#8358;)</label>
                    <input class="form-control form-control-lg" type="text" disabled value="{{ number_format($policy->contribution, 2) }}">
                    <input class="form-control form-control-lg" type="number" name='contribution' hidden value="{{$policy->contribution}}">
                </div>
            </div>
        </div></div>
    <div class="card col-9 mb-3">
        <div class="card-header"><h4>PERSONAL DETAILS</h4></div>
        <div class="card-body">
            <div class="row gy-2 gx-3 align-items-center mb-3">
                 <div class="col-auto">
                    <label class='form-label' for="fname">First Name</label>)
                    <input class='form-control form-control-lg' type="text" name="fname" {{$statcheck}} required id="fname" value="{{$insured->firstname}}" placeholder="Enter First Name">

                </div>
                <div class="col-auto">
                    <label class='form-label' for="lname">Last Name</label>
                    <input class='form-control form-control-lg' type="text" name="lname" {{$statcheck}}  required id="lname" value="{{$insured->lastname}}" placeholder="Enter Last Name">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="gender">Gender**</label>
                    <select class='form-select form-control-lg' name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label class='form-label' for="dob">Date of Birth</label>
                    <input class='form-control form-control-lg' type="date" name="dob" {{$statcheck}} 
                     required id="dob" value="{{$insured->dob}}" placeholder="Select your Date of Birth">
                </div>

                <div class="col-auto">
                    <label class='form-label' for="email">Email</label>
                    <input class='form-control form-control-lg' type="email" name="email" id="email"
                    {{$statcheck}} value="{{$insured->email}}"
                    placeholder="Enter Valid email Address">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="phone">Tel. No.</label>
                    <input class='form-control form-control-lg' type="tel" name="phone"   {{$statcheck}} value="{{$insured->telno}}" required id="phone" placeholder="Phone no.">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="state">State of Residence**</label>
                    <select class='form-select form-control-lg' name="state" id="state">
                        <option value="FCT">FCT</option>
                        <option value="KAN">KANO</option>
                    </select>
                </div>
                <div class="row gy-2 gx-3 align-items-center mb-3">
                <div>
                    <label class='form-label' for="address">Address</label>
                    <textarea class='form-control form-control-lg' name="address" {{$statcheck}} required 
                    id="address" placeholder="Enter Address" rows="3">{{$insured->address}}</textarea>

                </div>

                </div>

            </div>

        </div>
    </div>
    <div class="card col-9 mb-3">
        <div class="card-header"><h4>VEHICLE DETAILS</h4></div>
        <div class="card-body">
            <div class="row gy-2 gx-3 align-items-center mb-3">
                <div class="col-auto">
                    <label class='form-label' for="regno">Registration No.</label>
                    <input class='form-control form-control-lg' type="text" name="regno" {{$statcheck}} required id="regno"
                    value="{{$policyrisk->regno}}" placeholder="Registration Number">

                </div>
                <div class="col-auto">
                    <label class='form-label' for="chassisno">Chassis No.</label>
                    <input class='form-control form-control-lg' type="text" name="chassisno" {{$statcheck}} 
                    value="{{$policyrisk->chassisno}}"
                    required id="chassisno" placeholder="Chassis Number">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="engineno">Engine No.</label>
                    <input class='form-control form-control-lg' type="text" name="engineno"
                    {{$statcheck}} 
                    value="{{$policyrisk->engineno}}"
                    required id="engineno" placeholder="Engine Number">
                </div>
                <div class="col-auto">
                    <label class='form-label' for="vehiclemake">Vehicle Make</label>
                    <input class="form-control form-control-lg" list="vmake" id="vmakeDataList"  
                    {{$statcheck}} 
                    value="{{$policyrisk->vehiclemake}}"
                    required name="vehiclemake" placeholder="Type to search...">
                    <datalist id="vmake">
                         @forelse ($vmakes as $vmake)
                             <option value="{{$vmake->vmake}}">
                         @empty
        
                     @endforelse
 
                    </datalist>
                </div>
                <div class="col-auto">
                    <label class='form-label' for="vehiclemake">Vehicle Model</label>
                    <select class="form-select form-control-lg" required name="vehiclemodel" id="vehiclemodel">
                        <option value="Camry">Camry</option>
                        <option value="Corolla">Corolla</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label class='form-label' for="yearofmake">Year of Make</label>
                    <input type="number" class="form-control form-control-lg" 
                    {{$statcheck}} 
                    value="{{$policyrisk->yearofmake}}"
                    id="yearofmake" name="yearofmake">

                </div>
                <div class="col-auto">
                    <label class='form-label' for="vehiclecolor">Vehicle Color</label>
                    <input type="text" class="form-control form-control-lg" 
                    {{$statcheck}} 
                    value="{{$policyrisk->vehiclecolor}}"
                    name="vehiclecolor">
                </div>
                <div class="col-auto">
                    <input type="text"  name="vehicletype" id="vehicletype"  hidden value="{{$policy->usekey}}">
                </div>
            </div>

        </div>
    </div>
    @if ($policy->status=='draft' or $policy->status=='failed')
        
     <div class="card col-9 mb-3">
        <div class="card-header"><h4>DECLARATION</h4></div>
        <div class="card-body">
            <div class="row gy-2 gx-3 align-items-center mb-3">
                <div>
                <input class="form-check-input" type="checkbox"  required name="declaration" id="declaration">

                    <label class="form-check-label" for="declaration">
                I declare that I have read the privacy information on the use of personal data and confirm that the information above is correct to the best of my knowledge
I also consent to the processing of my personal data in accordance with the Company's Privacy Policy
                </div>

            </div>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight" style="margin-right: 5px">
                <button class="btn btn-primary" type="submit">Submit Policy</button>

            </div>
            
        </div>
     </div>
         @endif
     </form>
</x-layouts.app>

