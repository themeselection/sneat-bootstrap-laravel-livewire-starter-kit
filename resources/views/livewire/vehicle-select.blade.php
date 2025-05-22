<div>
<div class="col-auto">
    <label class='form-label'  for="vehiclemake">Vehicle Make</label>
    <select wire:model.defer="selectedMake" class="form-select form-control-lg" name="vmake" id="selectedMake">
        <option value="">Select Vehicle Make</option>
        @foreach($vmakes as $vmake)
            <option value="{{$vmake->niipvmid}}">{{$vmake->vmake}}</option>
        @endforeach
    </select>
</div><button wire:click="updatedSelectedMake(selectedMake)">Test Update</button>
<div>Output: <span>{{$output}}</span></div>
<select class="form-select form-control-lg" wire:key="vehiclemodel-dropdown">
    <option value="">Select Model</option>
    @foreach($models as $model)
        <option value="{{ $model->id }}">{{ $model->id }}</option>
    @endforeach
</select>

<p>Models count: {{ count($models) }}</p>

<p>Selected Make: {{ $selectedMake }}</p>

</div>