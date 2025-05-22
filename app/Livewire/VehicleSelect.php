<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\vehicleMake;
use App\Models\vehicleModel;

class VehicleSelect extends Component
{

    public $vmakes;
    public $selectedMake;
    public $models = [];
    public $output;

    public function mount()
    {
        $this->vmakes = vehicleMake::all();
        $this->output='Here';
       
        
    }

    public function updatedSelectedMake($value)
    {
        $this->emit('makeSelected', $this->selectedMake);

    
        $this->output='WHere';
        $this->models =vehicleModel::where('niipvmid', $value)->get();
         
    }

    public function render()
    {
        return view('livewire.vehicle-select');
    }
}
