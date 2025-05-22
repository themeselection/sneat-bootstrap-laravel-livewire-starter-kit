<div>
    

    <select class="form-select form-control-lg" wire:model="selectModel" wire:key="vehiclemodel-dropdown">
    <option value="">Select Model</option>
    @foreach($models as $model)
        <option value="{{ $model->id }}">{{ $model->id }}</option>
    @endforeach
</select>

<p>Models count: {{ count($models) }}</p>

<p>Selected Make: {{ $selectedMake }}</p>
</div>
