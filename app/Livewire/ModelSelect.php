<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\vehicleMake;
use App\Models\vehicleModel;

class ModelSelect extends Component
{

    public $vmodel;
    public $selectedMake;
    public $models = [];
    public $output;

        public function mount()
    {
        $this->vmodel = vehicleModel::where('niipvmid', 1);
        
       
        
    }

    public function render()
    {
        return view('livewire.model-select');
    }
}
